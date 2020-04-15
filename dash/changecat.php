<?php
include 'connection.php';
if(!isset($_SESSION['email'])){
	header('Location: index.php');
	}

$changecat=$connection->prepare("UPDATE  type_of_item SET category_id=? WHERE id=?");
$changecat->bind_param("ss",$editcat,$currentitemtypeid);

    if(isset($_POST['add'])){
        if(!empty($_POST['newcat']) && !empty($_POST['curritemtype'])){
            $editcat=$_POST['newcat'];
            $currentitemtypeid=$_POST['curritemtype'];
            //echo $edittype.'|'.$currentitemid;
            if($changecat->execute()){
                header('Location:dash.php');
            }
            else{
                echo $connection->error;
            }
        }
    }
?>