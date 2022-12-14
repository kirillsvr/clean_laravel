<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse(array $data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function defaultSuccessResponse(): JsonResponse
    {
        return response()->json([
            'success' => true
        ]);
    }

    public function errorResponse(string $message, int $code = 500): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => $message
        ], $code);
    }

    public function warningResponse(string $message): JsonResponse
    {
        return response()->json([
            'success' => true,
            'warning' => $message
        ]);
    }
}
