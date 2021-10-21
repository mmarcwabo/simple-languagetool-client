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

    /**
     * @param
     * @return json encoded responses
     */
    public function rest_call()
    {

        $curl = curl_init();

        //If we had a token, ie premium subs
        /**
         * if ($token){
         * curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         * 'Authorization: '.$token));
         * }
         */

        //POST, GET

        switch ($this->method) {
                //POST
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($this->data) {
                    if ($this->contentType) {
                        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                            'Content-Type: ' . $this->contentType
                        ));
                    }
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data);
                }
                break;
            case "GET":
                //curl_setopt($curl, CURLO)
                break;
            default:
                if ($this->data) {
                    //To do - Don't hardcode API method names
                    //Add an array of all of them
                    //We assume we only have access on check
                    $url = sprintf("%s?%s", URL . '/check', http_build_query($this->data));
                }
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec($curl);
                curl_close($curl);
                return $response;
        }
    }
    /**
     * data is an assoc array
     */
    public function post_data()
    {

        $postData = $this->data;
        $string = http_build_query($postData);
        //Get json from
        $jsonResponse = $this->rest_call($this->method, URL, $string, 'application/x-xxx-form-urlencoded');
        //return $response = json_decode($jsonResponse);
    }

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
