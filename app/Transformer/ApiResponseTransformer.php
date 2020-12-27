<?php

namespace App\Transformer;

use Illuminate\Http\JsonResponse;

class ApiResponseTransformer
{
    public static function success($data, $responseMessage, $statusCode = 200): JsonResponse
    {
        $response = array(
            'success' => true,
            'message' => $responseMessage,
        );

        if (method_exists($data, 'total')) {
            $response = array_merge(
                $response,
                array(
                    "data" => $data->all(),
                    "pagination" => self::pagination($data)
                )
            );
        } else {
            $response = array_merge(
                $response,
                array(
                    "data" => $data
                )
            );
        }
        return new JsonResponse($response, $statusCode);
    }

    public static function pagination($data): array
    {
        return array(
            'total' => $data->total(),
            'current_items_count' => $data->count(),
            'items_per_page' => $data->perPage(),
            'current_page_no' => $data->currentPage(),
            'last_page_no' => $data->lastPage(),
            'has_more_pages' => $data->hasMorePages(),
        );
    }

    /**
     * @param $errors
     * @param $message
     * @param $statusCode
     * @return JsonResponse
     */
    public static function error($errors, $message, $statusCode): JsonResponse
    {
        $response = array(
            'success' => false,
            'message' => $message,
            "errors" => $errors
        );
        return new JsonResponse($response, $statusCode);
    }
}
