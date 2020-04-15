<?php
include 'connection.php';
if(!isset($_SESSION['email'])){
	header('Location: index.php');
	}

$changeitemtype=$connection->prepare("UPDATE item SET type_id=? WHERE id=?");
$changeitemtype->bind_param("ss",$edittype,$currentitemid);

    if(isset($_POST['add'])){
        if(!empty($_POST['newitemtype']) && !empty($_POST['curritem'])){
            $edittype=$_POST['newitemtype'];
            $currentitemid=$_POST['curritem'];
            //echo $edittype.'|'.$currentitemid;
            if($changeitemtype->execute()){
                header('Location:dash.php');
            }
            else{
                echo $connection->error;
            }
        }
    }
?>