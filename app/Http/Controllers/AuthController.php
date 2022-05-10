<?php

namespace App\Http\Controllers;

use App\Models\tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash;
use Session;

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
            } else {
                return response()->json(['status' => false,]);
            }
        } else {
            return response()->json(['status' => false,]);
        }
    }

    public function updatePass(Request $request)
    {
        $sessionUser = tenant::where('id', '=', Session::get('loginId'))->first();
        $id = $sessionUser->id;

        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8|different:oldPassword',
            'confirmPass' => 'required|same:newPassword'
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if ($sessionUser) {
                if (Hash::check($request->oldPassword, $sessionUser->password)) {
                    $user = tenant::find($id);
                    $user->password = Hash::make($request->newPassword);
                    $res = $user->save();
                    if ($res) {
                        return response()->json(['status' => 1, 'error' => $validator->errors()->toArray()]);
                    } else {
                        return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
                    }
                } else {
                    $invalidPass = [
                        'oldPassword' => ["The old password is incorrect"],
                    ];
                    return response()->json(['status' => 0, 'error' => $invalidPass]);
                }
            } else {
                return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
            }
        }
    }

    public function logout(Request $request)
    {
        if (Session::has('loginId')) {
            $r = $request->session()->flush();
            Session::pull('loginId');
            return redirect('/login');
        }
    }
}
