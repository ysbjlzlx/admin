<?php

namespace App\Http\Services;

use Exception;

class RandomService
{
    /**
     * @param int $length 长度
     *
     * @return string 随机字符串
     *
     * @throws Exception
     */
    public function string(int $length = 32): string
    {
        if ($length <= 0) {
            $length = 32;
        }

        return substr(bin2hex(random_bytes((int) ceil($length / 2))), 0, $length);
    }

    public function uniqid($prefix = '', $more_entropy = false): string
    {
        return uniqid($prefix, $more_entropy);
    }
}
