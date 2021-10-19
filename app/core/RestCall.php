<?php

namespace app\core;

class RestCall
{
    public $method;
    public $data;
    public $contentType;
    private $token;

    private $language;
    private $text;

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
       
        switch ($this->method) {
                //POST
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if($this->data){
                    if($this->contentType){
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
            if($this->data){
                //To do - Don't hardcode API method names
                //Add an array of all of them
                //We assume we only have access on check
                $url = sprintf("%s?%s", URL.'/check', http_build_query($this->data));
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
        return $response = json_decode($jsonResponse);


    }

    public function check($language, $text) {
        //Get submitted data on key up
        //From an auto submited form
        $this->language = $language;
        $this->text =  $text;
        $this->method = 'POST';

        $data = [
            'language' => $this->language,
            'text' => $this->text
        ];

        //$this->language = $_POST['language'];
        //$this->data = htmlspecialchars($_POST['text']);

        $ch = curl_init(URL.http_build_query($data));
        //set url
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);      
        curl_close($ch);
        echo $output;
    }
}