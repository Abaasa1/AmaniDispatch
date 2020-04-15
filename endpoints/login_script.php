<?php
include '../connection.php';

/*if(session_id() == '') {
    session_start();
}*/
$data = json_decode(file_get_contents("php://input"));
$error=''; // Variable To Store Error Message

//echo'isset';
if (empty($data->username) 		    ||
	empty($data->password) ) {
	$error = "Some Fields are empty";
	echo json_encode($error);
}
else {
	// Define $username and $password
	$username=$data->username;
	//$password=md5($_POST['password']);
	$password=$data->password;
	$password=md5($password);
	
	// To protect MySQL injection for Security purpose
	/*$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysqli_real_escape_string($connection,$username);
	$password = mysqli_real_escape_string($connection,$password);*/
	
	// SQL query to fetch information of registerd users and finds user match.
	//$query = mysqli_query($connection, "select * from admins where password='$password' AND username='$username'");
	//$rows = mysqli_num_rows($query);
	//$row = mysqli_fetch_array($query);
	$query=$connection->prepare("SELECT fname,lname,email FROM user_confirmed WHERE username = ? AND password = ?");
	$query->bind_param("ss",$username,$password);
	if($query->execute()){			
		$query->bind_result($userf,$userl,$usere);
		$query->store_result();
		$rows=$query->num_rows;
		if ($rows == 1) {
			while($query->fetch()){
				$logged_user=$userf." ".$userl;
				//$_SESSION['userfname']=$userf;
				//$_SESSION['userlname']=$userl;
				//$_SESSION['usermail']=$usere;
				//$_SESSION['username']=$username; // Initializing Session: username
				}
		
			$token=$username."|".uniqid().uniqid().uniqid();
            $tokUpdate=$connection->prepare("UPDATE user_confirmed SET token=? WHERE username = ? AND password = ?");
            $tokUpdate->bind_param("sss",$token,$username,$password);
            if($tokUpdate->execute()){
                $userArray=array("username"=>$username, "token"=>$token);
                $error = $userArray;
            }
			
			//header('Location:dash.php');
			$query->close();
			mysqli_close($connection); // Closing Connection
			echo json_encode($error);
			//header('Location:../index.php');
		} else {
			$error = "Username or Password is invalid ";
			//echo'no';
			echo json_encode($error);
			//$_SESSION['user_create_error']=$error;
		}
	}
	else{
		$error= $connection->error;
		echo json_encode($error);
		}
	//$query->close();
	//mysqli_close($connection); // Closing Connection
	//header('Location:../login.php');
}

?>