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
