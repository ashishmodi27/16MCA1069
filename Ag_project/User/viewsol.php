<?php
require "userlayout.php";
include "config.php";

	$var_value = $_GET['varname'];
	$test_id  = $_GET['var'];
	
if(isset($var_value) || isset($test_id))
{
	$sql = "select * from physics where id = '$var_value'";
	$result = mysqli_query($mysqli,$sql);
	while($r = mysqli_fetch_assoc($result)) 
	{
    	$data[] = $r;
				
	}
	$var1 = [];
	$var12 = [];
	$var2 = [];
	$var3 = [];
	$var1_1 = [];
	for($i=0;$i<count($data[0]);$i++)
	{
					$var1_1[] = $data[0]['id'];
					$var1[] = $data[0]['id'];
					$var2[] = $data[0]['queandans'];
					$ro[]  =  $data[0]['sorm'];
	}
}
				$var[] = json_decode($data[0]['queandans'] ,TRUE);
			    for($i=0;$i<count($var1);$i++)
				{
					if(isset($var [$i]) )
					{
					$var2[$i] = $var [0]['questiontext']['text'];
					@$var3[$i] = $var [0]['questiontext']['answerno'];
					$var5[$i] = $var [0]['solution']['text'];
					$var6[$i] = $var [0]['solution']['link'];
					$var9[$i] = $var [0]['questiontext']['browser'];
					$var10[$i] = $var [0]['questiontext']['browser2'];
					$j = 'a';
					if($ro[0] == 'm')
					{
						foreach($var[$i]['option'] as $key=>$value)
						{
						      $var7[$key]= $value;
							  
						}
					}	
					elseif($ro[0] == 's')
					{
						$var12[] = $var[0]['questiontext']['correctanswer'];
					}

					}	 
						$s = "select wrong_answer,qid,choice_selected from ag_ma_test where tid = '" . $test_id ."' ";
						$res = mysqli_query($mysqli,$s);
						$raw = "";
						$raw1 ="";
						while($r = mysqli_fetch_assoc($res)) 
						{
							$raw = $r['qid'];
							$raw1 = $r['choice_selected'];
						}
						$str11 = explode(",",$raw);
						$str12 = explode(",",$raw1);	
						$opt = null;
						print_r($var_value);
						$key = array_search($var_value, $str11);
						for($j=0;$j<count($str12);$j++)
						{
							if($str12[$j] == $var_value)
								{
									$opt = $str11[$j];
								}
						}		
				}
				
echo "<div style='margin-left:35px;'>";				
 echo "<br><br>";					
echo "<b>Question:</b>";
echo $var2[0] ;
echo "<br>";
							if($ro[0] == 's')
							{	
							/*	echo "<input type='hidden' value=$correctanswer[$i] name=answer$i>";
								echo "<input type='hidden' value=$range1[$i] name=range1$i>";
								echo "<input type='hidden' value=$range2[$i] name=range2$i>";
								*/
        					}
							elseif($ro[0] == 'm')
							{
								echo "<input type='hidden' value=$var3[0] name=answer$i>";
							}	
										@$co = count($var[0]['option']);
								
								if($co > 0)
								{
								 for($b = 0 ,$c = 'A';$b < $co; $b++,$c++)
						 			{
										$x = $var3[0] - 1 ; 
										$y = $b+1;
										if($x == $b)
										{
											echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $c .')' . "&nbsp;&nbsp;" .$var[0]['option'][$b+1]['text']. "</h1></td><td>&nbsp; <img src ='Images/correct.png' style=' width:20px; height: 19px;'></td></tr></table>";
										}
										else if($str12[$key] == $y)
										{
											echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $c .')' . "&nbsp;&nbsp;"  .$var[0]['option'][$b+1]['text'] . "</h1></td><td>&nbsp; <img src ='Images/worng.png' style=' width:20px; height: 19px;'></td></tr></table>";

										}
										else
										{
											echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". $c .')' . "&nbsp;&nbsp;"  .$var[0]['option'][$b+1]['text'] . "</h1></td></tr></table>";

										}
										echo "<br>";
									}
										echo "<br>";
										echo "<b>Your Choosed Option :</b> ";	
										if($str12[$key] == '')
										{
											echo "NOT SELECTED ";
										}
										else
										{
											echo $var[0]['option'][$str12[$key]]['text']."<br>";
										}
										
								}
								
								else if($ro[0] == 's')
								{
									echo "<br>";
									echo "<b>Correct Answer: </b>&nbsp;&nbsp;&nbsp;&nbsp;";
									if($var[0]['answer']['prefix'] != ''){
										echo $var[0]['answer']['prefix'];
										echo "&nbsp;&nbsp;&nbsp;&nbsp;";
									}
									echo $var12[0];
									if($var[0]['answer']['suffix'] != ''){
										echo "&nbsp;&nbsp;&nbsp;&nbsp;";
										echo $var[0]['answer']['suffix'];				
									}	
									echo "<br><b>Your Answer: </b>&nbsp;&nbsp;&nbsp;&nbsp;";
									if($var[0]['answer']['prefix'] != ''){
										echo $var[0]['answer']['prefix'];
										echo "&nbsp;&nbsp;&nbsp;&nbsp;";
									}
									echo $str12[$key];
									if($var[0]['answer']['suffix'] != ''){
										echo "&nbsp;&nbsp;&nbsp;&nbsp;";
										echo $var[0]['answer']['suffix'];				
									}
									
									
									if(is_numeric($var12[0])){
										$var13[0] = $var[0]['answer']['range_1'];
										$var14[0] = $var[0]['answer']['range_2'];
										if($str12[$key]==$var12[0]){
											echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
											}
										else if($str12[$key]>=$var13[0] && $str12[$key]<=$var14[0]){
											echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
											}
										else{
											echo "<img src ='Images/worng.png' style=' width:20px; height: 19px;'>";
											}
										}
										else{
											if($str12[$key]==$var12[0]){
											echo "<img src ='Images/correct.png' style=' width:20px; height: 19px;'>";
											}
										else{
											echo "<img src ='Images/worng.png' style=' width:20px; height: 19px;'>";
										}
									}
									
								}

if(!empty($var6[0]))
{	
	echo "<br>";	
	echo "<br>";
	echo "<b>Video Solution:</b>";
	echo "<br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	$pp = $var6[0];
	$o = explode('watch?v=',$pp);
	@$op = $o[0] .'embed/'.$o[1];
	echo "<iframe width='700' height='315'
	src= $op>
	</iframe>"	;
}
if(!empty($var5[0]))
{
	echo "<br>";
	echo "<b>Solution:</b>";
	echo "<br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<label> $var5[0] </label>";
}
echo "</div>";

?>