<?php
require 'connection.php';
// get correct file path
$cat = $_POST['catId'];
// remove file if it exists
if ( isset($cat) ) {
	if($catremove->execute()){
		//echo $fileName;
		//echo'record has been deleted';
		header('Location:dash.php');
		}

		
	}
?>