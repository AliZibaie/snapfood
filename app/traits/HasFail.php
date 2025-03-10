<?php

namespace App\traits;

trait HasFail
{
    public static function fail($exception)
    {
        return response()->json([
            'status' => false,
            'message' => $exception->getMessage()
        ], 500);
    }
}
