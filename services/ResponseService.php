<?php

class ResponseService
{

    public static function success_response($payload)
    {
        $response = [];
        $response["status"] = 200;
        $response["payload"] = $payload;
        return json_encode($response);
    }
    public static function fail_response()
    {
        $response = [];
        $response["status"] = 404;
        $response["payload"] = "resource could not be found but may be available in the future";
        return json_encode($response);
    }
}
