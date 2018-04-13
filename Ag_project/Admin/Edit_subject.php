<?php
include_once("sys_connect.php"); 
include "layout_2.php";

$sid = $_GET['sid'];
$result = mysqli_query($mysqli, "SELECT  subject_name, status FROM ag_ma_subject WHERE sid='$sid'") ; 
while($res = mysqli_fetch_array($result))
{
    $subject_name = $res['subject_name'];
    $status = $res['status'];
}
?>
<html>
<body>
    <form name="form1" method="post" action="editsub.php?sid=<?php echo $sid;?>">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="subject_name" style="width: 150px;" value="<?php echo $subject_name;?>"></td>
            </tr>
            <tr> 
                <td>Status</td>
              <td>
			  <select name="select">
               
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
				 </select> </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['sid'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>