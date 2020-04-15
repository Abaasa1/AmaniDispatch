<?php
require '../dash/connection.php';
// check if fields passed are empty
if(empty($_POST['Email']) 		    ||
   empty($_POST['Password'])  	    ||
   empty($_POST['Phone'])           ||
   empty($_POST['Fname'])           ||
   empty($_POST['Lname'])			||
   !filter_var($_POST['Email'],FILTER_VALIDATE_EMAIL))
   {
	$response=array();
	$code="reg_failed";
	$msg="Email is invalid";
	array_push($response,array("code"=>$code,"message"=>$msg));
	echo json_encode($response);
	//return false;
   }
   else{

		$regfname=$_POST['Fname'];
		$reglname=$_POST['Lname'];	
		//$username = $_POST['Username'];
		$email_address = $_POST['Email'];
		$password = $_POST['Password'];
		$phone=$_POST['Phone'];
		$regtoken1=rand(0,10000000);
		$regtoken2=rand(0,10000000);
		$regtoken=$regtoken2."ab".$regtoken1;
			
		// create email body and send it	
		$to = $email_address; // put your email
		$email_subject = "Amani Dispatch User Registration";
		$email_body = "<html>You have registered as a new user to Amani Dispatch under the following credentials".
						  "<br><br>Name: $regfname $reglname Email: $email_address<br>Phone Number:$phone".
						  "<br><br>To confirm your registration to Amani Dispatch please click the link. <br>".
						  " URL: http://amanidispatch.com/user/confirm.php?fname=$regfname&token=$regtoken <br><br> If this was not done by you then please do not click the link </html>"
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
		//check if confirmed user exists
		$resultcheckconfuser=$connection->prepare("SELECT * FROM user_confirmed WHERE email = ?");
		$resultcheckconfuser->bind_param("s",$regemail);
		$resultcheckconfuser->execute();
		$resultcheckconfuser->store_result();
		$response=array();
		if($resultcheckconfuser->num_rows >0){
			$code="reg_failed";
			$msg="User already exists";
			array_push($response,array("code"=>$code,"message"=>$msg));
			echo json_encode($response);
			
		}
		else{
			
				//check if unconfirmed user already exists
				$resultcheckuser=$connection->prepare("SELECT * FROM user_unconfirmed WHERE email = ?");
				$resultcheckuser->bind_param("s",$regemail);
				$resultcheckuser->execute();
				$resultcheckuser->store_result();		
				$response=array();
				if($resultcheckuser->num_rows >0){
					$code="reg_failed";
					$msg="User already exists but has yet to confirm. To confirm click link sent to your email";
					array_push($response,array("code"=>$code,"message"=>$msg));
					echo json_encode($response);
					//echo'User already exists';
					
				}
				else{
		
					if($regstmt->execute()){
						
						$code="reg_success";
						$msg="New user added successfully. Please confirm in your email";
						array_push($response,array("code"=>$code,"message"=>$msg));
						echo json_encode($response);
						mail($to,$email_subject,$email_body,$headers);
						//header ('Location: ../login.php');
						//echo $regname;
						}
		
					else{
						$code="reg_failed";
						$msg="Failed to add to database".$connection->error;
						array_push($response,array("code"=>$code,"message"=>$msg));
						echo json_encode($response);
						//echo 'Something went wrong: '.$connection->error;
						}
		
					//$regtoken;
					return true;
				}
			}
		
	}			
?>
