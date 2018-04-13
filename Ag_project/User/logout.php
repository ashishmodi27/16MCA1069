<?php
include "config.php";
include "Class_model.php";
include "Class_utility.php";
session_start();
$Model= new baseModel();
$Util= new Util();

//session_start();
unset($_SESSION['user_email']);
session_destroy();

$Util->redirect("login.php");
?>