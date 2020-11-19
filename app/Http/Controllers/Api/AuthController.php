<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\AuthService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request, UserService $userService)
    {
        $rules = [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ];
        $request->validate($rules);
        $user = $userService->getUserByEmail($request->input('email'));
        if (!is_null($user)) {
            return response()->json(error('A0100', ['user_tip' => '该邮箱已注册，可直接登录。']));
        }
        $user = $userService->register(
            $request->get('name'),
            $request->get('email'),
            $request->get('password')
        );
        if (is_null($user)) {
            return response()->json(error('B0001'));
        }

        return response()->json(success($user->toArray()));
    }

    public function login(Request $request, UserService $userService, AuthService $authService)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];
        $request->validate($rules);
        $user = $userService->getUserByEmail($request->input('email'));
        if (is_null($user)) {
            return response()->json(error('A0201'));
        }
        $checkResult = $authService->checkPassword($user, $request->input('password'));
        if (!$checkResult) {
            return response()->json(error('A0210'));
        }
        $token = $authService->login($user);

        return response()->json(success(['token' => $token]));
    }
}
