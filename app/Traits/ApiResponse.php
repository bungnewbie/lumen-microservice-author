<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse {

    /**
     * Success api response
     * @param  array $data
     * @param  int http response $code
     * @return \Illuminate\Http\JsonResponse
     */
    static public function success($data, $code = Response::HTTP_OK)
    {
        return response()->json([
            'status'  => $code,
            'payload' => $data,
        ], $code);
    }

    /**
     * Failed api response
     * @param  string $message
     * @param  int http response $code
     * @return \Illuminate\Http\JsonResponse
     */
    static public function failed($message, $code)
    {
        return response()->json([
            'status'  => $code,
            'message' => $message,
        ], $code);
    }

}