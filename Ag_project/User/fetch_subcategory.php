<?php
include "config.php";
session_start();
$prod_cat = $_POST['name'];


$sqll = "select * from physics";
	$rs = mysqli_query($mysqli,$sqll);
	while($r = mysqli_fetch_assoc($rs)) 
	{
		$ra[] = $r;
					
	}
	$a = [];
	for($i=0;$i<count($ra);$i++)
	{
		$a[] = $ra[$i]['id'];
	}
	$b = [];
	$c = [];
	$d = [];
	$e = [];
	$f = [];
	$h = [];
	
	for($i=0;$i<count($a);$i++)
		$b[] = json_decode($ra[$i]['queandans'] ,TRUE);
				
	for($i=0;$i<count($a);$i++)
	{
			if(isset($b[$i]) )
			{
				$c[] = $b [$i]['questiontext']['browser'];
				$d[] = $b [$i]['questiontext']['browser2'];
				$h[] = $ra [$i]['rid'];
				
			}
	}
	$abd = array();
	$qr = array_unique($d);
	for($i=0;$i<count($d);$i++)
	{
	if(@$qr[$i]!="")
	{
	array_push($abd,$qr[$i]);
	}
	}
	for($i=0;$i<count($abd);$i++)
	{
	echo $abd[$i];
	echo "<br>";
	}
	
	
	
	



$sq = "SELECT subject_name,sid FROM ag_ma_subject WHERE subject_name LIKE '$prod_cat%'";
       $res = mysqli_query($mysqli, $sq);
	   $sid = null ;
	   if (mysqli_num_rows($res) > 0){
            while ($row = mysqli_fetch_array($res))
            {
			
           		$sid = $row['sid'];
            }
        }


$sql = "SELECT cname FROM ag_ma_chapter WHERE sid LIKE '$sid%'";
       $result = mysqli_query($mysqli, $sql);

		echo "<datalist  id='browsers2'>";
        if (mysqli_num_rows($result) > 0){
            while ($ro = mysqli_fetch_array($result))
            {
			for($i=0;$i<count($abd);$i++)
			{	if($abd[$i]==$ro['cname']){
					$str = strtoupper($ro['cname']);			
           			echo "<option value='". $ro['cname'] ."'>". $str ."</option>";
					}
					}
            }
        }
		else
		{
				
		}
        
		echo "</datalist>";
        mysqli_close($mysqli);

        ?>