
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php   
include "sys_connect.php";
include "layout_2.php" 
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add a chapter</title>
</head>

<body>
<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
  <p>Add or Search 
    <input list="browsers" name="browser" autocomplete="off">
    <datalist id="browsers">
      <?php
$sql = "select * from ag_ma_subject";
$result = mysqli_query($mysqli,$sql);

$cid = null;
$count = 0;
$sid = null;
$sname = [];
while($res=mysqli_fetch_array($result,MYSQLI_ASSOC))
{	
	$count = $count + 1;
	$sid = $res['sid'];
	$sname[] = $res['subject_name'];
}
if($result > 0)
{

	for($i=0;$i<$count;$i++)
		echo "<option value='$sname[$i]'>";
}
?>
    </datalist>
  </p>
  <p>Status :
    <select name="select">
      <option value="0">Disable</option>
      <option value="1">Enable</option>
    </select>
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit" />
  </p>
</form>
<?php
$count = mysqli_num_rows($result);

if(isset($_POST['browser']))
{
	$data_add = $_POST['browser'];
	$select = $_POST['select'];
	if( $data_add != '')
	{	
		$count_1 = $count;
		$tree =  's' .$count_1;
		$sq = "insert into ag_ma_subject(sid,subject_name,doc,status) values('$tree','$data_add',NOW(),$select)";
		$flag = null;
		if(isset($sname))
		{
			for($i = 0 ;$i < count($sname); $i++)	
			{
				$a = $sname[$i];
				$x = strtolower($data_add);
				$a_1 = strtolower($a);
				if($x == $a_1)
				{
					$flag = 1;
				}	
			}
	}	
		if($flag != 1)
		{
			$flag = 0;
		}
		if($flag == 0)
		{
			$result = mysqli_query($mysqli,$sq);
			if($result > 0)
			{
				echo "<script>
					alert('successfully,subject added ');
				</script>";
			}
			
		}
		else if($flag != 0)
		{
						echo "<script>
						alert('oops,subject cant add its already existed');
						</script>
						";
		}
	}	
}
else
{
	if(!isset($data_add) || trim($status) == '')
	{
   		
	}
}

?>
</body>
</html>
