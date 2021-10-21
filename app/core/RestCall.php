<?php

namespace app\core;

class RestCall
{
    public $method;
    public $data;
    //CURL
    public $curl;
    //Response
    public $response;

    public function check($language, $text)
    {
        //Get submitted data on key up
        //From an auto submited form
        $this->method = 'POST';

        $this->data = [
            'language' => $language,
            'text' => $text
            ];

        //init the cURL object
        $this->curl = curl_init();
        //Setup the cURL object
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => URL . 'check?'.http_build_query($this->data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
            CURLOPT_HTTPHEADER => array(
                'token: fcd24q8r1d0uksxz9l8c'
            )

        ));
        //Get the response
        //We assume it is json, according to API DOC
        $this->response = curl_exec($this->curl);
        
        curl_close($this->curl);
        //Return the json response
        return $this->response;
    }
}
