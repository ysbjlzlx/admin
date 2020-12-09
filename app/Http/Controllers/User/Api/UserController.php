<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $user = $request->user();

        return response()->json(
            success(
                [
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            )
        );
    }
}
