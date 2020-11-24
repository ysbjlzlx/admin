<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function redirectLoginView()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'totp_key' => 'required|number|digits:6',
        ];
        $request->validate($rules);
    }
}
