<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    protected function serverErrorResponse($message, $data = [])
    {
        $response = [
            'status' => 'server_error',
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, 500);
    }

    protected function unAuthorizationResponse($message, $data = [])
    {
        $response = [
            'status' => 'unauthorized',
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, 401);
    }

    protected function badRequestResponse($message, $data = [])
    {
        $response = [
            'status' => 'bad_request',
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, 400);
    }

    protected function successResponse($message, $data = [])
    {
        $response = [
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, 200);
    }
}
