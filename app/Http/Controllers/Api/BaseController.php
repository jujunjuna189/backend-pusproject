<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    // Untuk Response Api
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

    // Global Function Untuk Upload File
    protected function upload_image($request, $path)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $file_name = str_replace(' ', '-', $file->getClientOriginalName());

            $destination = 'storage/' . $path;
            $file->move($destination, $file_name);
            $file = $destination . '/' . $file_name;
        } else {
            $file = '';
        }

        return $file;
    }
}
