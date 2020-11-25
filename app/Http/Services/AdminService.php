<?php

namespace App\Http\Services;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;

class AdminService
{

    public function getAdmin(string $username, string $password = null)
    {
        $admin = AdminModel::query()->where(['username' => $username])->first();
        if ($admin->isEmpty()) {
            return false;
        }
        if (!empty($password)) {
            if (Hash::check($password, $admin->password)) {
                return $admin;
            }

            return false;
        }

        return $admin;
    }
}
