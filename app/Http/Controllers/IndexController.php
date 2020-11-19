<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function openapi()
    {
        return view('openapi');
    }

    public function storage(string $filename)
    {
        return response()->file(storage_path('app/public/'.$filename));
    }
}
