<?php
header('Content-Type: application/json');
foreach ($_POST as $key => $value) {
    $_POST[$key] = utf8_encode(base64_decode($value));
}
include("../model/humanverify.php");
$humanverify = new HumanVerify();
$humanverify->setUserToken($_POST['token']);
if ($humanverify->request()->success == true) {
    require_once("../model/login.php");   
    $login = new Login($_POST['user'],$_POST['pw']);
    $response['login'] = $login->check();
    $response['status'] = $login->status;
} else {
    $response['login'] = false;
    $response['status'] = "Não aprovado no reCAPTCHA, tente novamente!";
}
$response = json_encode($response);
echo $response;
?>