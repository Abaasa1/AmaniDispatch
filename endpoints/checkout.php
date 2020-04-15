<?php
	require '../connection.php';
	require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';
	$data = json_decode(file_get_contents("php://input"));
    $username = $data->username;
   // $c = $data->c;
	$cart = json_decode($data->cart);
	$total = $data->total;
	$test='';
	$output='<table style="width:100%">
  <tr>
    <th>Item</th>
    <th>Price</th> 
    <th>Amount</th>
	</tr>';
	$inner='';
	$innerinner='';
	$i=1;
	if(empty($cart) ||count($cart)==0){
			echo 'The shopping cart is empty';
			}
		else{
			if(is_array($cart) || is_object($cart)){
				
					foreach($cart as $key=>$value){
						foreach($value as $keys=>$values){
						//print_r("<tr>".$values."</tr>");
						$inner=$inner.'<th>'.$values.'</th>';
						$i++;
						if($i==4){
							$inner='<tr>'.$inner.'</tr>';
							//echo $inner;
							$i=1;
							}
							
						}
						//$output=$output.$inner.'</table>';
					}
				
			
				$output=$inner=$output.$inner.'<tr>
			<th>Total</th>
			<th>'.$total.'</th>
			<th></th> 
			</tr></table>';
			}
			echo $output ;
		}
	
	//print_r($cart);
	
	$resultcheckconfuser=$connection->prepare("SELECT fname, lname, email, phone FROM user_confirmed WHERE username = ?");
		$resultcheckconfuser->bind_param("s", $reguser);
		$resultcheckconfuser->execute();
		$resultcheckconfuser->bind_result($fname, $lname, $email, $phone);
		$resultcheckconfuser->store_result();
		if($resultcheckconfuser->num_rows >0){
			while($resultcheckconfuser->fetch()){
				 //send auto response email to prospective shopper
    // create email body and send it	
	$mail = new PHPMailer();
        $mail->From      = 'noreponse@amanidispatch.com';
        $mail->FromName  = 'Amani Dispatch';
        $mail->Subject   = 'An order has been made';
        $mail->Body      = 'Customer '.$fname.' '.$lname.',
		with phone number '.$phone.' and email '.$email.'
		has made the following order<br> '.$output.'

';
        $mail->AddAddress( $email );

        //$file_to_attach = 'Mystery Shopper Registration form.docx';

        //$mail->AddAttachment( $file_to_attach , 'Mystery Shopper Registration form.docx' );
		$mail->IsHTML(true);
        $mail->Send();
				}
			
		}
	?>