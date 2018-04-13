<?php
include "layout_2.php";
include_once("sys_connect.php"); 
$cid = $_GET['cid'];
$result = mysqli_query($mysqli, "SELECT  cname, status,sid FROM ag_ma_chapter WHERE cid='$cid'") ; 
while($res = mysqli_fetch_array($result))
{
    $cname = $res['cname'];
    $status = $res['status'];
	$sid = $res['sid'];
}
?>
<html>
<body>
    <form name="form1" method="post" action="editup.php?cid=<?php echo $cid;?>">
        <table border="0">
		<tr>
		<td><?php
		$s= $mysqli->query("SELECT subject_name from ag_ma_subject where sid='$sid'");
		while($res = mysqli_fetch_array($s))
		{
			$subject_name = $res['subject_name'];
		}
		echo "Subject Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$subject_name;
		?>
		</td>
		</tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="cname" style="width: 150px;" value="<?php echo $cname;?>"></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td>  <select name="select">
               
                <?php 
				if($status == '1')
				{
					echo"<option value=1> Enable </option>";
					echo"<option value=0 > Disable </option>";
				}
				elseif($status == '0')
				{
					echo"<option value=0 > Disable </option>";
					echo"<option value=1> Enable </option>";

				}
	
				?>"
				 </select>
				  </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['cid'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>