<?php
include "config.php";
include "Class_model.php";
include "Class_utility.php";
session_start();
$Model= new baseModel();
$Util= new Util();

$user_email=$Util->getvalue('email');
$pass=$Util->getvalue('password');

$sql = "select * from ag_ma_user where email = '$user_email' and password = '$pass'";
$result = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($result);
while($r = mysqli_fetch_assoc($result))
{
if($count > 0)
 {
	 $_SESSION['user_email'] = $r['email'];
	  $_SESSION['name'] = $r['name'];
	  $_SESSION['id'] = $r['id'];
	  $Util->redirect("index.php");
 }
}
if($count == 0)
{
	header('Location: login.php');
}
?>