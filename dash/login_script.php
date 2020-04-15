<?php
include 'connection.php';

$error=''; // Variable To Store Error Message

if(isset($_POST['login'])){
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is incorrect";
	}
	else {
		// Define $username and $password
		$email=$_POST['username'];
		//$password=md5($_POST['password']);
		$password=$_POST['password'];
		
		// To protect MySQL injection for Security purpose
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = mysqli_real_escape_string($connection,$email);
		$password = mysqli_real_escape_string($connection,$password);
		
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysqli_query($connection, "select * from admins where password='$password' AND email='$email'");
		$rows = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);
		
		if ($rows == 1) {
			$_SESSION['email']=$email; // Initializing Session: email
			$_SESSION['FNAME']=$row['name']; // Initializing Session: user_type
		//	$_SESSION['LNAME']=$row['LNAME'];
			
			// Storing Session
			$logged_user=$_SESSION['email'];
			//$logged_user_type = $_SESSION['user_type'];
			
			$error = $logged_user." logged in";
			header('Location:dash.php');
		} else {
			$error = " email or Password is invalid ";
		}
		mysqli_free_result($query);
		mysqli_close($connection); // Closing Connection
	}
}
?>