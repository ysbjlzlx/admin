<?php

namespace App\Http\Controllers;

use App\Http\Services\RandomService;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    public function string(Request $request)
    {
        $length = $request->input('length', 32);
        $size = $request->input('size', 1);
        $data = multi($size, function () use ($length) {
            $randomService = new RandomService();

            return $randomService->string($length);
        });

        return $data;
    }

    public function uniqid(Request $request)
    {
        $size = $request->input('size', 1);

        return multi($size, function () {
            $randomService = new RandomService();

            return $randomService->uniqid();
        });
    }
}
