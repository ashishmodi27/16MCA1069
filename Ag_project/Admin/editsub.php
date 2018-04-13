<?php
include_once("sys_connect.php"); 
if(isset($_POST['update']))
{    
    $sid = $_REQUEST['sid'];
    $subject_name=$_POST['subject_name'];
    $status=$_POST['select'];  
	echo $subject_name;
	echo $status;
    if(empty($subject_name)) {            
        if(empty($subject_name)) {
            echo "subject field is empty.<br/>";
        }
        if(empty($status)) {
            echo "status field is empty.<br/>";
        }        
    }
	 else 
	 { 
        $result = mysqli_query($mysqli, "UPDATE ag_ma_subject SET subject_name='$subject_name',status='$status' WHERE sid='$sid'");
    }
}header("Location: View_subject.php");
?>