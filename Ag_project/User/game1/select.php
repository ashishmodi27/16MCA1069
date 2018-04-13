<?php
$mysqli = mysqli_connect("localhost","root","","flash");
$sql = "select game from user where id = 1";
$res = mysqli_query($mysqli,$sql);
while($row = mysqli_fetch_assoc($res))
{
	$a = $row['game'];
	echo $a;
}
?>