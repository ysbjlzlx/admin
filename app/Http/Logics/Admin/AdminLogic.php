<?php

namespace App\Http\Logics\Admin;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;

class AdminLogic
{
    /**
     * 创建 Admin.
     *
     * @psalm-param  array{username:string,email:string,password:string,totpSecret:string} $admin 用户数据
     *
     * @return AdminModel|false
     */
    public function createAdmin(array $admin)
    {
        $exists = AdminModel::query()
            ->where(['username' => $admin['username']])
            ->orWhere(['email' => $admin['email']])
            ->exists();
        if ($exists) {
            return false;
        }

        $adminModel = new AdminModel();
        // 检测 username
        $adminModel->username = $admin['username'];
        $adminModel->email = $admin['email'];
        $adminModel->password = Hash::make($admin['password']);
        $adminModel->totp_secret = $admin['totpSecret'];
        $adminModel->save();

        return $adminModel;
    }
}
