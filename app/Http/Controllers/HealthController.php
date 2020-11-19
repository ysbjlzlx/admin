<?php

namespace App\Http\Controllers;

use App\Domains\RespondPayload;
use Illuminate\Support\Facades\Log;
use function response;

class HealthController extends Controller
{
    public function action()
    {
        $data = [
            'status' => 'OK',
        ];
        Log::info('health', $data);

        return response()->json(RespondPayload::success($data));
    }
}
