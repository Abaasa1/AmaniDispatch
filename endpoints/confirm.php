<?php
require '../dash/connection.php';

//capture the GET queries
$username=$_GET['username'];
$token=$_GET['token'];

//echo $username. '<br>';
//echo $token.'<br>';

//check if this user exists
$resultcheckuser=$connection->prepare("SELECT * FROM user_unconfirmed WHERE username= ? AND token= ?");
$resultcheckuser->bind_param("ss",$username,$token);
$resultcheckuser->execute();
$resultcheckuser->store_result();
if($resultcheckuser->num_rows >0){
	//echo'yup<br>';
	$copy=$connection->prepare("INSERT INTO user_confirmed (fname,lname,username,email,phone,password) SELECT fname, lname, username, email, phone, password FROM user_unconfirmed WHERE username= ? AND token= ?");
	$copy->bind_param("ss",$username,$token);
	if($copy->execute()){
		//echo'You are successfull ';
		$delete=$connection->prepare("DELETE FROM user_unconfirmed WHERE username= ? AND token= ?");
		$delete->bind_param("ss",$username,$token);
		$delete->execute();
		$_SESSION['user_create_error']='Successfully confirmed';
		header ('Location: ../login.php');
		}
	else if(!$copy->execute()){
		echo'Something has gone wrong'.$connection->error;
		}
	
}
else{
	//echo'user may have already confirmed';
	$_SESSION['user_create_error']='Something went wrong';
	header ('Location: ../login.php');
	}

?>