<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use DB;


class EmailController extends Controller
{
    public function bookNow(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'location' => 'required',
            'unit' => 'required',
        ]);

        $token = Str::random(64);

        DB::table('booking_confirmation')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('confirm.booking.form', ['token' => $token, 'email' => $request->email, 'location' => $request->location, 'unit' => $request->unit]);
        $body = "Welcome to Renta Website, In this email we will confirm your Booking at <b>" . $request->location . "," . $request->unit . "</b>. We will get intouch with you soon after Confirmation.";

        Mail::send(
            'emailLayout.email-BookNow',
            [
                'action_link' => $action_link,
                'body' => $body,
                'location' => $request->location,
                'unit' => $request->unit,
            ],
            function ($message) use ($request) {
                $message->from('cms.renta@gmail.com', 'RENTA');
                $message->to($request->email)
                    ->subject('Renta Booking Confirmation');
            }
        );

        return redirect()->back()->with('confirmation', 'Booking Confirmation is Sent to your Email, Please Check your Email.');
    }

    public function confirmBooking(Request $request, $token = null)
    {
        return view('emailLayout.email-confirm')->with(['token' => $token, 'email' => $request->email, 'location' => $request->location, 'unit' => $request->unit]);
    }

    public function confirmBookingStep2(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'location' => 'required',
            'unit' => 'required',
        ]);

        $check_token = \DB::table('booking_confirmation')->where('token', $request->token)->first();

        if (!$check_token) {
            return back()->withInput()->with('fail', 'Invalid Token');
        } else {
            DB::table('bookings')->insert([
                'email' => $request->email,
                'location' => $request->location,
                'unit' => $request->unit,
                'status' => "8",
                'created_at' => Carbon::now(),
            ]);

            \DB::table('booking_confirmation')->where('email', $request->email)
                ->delete();

            return redirect('/')->with('success', 'Your Booking Is Now Being Processed. ');
        }
    }

    public function contactUs(Request $request){
        $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        DB::table('feedback')->insert([
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Thank you! We have Received Your Message.');
    }
}
