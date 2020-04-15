<?php
require 'connection.php';
// get correct file path
$typeitem = $_POST['itemTypeId'];
// remove file if it exists
echo $typeitem;
if ( isset($typeitem) ) {
	if($typeitemremove->execute()){
		//echo $fileName;
		//echo'record has been deleted';
		header('Location:dash.php');
		}
	else{
		echo $connection->error;;
		}

		
	}
?>