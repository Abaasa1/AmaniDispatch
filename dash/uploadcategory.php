<?php
require 'connection.php';

//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['categoryName']) &&isset($_POST['typecategoryId']) ){
					$category=$_POST['categoryName']; 
					//$prodimage='Images/'.$name; 
					//$prodifo=$_POST['productIfo']; 
					//$prodid=$_POST['marketId']; 
					$cattype=$_POST['typecategoryId']; 
					}
				
			   // move_uploaded_file($tmpName,$targetPath); 
			   if(trim($category)==""){
				   }
				else{
					$stmt->execute();
					}
				
				
				header( 'Location: dash.php' ) ;

?>