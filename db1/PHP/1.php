<?php header('Access-Control-Allow-Origin: *'); ?>

<?php
	include("config.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	session_start();
	$sql = "select * from user where user ='$username' and pass = '$password'";
	$result = mysqli_query($mysqli,$sql);
	$count = mysqli_num_rows($result);
	$r = null;
	while($row = mysqli_fetch_assoc($result))
	{
		$r = $row['id'];
	}
	
	if($count > 0)
	{ 
		 echo $r;
		 
		 $_SESSION['username'] = $username;
	}
	else
	{
	
		echo 'false';
	}
	
?>