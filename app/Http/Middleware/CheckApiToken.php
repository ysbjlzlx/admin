<?php

namespace App\Http\Middleware;

use App\Http\Services\AuthService;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class CheckApiToken
{
    private $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $bearerToken = $request->bearerToken();
        if (empty($bearerToken)) {
            return response()->json(error('A0312', ['user_tip' => '请登录后使用']));
        }
        try {
            $user = $this->authService->getUserByToken($bearerToken);
            if (!is_null($user)) {
                Auth::setUser($user);
            } else {
                return response()->json(error('A0312', ['user_tip' => '请登录后使用']));
            }
        } catch (UnauthorizedException $exception) {
            return response()->json(error('A0312', ['user_tip' => '请登录后使用']));
        }

        return $next($request);
    }
}
