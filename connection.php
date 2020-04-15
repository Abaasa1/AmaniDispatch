<?php
if (session_status() == PHP_SESSION_NONE || session_id() == '') {
    session_start();
}
//$_SESSION['user_create']='';

//the arrays for the type_of_category table 
$typecategoryName=array();
$typecategoryId=array();


//the arrays for the category table 
$categoryName=array();
$categoryId=array();

//the arrays for the type_of_item table 
$typeName=array();
$typeId=array();

//the arrays for the item table 
$iteName=array();
$iteId=array();




// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "", "amanidis_amanidispatch");

if(!$connection){
	die("Database Connection Failed" . mysqli_connect_error());
	
	}
else{
    
    //put tags into the item table
    //Step 1:find the number of rows in the item table
    //
    $tags="";
    $tagfixselectitem=$connection->prepare("SELECT type_id FROM item ");
    if($tagfixselectitem->execute()){
        $tagfixselectitem->bind_result($tagstypeitemid);
        $tagfixselectitem->store_result();
        while($tagfixselectitem->fetch()){
            $tagsfixtypeofitem=$connection->prepare("SELECT category_id, name FROM type_of_item WHERE id=?");
            $tagsfixtypeofitem->bind_param("s",$tagstypeitemid);
            if($tagsfixtypeofitem->execute()){
                $tagsfixtypeofitem->bind_result($tagscatid,$tagscatname);
                $tagsfixtypeofitem->store_result();
                while($tagsfixtypeofitem->fetch()){
                    //$tags=$tagscatname;
                    //echo $tags;
                }
            }
            
        }
    }
	/*
	The user's accounts code
	*/
	//inserting into the type of category table
	$regstmt = $connection->prepare("INSERT INTO user_unconfirmed( 	fname, lname, username, password, email, phone, token) VALUES (?,?,?,?,?,?, ?)");
	if(!$regstmt){  //if there is an error, then it will be shown
			                                                                                                       
    	echo $connection->error;
        }
	else{
    	// everything is good to go !. 
        }
	$regstmt->bind_param("sssssss", $regfname, $reglname, $reguser, $regpassword, $regemail, $regphone, $regtoken);
	
	
	
	/*
	This code is for the inventories
	Order in which the code goes
	1. Type of category table
		1.1 insert
		1.2 select
		1.3 delete
	
	*/
	
	
	// The type of category table
	
	//inserting into the type of category table
	$typecategorystmt = $connection->prepare("INSERT INTO type_of_category( name) VALUES (?)");
	if(!$typecategorystmt){  //if there is an error, then it will be shown
			                                                                                                       
    	echo $connection->error;
        }
	else{
    	// everything is good to go !. 
        }
	$typecategorystmt->bind_param("s", $tcategory);
	
	//the selection of items from the type of category table
	$typecategoryselections=$connection->prepare("SELECT id,name FROM type_of_category ");
	if(!$typecategoryselections){		
		echo $connection->error;
		}
	else{
		//the selection has worked
		//echo 'the selection of the type_of_category table is working';	
		}
	
		$typecategoryselections->execute();

   		 /* bind result variables */
  	  	$typecategoryselections->bind_result($tcid,$tcname);

    	/* fetch values */
   		while ($typecategoryselections->fetch()) {
        //printf ("%s (%s)\n", $cname, $cid);
		//echo' '.$name;
		
			$typecategoryName[]=$tcname;
			
			$typecategoryId[]=$tcid;
			
		
		}
		$typecategorysize=count($typecategoryId);
		
		//removing from the type of category table
		$typecatremove=$connection->prepare("DELETE FROM type_of_category WHERE id=?");
	    /* bind parameters for markers */
    	$typecatremove->bind_param("s",$typecat);
		
		if ($typecatremove->execute()) {
  			//echo'the record has been removed';
  			}
  		else{
	  		echo $connection->error;
	  		}
		
		
		//the category table statements 
	// prepare and bind
		$stmt = $connection->prepare("INSERT INTO category( name,category_type_id) VALUES (?,?)");
			if(!$stmt)  //if there is an error, then it will be shown!. 
       		  { // show error                                                                                                       
        		  echo $connection->error;
          		} else {
    // everything is good to go !. 
        				 }
		$stmt->bind_param("sd", $category,$cattype);
		$selections=$connection->prepare("SELECT id,name FROM category ");
		if(!$selections)
			{
				echo $connection->error;
			}
		else{
		//the selection has worked
		
			}
	
		$selections->execute();

   		 /* bind result variables */
  	  	$selections->bind_result($cid,$cname);

    	/* fetch values */
   		 while ($selections->fetch()) {
        	//printf ("%s (%s)\n", $cname, $cid);
			//echo' '.$name;
		
			$categoryName[]=$cname;
			
			$categoryId[]=$cid;
			
		
			}
		$categorysize=count($categoryId);
		$catremove=$connection->prepare("DELETE FROM category WHERE id=?");
	    /* bind parameters for markers */
    	$catremove->bind_param("s",$cat);

		if ($catremove->execute()) {
  			//echo'the record has been removed';
  			}
  		else{
	  		echo $connection->error;
	  		}
		
		
		
		
		//the type_of_item table statements 
		// prepare and bind
		$typestmt = $connection->prepare("INSERT INTO type_of_item( name, category_id) VALUES (?, ?)");
		if(!$typestmt)  //if there is an error, then it will be shown!. 
       		 { // show error                                                                                                       
        		  echo $connection->error;
				  echo mysqli_connect_error();
          	 }
		else {
    			// everything is good to go !. 
       		 }
		$typestmt->bind_param("ss", $typename,$categoryType);
		
		$typeselections=$connection->prepare("SELECT id,name FROM type_of_item ");
		if(!$typeselections)
			{
				echo $connection->error;
			}
		else{
			//the selection has worked
		
			}
	
		$typeselections->execute();

   		 /* bind result variables */
  	  	$typeselections->bind_result($tid,$tname);

    	/* fetch values */
   		while ($typeselections->fetch()) {
        	//printf ("%s (%s)\n", $tname, $tid);
			//echo' '.$name;
		
			$typeName[]=$tname;
			
			$typeId[]=$tid;
			
		
			}
			
			$typesize=count($typeName);
			
		$typeitemremove=$connection->prepare("DELETE FROM type_of_item WHERE id=?");
	    /* bind parameters for markers */
    	$typeitemremove->bind_param("s",$typeitem);

		if ($typeitemremove->execute()) {
  			//echo'the record has been removed';
  			}
  		else{
	  		echo $connection->error;
	  		}
		//the item table statements 
		// prepare and bind
		$itemstmt = $connection->prepare("INSERT INTO item( name, type_id, price, description, image_name) VALUES (?, ?, ?, ?, ?)");
		if(!$itemstmt)  //if there is an error, then it will be shown!. 
       		{ // show error                                                                                                       
        		  echo $connection->error;
				  echo mysqli_connect_error();
          	} 
		else {
    			// everything is good to go !.
				//echo'yo'; 
        	 }
		$itemstmt->bind_param("sddss", $itemname,$idType,$price,$description,$imageName);
		
		$itemremove=$connection->prepare("DELETE FROM item WHERE id=?");
	    /* bind parameters for markers */
    	$itemremove->bind_param("s",$items);

		if ($itemremove->execute()) {
  			//echo'the record has been removed';
  			}
  		else{
	  		echo $connection->error;
	  		}	
		
		
		
		
		
		
				
	
	
	}

?>