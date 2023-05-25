<?php

namespace App\Http\Responses;

use App\Exceptions\ResponseException;
use Arr, Str;

class APIResponse
{
    const DEFAULT_ERROR_MESSAGE = 'System error';
    const DEFAULT_FAIL_MESSAGE = 'unsuccessful';
    const DEFAULT_SUCCESS_MESSAGE = 'Success';
    const UNAUTHENTICATED = 'Please login again!';

    public static function validateResponse($msg, $errors): \Illuminate\Http\JsonResponse
    {
        $result = [
            'code' => ResponseCode::VALIDATION_ERROR,
            'data' => null,
            'message' => $msg,
            'errors' => $errors
        ];

        return response()->json($result, 422);
    }

    public static function response($status, $code, $message, $data = null, $developerMessage = '')
    {
        if (is_array($data) && Arr::isAssoc($data)) {
            $convertedData = [];

            foreach ($data as $key => $value) {
                $convertedData[Str::snake($key)] = $value;
            }

            $data = $convertedData;
        }

        $result = [
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];

        if (config('app.env') != 'production') {
            $result['developer_message'] = $developerMessage;
        }

        return response()->json($result, $status);
    }

    public static function error($error)
    {
        if ($error instanceof ResponseException || !empty($error->getMessage())) {
            return self::fail(null, $error->getMessage());
        }

        return self::response(
            500,
            ResponseCode::ERROR,
            self::DEFAULT_ERROR_MESSAGE,
            $error->getTrace(),
            $error->getMessage()
        );
    }

    // Success
    public static function success(
        $data = null,
        $message = self::DEFAULT_SUCCESS_MESSAGE,
        $code = ResponseCode::SUCCESS,
        $developerMessage = '')
    {
        return self::response(200, $code, $message, $data, $developerMessage);
    }

    // Fail
    public static function fail(
        $data = null,
        $message = self::DEFAULT_FAIL_MESSAGE,
        $code = ResponseCode::ERROR,
        $developerMessage = '')
    {
        return self::response(200, $code, $message, $data, $developerMessage);
    }

    public static function failByException(
        $data = null,
        $message = self::DEFAULT_FAIL_MESSAGE,
        $code = ResponseCode::EXCEPTION_ERROR,
        $developerMessage = '')
    {
        return self::response(200, $code, $message, $data, $developerMessage);
    }

    // Bad request
    public static function error400($message, $data = null, $developerMessage = '')
    {
        return self::response(400, ResponseCode::ERROR, $message, $data, $developerMessage);
    }

    // Unauthorized
    public static function error401($message, $data = null, $developerMessage = '')
    {
        return self::response(401, ResponseCode::ERROR, $message, $data, $developerMessage);
    }

    // Not found
    public static function error404($message, $data = null, $developerMessage = '')
    {
        return self::response(404, ResponseCode::ERROR, $message, $data, $developerMessage);
    }

    // Server internal error
    public static function error500($message, $data = null, $developerMessage = '')
    {
        return self::response(500, ResponseCode::ERROR, $message, $data, $developerMessage);
    }

    // Unauthenticated
    public static function unauthenticated()
    {
        return self::fail(null, self::UNAUTHENTICATED, ResponseCode::UNAUTHENTICATED);
    }

    //Unauthenticated with special message
    public static function unAuthenticatedV2($devMsg): \Illuminate\Http\JsonResponse
    {
        return self::response(401, ResponseCode::UNAUTHENTICATED, self::UNAUTHENTICATED, null, $devMsg);
    }
}
