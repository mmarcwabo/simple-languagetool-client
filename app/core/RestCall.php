<?php

namespace app\core;

class RestCall
{
    public $method;
    public $data;
    public $contentType;
    private $token;

    //CURL
    public $curl;

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
        $rc = new RestCall();
        switch ($rc->method) {
                //POST
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if($rc->data){
                    if($rc->contentType){
                        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                    'Content-Type: ' . $rc->contentType
                ));
                    } 
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $rc->data);
                }
            break;    
            case "GET":
            //curl_setopt($curl, CURLO)
            break;
            default:
            if($rc->data){

                $url = sprintf("%s?%s", URL, http_build_query($rc->data));
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
    public function post_data(){

        $postData = $this->data;
        $string = http_build_query($postData);
        //Get json from
        $jsonResponse = $this->rest_call($this->method, URL, $string, 'application/x-xxx-form-urlencoded');
        $response = json_decode($jsonResponse);


    }
}