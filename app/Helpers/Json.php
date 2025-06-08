<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class Json
{
    /**
     * API Response
     *
     * @var array
     */
    protected static $response = [
        'meta' => [
            'message' => null,
            'error' => null,
        ],
        'data' => null,
    ];

    /**
     * Give success response.
     */
    public static function success(mixed $data)
    {
        self::$response['meta']['message'] = 'Query Execution Success';
        self::$response['meta']['error'] = [];
        self::$response['data'] = $data;

        return response()->json(self::$response, Response::HTTP_OK);
    }

    /**
     * Give error response.
     */
    public static function error(mixed $error, $httpCode = null)
    {
        self::$response['meta']['message'] = 'Query Execution Failed';
        self::$response['meta']['error'] = $error;
        self::$response['data'] = [];

        return response()->json(self::$response, $httpCode == null ? Response::HTTP_INTERNAL_SERVER_ERROR : $httpCode);
    }
}
