<?php
require 'connection.php';

//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['itemName']) ){
					//echo'is post <br>';
					$typename=$_POST['itemName']; 
					//$prodimage='Images/'.$name; 
					//$prodifo=$_POST['productIfo']; 
					$categoryType=$_POST['categoryId']; 
					//echo $typename.' '.$categoryType;
					//echo mb_detect_encodng($typename);
					
				
			   // move_uploaded_file($tmpName,$targetPath); 
				if(trim($typename)==''){					
					
					}
				else{
					$typestmt->execute();
					}
				
				header( 'Location: dash.php' ) ;
}
?>