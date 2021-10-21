<?php

namespace app\core;

class RestResponse
{

    public $response;
    public $message;
    public $replacements;

    public function getResponse($jsonResponse)
    {
        $this->response = json_decode($jsonResponse, true, 512, JSON_OBJECT_AS_ARRAY);
    }
}
