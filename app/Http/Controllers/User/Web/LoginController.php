<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Http\Services\AuthService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function redirectLoginView()
    {
        return view('user.auth.login');
    }

    public function login(Request $request, UserService $userService, AuthService $authService)
    {
        $rules = [
            'email' => 'required|exists:users',
            'password' => 'required',
        ];
        $messages = [];
        $this->validate($request, $rules, $messages);
        $user = $userService->getUserByEmail($request->input('email'));
        $passwordCheckResult = $authService->checkPassword($user, $request->input('password'));

        if (!$passwordCheckResult) {
            $request->flush();
            throw ValidationException::withMessages(['email' => [trans('auth.failed')]]);
        }
        Auth::login($user);

        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::guard()->logout();

        return redirect()->route('index');
    }
}
