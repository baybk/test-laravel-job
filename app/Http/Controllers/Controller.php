<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    const LIST_SUCCESS_CODE = [200, 201];

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendSuccess($result, $message, $code = 200)
    {
        $response = array_merge(
            [
                'success' => true,
                'message' => $message,
            ],
            $result
        );
        $responseCode = 200;
        if ($code) {
            $responseCode = in_array($code, self::LIST_SUCCESS_CODE) ? $code : $responseCode;
        }
        return response()->json($response, $responseCode);
    }

    public function sendSuccessWithoutMessage($result, $code = 200)
    {
        $response = array_merge(
            [
                'success' => true,
                'message' => '',
            ],
            $result
        );
        $responseCode = 200;
        if ($code) {
            $responseCode = in_array($code, self::LIST_SUCCESS_CODE) ? $code : $responseCode;
        }
        return response()->json($response, $responseCode);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($errorArr, $errorMsg, $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $errorMsg,
        ];

        if (!empty($errorArr)) {
            $response['data'] = $errorArr;
            $response = array_merge(
                $response,
                $errorArr
            );
        }

        return response()->json($response, $code);
    }
}
