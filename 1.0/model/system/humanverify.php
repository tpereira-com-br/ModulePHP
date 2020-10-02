<?php 
class HumanVerify{
    private $secretKey;
    private $userToken;
    private $response;

    function __construct() {
        $this->secretKey = recaptcha_secretkey;
    }

    function setUserToken($userToken){
        $this->userToken = $userToken;
    }

    function request(){
        $request = curl_init();
        $param = [
            'secret' => $this->secretKey, 
            'response' => $this->userToken, 
        ];
        curl_setopt($request, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($request, CURLOPT_POST, 1);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_HEADER, false);
        curl_setopt($request, CURLOPT_POSTFIELDS, $param);
        $this->response =  json_decode(curl_exec($request));
        return $this->response;
    }
}    
?>