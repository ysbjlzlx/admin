<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function redirectLoginView()
    {
        return view('admin.auth.login');
    }
}
