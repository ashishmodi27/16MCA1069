<?php
include "sys_connect.php";
$prod_cat = $_POST['name'];
$sq = "SELECT subject_name,sid FROM ag_ma_subject WHERE subject_name LIKE '$prod_cat%' and status = '1'";
       $res = mysqli_query($mysqli, $sq);
	   $sid = null ;
	   if (mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_array($res))
            {
			
           		$sid = $row['sid'];
            }
        }
$sql = "SELECT cname FROM ag_ma_chapter WHERE sid LIKE '$sid%' and status = '1' ";
       $result = mysqli_query($mysqli, $sql);
		echo "<datalist  id='browsers2'>";
        if (mysqli_num_rows($result) > 0){
            while ($ro = mysqli_fetch_array($result))
            {
          			echo "<option value='". $ro['cname'] ."'>". $ro['cname'] ."</option>";
            }
        }
		else
		{
				
		}
        
		echo "</datalist>";
        mysqli_close($mysqli);

 ?>