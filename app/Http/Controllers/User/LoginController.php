<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'login' => 'required|max:40',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $credentials = $request->only('login', 'password');
//        dd($credentials);
        $remember = $request->remember ? 1 : 0;
        if (Auth::attempt($credentials,$remember)) {
            return back();
        }else{
            return back();
        }


    }
}
