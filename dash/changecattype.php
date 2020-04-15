<?php
include 'connection.php';
if(!isset($_SESSION['email'])){
	header('Location: index.php');
	}

$changecat=$connection->prepare("UPDATE category SET category_type_id=? WHERE id=?");
$changecat->bind_param("ss",$editcattype,$currentcatid);

    if(isset($_POST['add'])){
        if(!empty($_POST['newcattype']) && !empty($_POST['currcat'])){
            $editcattype=$_POST['newcattype'];
            $currentcatid=$_POST['currcat'];
            //echo $edittype.'|'.$currentitemid;
            if($changecat->execute()){
                header('Location:dash.php');
                //echo'here';
            }
            else{
                echo $connection->error;
            }
        }
    }
?>