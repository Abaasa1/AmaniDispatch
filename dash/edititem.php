<?php
 include 'connection.php';
if(!isset($_SESSION['email'])){
	header('Location: index.php');
	}

$editnamestmnt=$connection->prepare("UPDATE item SET name=? WHERE id=?");
$editnamestmnt->bind_param("ss",$editname,$currentitemid);

$editpricestmnt=$connection->prepare("UPDATE item SET price=? WHERE id=?");
$editpricestmnt->bind_param("ss",$editprice,$currentitemid);

$edittypestmnt=$connection->prepare("UPDATE item SET type_id=? WHERE id=?");
$edittypestmnt->bind_param("ss",$edittype,$currentitemid);

$editimagestmnt=$connection->prepare("UPDATE item SET image_name=? WHERE id=?");
$editimagestmnt->bind_param("ss",$editImageName,$currentitemid);

if(isset($_POST['edit'])){
    if(isset($_POST['editname']) && !empty($_POST['editname'])){
        //echo'<br>New name is empty';
        $editname=$_POST['editname'];
        $currentitemid=$_POST['editid'];
        if($editnamestmnt->execute()){
            //echo'name has changed';
        }
    }

    if(isset($_POST['editprice']) && !empty($_POST['editprice'])){
        $editprice=$_POST['editprice'];
        $currentitemid=$_POST['editid'];
        if($editpricestmnt->execute()){
            //echo'price has changed';
        }
    }


    if(isset($_POST['edittype']) && !empty($_POST['edittype'])){
        $edittype=$_POST['edittype'];
        $currentitemid=$_POST['editid'];
        if($edittypestmnt->execute()){
            //echo'type has changed';
        }
    
    }
    /*if(empty($_POST['editid'])){
        echo'<br>current id is empty';
    }*/
 
	
        $name     = $_FILES['file']['name'];
        $tmpName  = $_FILES['file']['tmp_name'];
        $error    = $_FILES['file']['error'];
        $size     = $_FILES['file']['size'];
        $ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        switch ($error) {
            case UPLOAD_ERR_OK:
                $valid = true;
                //validate file extensions
                if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
                    $valid = false;
                    $response = 'Invalid file extension.';
                }
                //validate file size
                if ( $size/1024/1024 > 2 ) {
                    $valid = false;
                    $response = 'File size is exceeding maximum allowed size.';
                }
                //upload file
                if ($valid) {
                    //$name=rand(1,1000).$name;

                    $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'uploads/Images' . DIRECTORY_SEPARATOR.$name;

                  
                    $editImageName='Images/'.$name; 
                   $currentitemid=$_POST['editid'];
                    //echo $editImageName.'|'.$currentitemid;
                    if($editimagestmnt->execute()){
                        move_uploaded_file($tmpName,$targetPath);
                        $response="file uploaded";
                    }
                    else{
                        //echo $connection->error;
                        $response='edit image fail<br>';
                    }
                   
                    header( 'Location: dash.php' ) ;
                    exit;
                }
                break;
            case UPLOAD_ERR_INI_SIZE:
                $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                break;
            case UPLOAD_ERR_PARTIAL:
                $response = 'The uploaded file was only partially uploaded.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $response = 'No file was uploaded.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
                break;
            default:
                $response = 'Unknown error';
            break;
        }

       // echo $response;
   
   header('Location:index.php');
}


?>