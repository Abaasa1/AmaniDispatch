<?php
require 'connection.php';
//mysqli_free_result($connection);
// get correct file path
$typecat = $_POST['catTypeId'];
//echo $typecat;
// remove file if it exists
if ( isset($typecat) ) {
	if($typecatremove->execute()){
		//echo $fileName;
		//echo'record has been deleted';
		header('Location:dash.php');
		}
	else{
		echo $connection->error;
		}

		
	}
?>
