<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\UnauthorizedException;
use Vinkla\Hashids\Facades\Hashids;

class AuthService
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * @param User $user 需要校验密码的用户
     * @param string $passpord 待校验的密码
     *
     * @return bool
     */
    public function checkPassword(User $user, string $password)
    {
        return Hash::check($password, $user->getAuthPassword());
    }

    public function login(User $user)
    {
        $userToken = new UserToken();
        $userToken->user_id = $user->id;
        $userToken->token = $this->generateToken($user);
        $userToken->ua = Request::userAgent();
        $userToken->ip = Request::ip();
        $userToken->save();

        return $userToken->token;
    }

    protected function generateToken(User $user = null)
    {
        $str = Str::random(64);
        $str .= microtime();
        if (!is_null($user)) {
            $str .= Hashids::encode($user->id);
        }

        return Hash::make($str);
    }

    public function getUserByToken(string $token)
    {
        $userToken = $this->getUserToken($token);
        if (is_null($userToken)) {
            throw new UnauthorizedException('Invalid token');
        }

        return $this->userService->getUserById($userToken->user_id);
    }

    public function getUserToken(string $token)
    {
        return UserToken::where('token', $token)->first();
    }
}
