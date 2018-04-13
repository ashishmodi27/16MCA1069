<?php
$mysqli = mysqli_connect("localhost","root","","flash");
$name = $_POST['name'];
$sql = "update user SET game=$name where id = 1";
$res = mysqli_query($mysqli,$sql);

?>