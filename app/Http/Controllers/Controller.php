<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonResponse($data = [])
    {
        return response()->json([
            'message' => $data['message'] ?? '',
            'data' => $data['data'] ?? [],
            'errors' => $data['errors'] ?? [],
            'status_code' => $data['status_code'] ?? 200,
        ], $data['status_code'] ?? 200);
    }
}
