<?php
include('sys_connect.php');
$id = $_GET['sid'];
echo $id;
$stmt = $mysqli->query("DELETE FROM ag_ma_subject WHERE sid = '$id'");
if($stmt){
header("Location: View_subject.php");
}
else{
echo "fail";
}
?>