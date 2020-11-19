<?php

if (!function_exists('success')) {
    function success(array $data = null, bool $ignoreErrorCode = true)
    {
        return (new App\Domains\ApiResponseDto())->success($data, $ignoreErrorCode);
    }
}

if (!function_exists('error')) {
    function error(string $errorCode, array $data = null)
    {
        return (new App\Domains\ApiResponseDto())->error($errorCode, $data);
    }
}


if (!function_exists('multi')) {
    function multi(int $size, $callback): array
    {
        $data = [];
        for ($i = 0; $i < $size; ++$i) {
            $data[] = call_user_func($callback);
        }

        return $data;
    }
}
if (!function_exists('get_trace_no')) {
    function get_trace_no($prefix = '', $more_entropy = false): string
    {
        $dt = date('YmdHis');

        return $dt.'-'.sha1('md5', uniqid($prefix, $more_entropy));
    }
}
if (!function_exists('get_random_str')) {
    /**
     * @param int $length 长度
     *
     * @return string 随机字符串
     *
     * @throws Exception
     */
    function get_random_str(int $length = 8): string
    {
        if ($length <= 0) {
            $length = 8;
        }

        return substr(bin2hex(random_bytes((int)ceil($length / 2))), 0, $length);
    }
}
