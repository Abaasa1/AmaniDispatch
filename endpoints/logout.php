<?php

require '../connection.php';
$error='';
$data = json_decode(file_get_contents("php://input"));


$username=$data->username;
$token=$data->token;
$logoutToken="LOGGED OUT";

$logoutUser=$connection->prepare("UPDATE user_confirmed SET token =? WHERE username=? AND token=?");
$logoutUser->bind_param("sss",$logoutToken,$username,$token);
if($logoutUser->execute()){
    echo'user has been logged out';
}
else{
    echo $connection->error;
}















?>