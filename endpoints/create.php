<?php

require '../connection.php';
$error='';
$data = json_decode(file_get_contents("php://input"));
//$cid = $data->cid;

// check if fields passed are empty
if(
   empty($data->username) 		    ||
   empty($data->password)  	    ||
   empty($data->phone)           ||
   empty($data->fname)           ||
   empty($data->lname)			
   )
   {
		$error='Some Fields are empty ';
		//$_SESSION['user_create_error']=$error;
		//header ('Location: ../login.php');
		echo json_encode($error);
   }
else if(empty($data->email) ||!filter_var($data->email,FILTER_VALIDATE_EMAIL)){
	$error='Email is invalid ';
	//$_SESSION['user_create_error']=$error;
	//header ('Location: ../login.php');
	echo json_encode($error);
}
else{
		$regfname=$data->fname;
		$reglname=$data->lname;	
		$reguser = $data->username;
		$email_address = $data->email;
		$password = $data->password;
		$phone=$data->phone;
		$regtoken1=rand(0,10000000);
		$regtoken2=rand(0,10000000);
		$regtoken=$regtoken2."ab".$regtoken1;
			
		// create email body and send it	
		$to = $email_address; // put your email
		$email_subject = "Amani Dispatch User Registration";
		$email_body = "<html>You have registered as a new user to Amani Dispatch under the following credentials".
						  "<br><br>Name: $regfname $reglname Email: $email_address<br>Phone Number:$phone".
						  "<br><br>To confirm your registration to Amani Dispatch please click the link. <br>".
						  " URL: http://amanidispatch.com/user/confirm.php?user=$reguser&token=$regtoken <br><br> If this was not done by you then please do not click the link </html>"
						  ;
		$headers = "From: no-reply@amanidispatch.com\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		//$headers .= "Reply-To: $email_address";	
		//echo $email_body;

		//$regname=$username;
		$regpassword=md5($password); 
		$regemail=$email_address; 
		$regphone=$phone; 
		//check if user already exists
		//$sqlcheckuser="SELECT * FROM user_unconfirmed WHERE email = '".$regemail."' OR phone = '".$regphone."';";
		//$resultcheckuser=mysqli_query($connection, $sqlcheckuser);
		$resultcheckconfuser=$connection->prepare("SELECT * FROM user_confirmed WHERE email = ? OR username = ?");
		$resultcheckconfuser->bind_param("ss",$regemail, $reguser);
		$resultcheckconfuser->execute();
		$resultcheckconfuser->store_result();
		if($resultcheckconfuser->num_rows >0){
			$error='User already exists.';
			
			//echo $error;
			echo json_encode($error);
			
		}
		else{
				$resultcheckuser=$connection->prepare("SELECT * FROM user_unconfirmed WHERE email = ? OR username= ?");
				$resultcheckuser->bind_param("ss",$regemail, $reguser);
				$resultcheckuser->execute();
				$resultcheckuser->store_result();
				if($resultcheckuser->num_rows >0){
					$error='User already registered but didnt confirm. Please click confirm link sent to your email';
					echo json_encode($error);
					
				}
				
				else{
		
					if($regstmt->execute()){
						$error='User successfully registered. Link has been sent to email to confirm ';
						mail($to,$email_subject,$email_body,$headers);
						echo json_encode($error);
						}
		
					else{
						$error= 'YIKES!! Something went wrong! Something went very wrong ';
						echo json_encode($error);
						}
		
					//$regtoken;
					return true;
				}
			
			}
		
		
	}			
?>
