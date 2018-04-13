<html>
<header>
  <link  rel="stylesheet" href="css/history.css">
</header>
<?php 
require_once("userlayout.php");
include "config.php";
?>
<body>
<br />
<br>
<?php
$tid = $_GET['tid'];
$id = $_SESSION['id'];
$result = null;
$sql = "select qid,choice_selected from ag_ma_test where tid ='$tid' and id LIKE '$id%' order by tid";
$result = mysqli_query($mysqli,$sql);
$rows = [];
$raw1 ="";
			while($r = mysqli_fetch_assoc($result)) 
				{
						$raw[] = explode(', ',$r['qid']);
						$raw1 =  $r['choice_selected'];
					   
				} 
			

$str =  explode(',',$raw1);

if(isset($raw))
{
	for($i=0;$i<count($raw);$i++)
	{
		for($j=0;$j<count($raw[$i]);$j++)
		{
			$rows[] = $raw[$i][$j];		
		}
	}
$row = [];	
for($i=0;$i<count($rows);$i++)
{	
	$row[$i] = $rows[$i]; 
}

$i =0;
$ro = [];
while($i < count($row))
{
	$f[]= $row[$i];	
	$sql = "select * from physics where id = ' ". $f[$i] ."'";
		
	$res = mysqli_query($mysqli,$sql);
	while($r = mysqli_fetch_assoc($res)) 
	{
    	$ro[] = $r;
				
	}
	$i++; 
	
}
	
	
$var1 = [];
$var10 = [];
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
						for($b = 1 ;$b<count($str);$b++)
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
	echo "<b>Question </b>";
	echo $z;
	echo "<br>";
	if($var[$i]['answer']['usekatex'] == '1')
	{
		echo "<div lang='latex'>";
		echo "$\mathit{";
	}	
	echo "&nbsp;&nbsp;&nbsp;&nbsp;".$var2[$i];
	if($var[$i]['answer']['usekatex'] == '1')
	{
		echo "}$";
		echo "</div>";
	}
	
	echo "<br>";

if($var10[$i] == 'm')
{	

	for($b = 1,$c = 'A' ;$b<=4;$b++,$c++)
	{
		if($str[$i] == $b)	
		{
			if($str[$i] == $var3[$i] )		
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
			if($str[$i] != $var3[$i] )		
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
		if(!empty($var6[$i]) || !empty($var5[$i]))
		{
			echo "<div class=item-title><font color='blue'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Solution</font></div>
   			<div class=item-content style='display : none'>
      			<div class=item-body>";
      	}
			if(!empty($var6[$i]))
			{
				
				echo "Solution Video";
				echo "<br>";
				$pp = $var6[$i];
				$o = explode('watch?v=',$pp);
				@$op = $o[0] .'embed/'.$o[1];
				
				echo "<iframe width='560' height='315' src='$op' frameborder='0' allow='encrypted-media' allowfullscreen></iframe>";
			}
	if(!empty($var5[$i]))
	{
		echo "<br>";
		echo "Solution";
		echo "<br>";
		echo $var5[$i];
	}	
	echo "<br>";
	echo "</div>";
	echo "</div>";
	echo "</div>";	
	
}
else if($var10[$i] == 's')
{
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Answer Given:";
	echo "<label> &nbsp;&nbsp;&nbsp;&nbsp;$str[$i] </label>";
	
	if(is_numeric($var12[$i])){
		$var13[$i] = $var[$i]['answer']['range_1'];
		$var14[$i] = $var[$i]['answer']['range_2'];
		if($str[$i]==$var12[$i]){
			echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
			}
		else if($str[$i]>=$var13[$i] && $str[$i]<=$var14[$i]){
			echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
			}
		else{
			echo "<img src ='Images/worng.png' style=' width:20px; height: 19px;'>";
			}
	}
	else{
		if($str[$i]==$var12[$i]){
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
	echo "<div class=item-title><font color='blue'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Solution</font></div>
   			<div class=item-content style='display : none'>
      			<div class=item-body >";
	if(!empty($var6[$i]))
	{
								$pp = $var6[$i];
				$o = explode('watch?v=',$pp);
				if(isset($o[0]) and isset($o[1]))
				{
					echo "Solution Video";
					echo "<br>";

					$op = $o[0] .'embed/'.$o[1];
					echo "<iframe width='560' height='315' src='$op' frameborder='0' allow='encrypted-media' allowfullscreen></iframe>";	
				}
				else
				{
					
				}	
	}
	echo "<br>";
	echo "Solution";
	echo "<br>";
	echo $var5[$i];
	echo "</div>";
		echo "<br>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}		
echo "<hr>";	
}
}
?>
</body>
<footer>
  <script src="http://latex.codecogs.com/latexit.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="JS/history.js"></script>
</footer>
</html>
