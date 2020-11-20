<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function swagger()
    {
        return view('swagger');
    }

    public function storage(string $filename)
    {
        return response()->file(storage_path('app/public/'.$filename));
    }
}
