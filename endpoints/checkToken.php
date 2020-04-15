<?php

require '../connection.php';
$error='';
$data = json_decode(file_get_contents("php://input"));


$username=$data->username;
$token=$data->token;

$checkAuth=$connection->prepare("SELECT * FROM user_confirmed WHERE token=? AND username=?");


if ($token!=null && $username!=null){
    //echo $token. " : ".$username;
    $checkAuth->bind_param("ss", $token, $username);
    if($checkAuth->execute()){
        $checkAuth->store_result();
        if($checkAuth->num_rows() == 1){
            echo "authorised";
        }
        else{
            echo "unauthorised";
        }
    }
    else{
        echo $connection->error;
    }
}
else{
    echo 'data contains null values';
}
/*$checkAuth->bind_param("ss",$token,$username);


*/

?>