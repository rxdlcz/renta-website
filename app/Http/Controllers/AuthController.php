<?php

namespace App\Http\Controllers;

use App\Models\tenant;
use Illuminate\Http\Request;
use Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $tenant_user = tenant::where('email', '=', $request->email)->first();
        if ($tenant_user) {
            if (Hash::check($request->password, $tenant_user->password)) {
                $request->session()->put('loginId', $tenant_user->id);
                return response()->json(['status' => true,]);
                //return redirect()->back()->with('success', 'Correct');
            } else {
                return response()->json(['status' => false,]);
                //return redirect()->back()->with('fail', 'false');
            }
        } else {
            return response()->json(['status' => false,]);
            //return redirect()->back()->with('fail', 'false');
        }
    }
}
