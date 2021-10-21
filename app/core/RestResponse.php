<?php

namespace app\core;

class RestResponse
{

    public $response;
    public $messages;
    public $replacements;

    public function getResponse($jsonResponse)
    {
        return $this->response = json_decode($jsonResponse, true, 512, JSON_OBJECT_AS_ARRAY);
    }

    public function getMatchMessages()
    {

        $matches = $this->response['matches'];
        foreach ($matches as $m) {
            $this->messages[] = $m['message'];
        }
        return $this->messages;
    }

    public function getMatchReplacements()
    {

        $matches = $this->response['matches'];
        foreach ($matches as $m) {
            $this->replacements[] = $m['replacements'];
        }
        return $this->replacements;
    }

    //To do : get the grammatical rules too..

}
