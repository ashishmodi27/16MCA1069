<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add a chapter</title>
</head>
<?php   include "layout_2.php";
include "sys_connect.php";
 ?>
<body>
<p>&nbsp;</p>
<form  method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
<label> Select a subject</label>
  <select name="select" id="select" style="width: 150px;">
		<?php 
			$sql = "select * from ag_ma_subject where status ='1'";
			$result = mysqli_query($mysqli,$sql);
			$cid = null;
			$count = 0;
			$sid = null;	
			//$sname = [];
			while($res=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				$count = $count +1 ;
				$sid = $res['sid'];
				$sname[] = $res['subject_name'];
			}

			if($result > 0)
			{
				for($i=0;$i<$count;$i++)
					echo "  <option value='$sname[$i]'>  $sname[$i] </option>";

			}
	
  		
    ?>
  </select>
  </p>
  <p><label>Chapter Name:</label>
    <input type="text" name="browser2" autocomplete="off" />
<?php
		$cname = [];
		$count1 = 0;
		$sqll = "select * from ag_ma_chapter";	
		$result1 = mysqli_query($mysqli,$sqll); 
		$cid = null;
		while($ress = mysqli_fetch_array($result1,MYSQLI_ASSOC))
		{
			$count1 = $count1 +1 ;
			$cid = $ress['cid'];
			$cname[] = $ress['cname'];
		}
		$countt = mysqli_num_rows($result1);
		?>
</p>
  <p>
    Status:
    <select name="select2">
      <option value="0">Disable</option>
      <option value="1">Enable</option>
    </select>
  </p>
  <p>
    <input type="submit" name="Submit" value="Add a Chapter" />
  </p>
</form>

<?php

		if(isset($_POST['browser2']) && isset($_POST['select']) && isset($_POST['select2']) )
		{
			$prod_cat = $_POST['select'];
			$status = $_POST['select2'];
			$sq = "SELECT subject_name,sid FROM ag_ma_subject WHERE subject_name LIKE '$prod_cat%'";
 			$resultt1 = mysqli_query($mysqli,$sq);
			$sid1 = null;
			while($row = mysqli_fetch_array($resultt1,MYSQLI_ASSOC))
			{
					
					$sid1 = $row['sid'];
			}
			$count = mysqli_num_rows($resultt1);
			if($count > 0 )
			{
				$data_add1 = $_POST['browser2'];
				$tree =  'ch' .($count1+1);
				$tree1 = $sid1;
				$flag = null;
				$s = "insert into ag_ma_chapter(cid,cname,doc,sid,status) values('$tree','$data_add1',NOW(),'$tree1','$status')";
				if(isset($cname))
				{
					for($i = 0 ;$i <count($cname); $i++)	
					{	
							$a = $cname[$i];
							$x = strtolower($data_add1);
							$b = strtolower($a);
							if(($x == $a))
							{
									$flag = 1;
							}
					if($flag != 1) 
					{	
						$flag = 0;
					}
 				}
				if($flag == 0)
				{
					
					$result2 = mysqli_query($mysqli,$s);
    				@$co = mysqli_num_rows($result2);
					echo $co;
					if($co > 0)
					{
						echo "<script>
						alert('chapter added');
						</script>
						";
					}	
				}
				else if($flag != 0)
				{
						echo "<script>
						alert('oops,chapter cant add its already existed');
						</script>
						";
				}
			}	
		}
}	
?>

</body>
</html>
