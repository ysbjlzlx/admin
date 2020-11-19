<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserToken;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;

class UserService
{
    /**
     * 用户注册.
     *
     * @param string $name 用户姓名
     * @param string $email 用户邮箱
     * @param string $password 用户密码
     *
     * @return User
     */
    public function register($name, $email, $password)
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        return $user;
    }

    /**
     * 根据邮箱查找用户.
     *
     * @param string $email 邮箱
     *
     * @return mixed
     */
    public function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function getUserById(int $id)
    {
        return User::find($id);
    }


}
