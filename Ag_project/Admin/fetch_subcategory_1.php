<?php
include "sys_connect.php";
include "fetch.php";
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

$question_check = null;
$sql = "SELECT cname FROM ag_ma_chapter WHERE sid LIKE '$sid%' ";
       $result = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($result) > 0){
            while ($ro = mysqli_fetch_array($result))
            {
				$question_check[] = $ro['cname'];
            }
        }
		for($i = 0;$i<count($question_check);$i++)
		{
			for($j = 0 ;$j<count($question_check);$j++ )
			{
				if($var10[$i] == $question_check[$j])
				{
					echo "<option value='". $var10[$i] ."'>". $var10[$i] ."</option>";
				}
				else
				{
					
				}	
			}
		}
			echo "</datalist>";
		mysqli_close($mysqli);

        ?>