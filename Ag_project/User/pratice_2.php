<?php
include "config.php";

//$c = 
//$qid = 
$qid = $_POST['q'];
$opt = $_POST['opt'];

$sql = "select * from physics where id = $qid";
$result = mysqli_query($mysqli,$sql);
$ro = [];
while($r = mysqli_fetch_assoc($result))
{
				$ro[] = $r;
}
$var1 = [];
for($i=0;$i<count($ro);$i++)
{
		$var1[] = $ro[$i]['id'];
		$var10[] = $ro[$i]['sorm'];
}
$var2 = [];
$var3 = [];
$var5 = [];
$var6 = [];
$var7 = [];
$var  = [];
$var11 = [];
$var12 = [];
for($i=0;$i<count($var1);$i++)
	$var[] = json_decode($ro[$i]['queandans'] ,TRUE);
for($i=0;$i<count($var1);$i++)
{
	$var2[$i] = $var [$i]['questiontext']['text'];
	$var5[$i] = $var [$i]['solution']['text'];
	$var6[$i] = $var [$i]['solution']['link'];
		if($var10[$i] == 'm')
		{	
			$var3[$i] = $var [$i]['questiontext']['answerno'];
			foreach($var[$i]['option'] as $key=>$value)
			{
			    $var7[$key]= $value;
							  
			}
						$co[] = count($var[$i]['option']);
						for($b = 1 ;$b < 4;$b++)
						{
							if($var3[$i] == $b )
							{
							
									$var11[$i] = $var[$i]['option'][$b]['text'];
							}	
					
						}	
					
}
					elseif($var10[$i] == 's')
					{
						$var12[$i] = $var[$i]['questiontext']['correctanswer'];
					}

}
$a = count($var1);
for($i = 0,$j =1 ;$i < $a; $i++,$j++)
{
	echo "<div style='margin-left:2%'>";


	$z = $j ;
if($var10[$i] == 'm')
{	

	for($b = 1,$c = 'A' ;$b<=4;$b++,$c++)
	{
		if($opt == $b)	
		{
			if($opt == $var3[$i] )		
			{
					$x = $var[$i]['option'][$b]['text'];
					if($var[$i]['answer']['usekatex'] == '1')
					{
						echo "<table id='a'>";
						echo "<tr><td>";
						echo "<h1 lang='latex'>";
					}	


				echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $c .')' . "&nbsp;&nbsp;" . $x. "</h1></td><td>&nbsp; <img src ='Images/correct.png' style=' width:20px; height: 19px;'></td></tr></table>";
					if($var[$i]['answer']['usekatex'] != '1')
					{
						echo "<br>";

					}	

			}
			if($opt != $var3[$i] )		
			{

					if($var[$i]['answer']['usekatex'] == '1')
					{
						echo "<table id='b'>";
						echo "<tr><td>";
						echo "<h1 lang='latex'>";
					}	

				echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $c .')' . "&nbsp;&nbsp;" .$var[$i]['option'][$b]['text'];
				echo "</h1></td><td>&nbsp;";
				echo "<img src ='Images/worng.png' style=' width:20px; height: 19px;'>";
				echo "</td></tr></table>";
				if($var[$i]['answer']['usekatex'] != '1')
					{
						echo "<br>";

					}	


			}


		}
		elseif($var3[$i] == $b)
		{
					if($var[$i]['answer']['usekatex'] == '1')
					{
						echo "<table id='c'>";
						echo "<tr><td>";
						echo "<h3 lang='latex'>";
					}	

				echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $c .')' . "&nbsp;&nbsp;" .$var[$i]['option'][$b]['text'];
				echo "</h3></td><td>&nbsp;";
				echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
				echo "</td></tr></table>";
	
					if($var[$i]['answer']['usekatex'] != '1')
					{
						echo "<br>";
						
					}	
		}
		else
		{
					if($var[$i]['answer']['usekatex'] == '1')
					{
						echo "<table id='d'>";
						echo "<tr><td>";
						echo "<h3  lang='latex'>";
					}	
		
				echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $c.')' . "&nbsp;&nbsp;" .$var[$i]['option'][$b]['text'];
				echo "</h5></td><td>&nbsp;";
				echo "<img src ='Images/a.png' style=' width:20px; height: 19px;'>";

				echo "</td></tr></table>";
	
					if($var[$i]['answer']['usekatex'] != '1')
					{
						echo "<br>";
						
					}	
						
		}
		
	
	}

	}
	else if($var10[$i] == 's')
	{
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Answer Given:";
	echo "<label> &nbsp;&nbsp;&nbsp;&nbsp;$opt </label>";
	
	if(is_numeric($var12[$i])){
		$var13[$i] = $var[$i]['answer']['range_1'];
		$var14[$i] = $var[$i]['answer']['range_2'];
		if($opt ==$var12[$i]){
			echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
			}
		else if($opt >=$var13[$i] && $opt<=$var14[$i]){
			echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
			}
		else{
			echo "<img src ='Images/worng.png' style=' width:20px; height: 19px;'>";
			}
	}
	else{
		if($opt ==$var12[$i]){
			echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
			}
		else{
			echo "<img src ='Images/worng.png' style=' width:20px; height: 19px;'>";
		}
	}
	echo "<br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Answer:";
	echo "<label> &nbsp;&nbsp;&nbsp;$var12[$i]</label>";
	echo "<br>";

	}
}


?>

