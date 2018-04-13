<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include "sys_connect.php";
	$data = json_encode($_POST);
	$data1 = json_decode($data,TRUE);
	if(@$data1['questiontext']['text']!= '' and @$data['questiontext']['correctanswer'] != '' and @$data['questiontext']['browser2']!= '')
	{
		$sqll = "select * from  physics";
		$res = mysqli_query($mysqli,$sqll);
		$count = mysqli_num_rows($res);
		$count_1 = $count + 1;
	
 	$sql = "insert into physics(queandans,sorm,rid) values('". $data  ."','s','$count_1')";
   	if(@!mysqli_query($mysqli,$sql))
   	 {
    	    die('Error : ' . @mysqli_error($db));
    }
	else
	{
		echo "<br>";
		header('Location: adminpage.php');
	}

	}
	else
	{
		echo "<script>
		alert('Fill a details for saving');
		</script>";
	}
	 


?>
</body>
</html>
