<?php
require 'connection.php';
// get correct file path
$items = $_POST['itemId'];
//echo $items;
// remove file if it exists
if ( isset($items) ) {
	if($itemremove->execute()){
		//echo $fileName;
		//echo'record has been deleted';
		header('Location:dash.php');
		}
		else{
			echo $connection->error;
			}
		

		
	}
    ?>