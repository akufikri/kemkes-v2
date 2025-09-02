<?php

namespace App\Traits;

trait ApiResponder
{
    public function success($data, $message, $code)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }
    public function error($message = null, $data = null, $code = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
