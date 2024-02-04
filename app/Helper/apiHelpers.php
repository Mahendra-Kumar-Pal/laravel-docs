<?php

function unAuthorizedErrorHandler($message = 'Your credentials are incorrect or your account has been blocked by the server administrator.')
{
    $error = [
        'version' => 'v1',
        'message' => $message,
        'code' => 401
    ];
    return response()->json($error, 401);
}

function validationErrorHandler($validation_error = null)
{
    $error = [
        "validation_error" => $validation_error,
        'message' => 'Something wrong with URL or parameters',
        'version' => 'v1',
        'code' =>422,
    ];
    return response()->json($error, 422);
}

function notFoundErrorHandler($message = 'Resource not found')
{
    $error = [
        'message' => $message,
        'version' => 'v1',
        'code' =>404,
    ];
    return response()->json($error, 404);
}

function successHandler($data, int $code = 200, string $message = null)
{
    $response = [
        'data' => $data,
        'version' => 'v1',
        'code' => $code,
        'message' => $message
    ];
    return response()->json($response, $code);
}

function serverErrorHandler(\Exception $e, $isStripe = false)
{
    $error = [
            'debug' => (config('app.env') !== 'production') ? array(
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'code' => $e->getCode(),
                // 'trace' => $e->getTrace(),
            ) : null,
            "message" => (!$isStripe) ? "Unable to process your request at this time because the server encountered an unexpected condition." : $e->getMessage(),
            'version' => 'v1',
            'code' =>500,
    ];
    logger('Debug message: ' . $e->getMessage());

    return response()->json($error, 500);
}

?>