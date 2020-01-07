<?php

class APP
{

    static function returnResponse($result, $message)
    {
        $response['result']  = $result;
        $response['message'] = $message;
        echo json_encode($response);
        if ($result) {
            exit;
        } else {
            throw new Exception;
        }
    }
}