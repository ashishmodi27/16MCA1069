<?php
include_once("sys_connect.php"); 
if(isset($_POST['update']))
{    
    $cid = $_REQUEST['cid'];
	echo $cid;
    $cname=$_POST['cname'];
    $status=$_POST['status'];  
	echo $cname;
	echo $status;
    if(empty($cname)) {            
        if(empty($cname)) {
            echo "subject field is empty.<br/>";
        }
        if(empty($status)) {
            echo "status field is empty.<br/>";
        }        
    } else { 
        $result = mysqli_query($mysqli, "UPDATE ag_ma_chapter SET cname='$cname',status='$status' WHERE cid='$cid'");
    }
}header("Location: View_chapter.php");
?>