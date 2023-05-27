<?php

namespace App\Helpers;

trait APIHelpersTrait
{
    protected function jsonResponse($data = [], $code = 200, $message = 'done')
    {
        $code = $this->getCode($code);
        return response()->json([
            'status_code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function jsonNotFoundResponse($code = 404, $message = 'Not found!')
    {
        $code = $this->getCode($code);
        return response()->json([
            'status_code' => $code,
            'message' => $message,
        ], $code);
    }

    protected function jsonErrorResponse($code = 400, $message = 'Something went wrong!')
    {
        $code = $this->$this->getCode($code);
        return response()->json([
            'status_code' => $code,
            'message' => $message,
        ], $code);
    }
    private function getCode($code) {
        return ($code >= 100 && $code < 600) ? $code : 500;
    }

}
