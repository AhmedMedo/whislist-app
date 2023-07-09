<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @param array $data
     *
     * @return JsonResponse
     */
    public function successResponseWithData(array $data = []): JsonResponse
    {
        return response()->json(['status' => 'success', 'data' => $data]);
    }

    public function successResponseWithMessage(string $message = 'OK'): JsonResponse
    {
        return response()->json(['status' => 'success', 'message' => $message]);
    }
}
