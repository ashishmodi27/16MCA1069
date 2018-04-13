<?php
include('sys_connect.php');
$id = $_GET['cid'];
echo $id;
$stmt = $mysqli->query("DELETE FROM ag_ma_chapter WHERE cid = '$id'");
if($stmt){
header("Location: View_chapter.php");
}
else{
echo "fail";
}
?>