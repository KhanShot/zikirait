<?php

namespace App\Http\Traits;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use \Illuminate\Http\JsonResponse;

trait TJsonResponse
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['success'=> false, "message" => "validation Error" ,'errors' => $validator->errors(), 'error_code' => null],
            422, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
    }


    public function successResponse($message, $data=null): JsonResponse
    {
        throw new HttpResponseException(response()->json(['success'=> true, 'message'=> $message, 'data' => $data ],
            200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
    }

    public function paginatedResponse($data=null): JsonResponse
    {
        throw new HttpResponseException(response()->json(['success'=> true, 'data' => $data],
            200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
    }


    public function paginateData()
    {

    }

    public function failedResponse($message, $status, $data=null, $error_code=null){
        throw new HttpResponseException(response()->json(['success'=> false, 'message'=> $message, "errors" => $data, 'error_code' => $error_code ],
            $status, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
    }

}
