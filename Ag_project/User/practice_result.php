<html>
<header>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/result.css">
<style>
.abcd3{display:inline-block;text-align:center}
.abcd3{padding:10px 100px; font-size:20px;border-radius:5px;color:#FFF;text-decoration:none;background: #0000FF; font-weight:bold;}
</style>
</header>
<?php
include "userlayout.php" ;
$id = $_SESSION["id"];
$data1 = json_encode($_POST);
$data[] = json_decode($data1,true);
if(isset($data))
{
	
				$var1 = [];
				$var2 = [];
				$var3 = [];
				$var1_1 = [];
				for($i=0;$i<count($data[0]);$i++)
				{
					if(@$data[0]['qid'.$i] == '')
					break;
					$var1_1[] = $data[0]['qid'.$i];
					$var1[] = $data[0]['qid'.$i];
					$var2[] = $data[0]['answer'.$i];
				    @$var3[] = $data[0]['opt'.$i];
					$var7[] = $data[0]['sorm'.$i];
					@$var21[] = $data[0]['range1'.$i];
					@$var22[] = $data[0]['range2'.$i];
				}
				$right = array();
				$wrong = array();
				$nott = array();
			
			$sqll = "select * from ag_ma_test";
			$result = mysqli_query($mysqli,$sqll);
			$count_result = mysqli_num_rows($result);	
			$t_id = 't'.($count_result + 1);	
			$resultt = null;
		?>
			<div style='margin:5%'><center>
				<?php
					$count = 0;
				    $cout = 0; 
					$not_attempt = 0;
					for($j = 0; $j <count($var1); $j++)
					{
						if($var7[$j] == 'm')
						{
							if($var2[$j] == $var3[$j])
							{
								$count = $count + 1;
						 		array_push($right,$var1[$j]);
							}
							else if($var3[$j] == "")
							{
								$not_attempt = $not_attempt+1;			
								array_push($nott,$var1[$j]);					
							}
							else if($var2[$j] != $var3[$j])
							{
								$cout = $cout+1;
								array_push($wrong,$var1[$j]);				
							}
						}
						elseif($var7[$j] == 's')
						{
							$b = $var2[$j];
							$a = $var3[$j];
							$c = $var21[$j];
							$d = $var22[$j];
							if(is_numeric($b)){
								if($b == $a)
								{
									$count = $count + 1;
									array_push($right,$var1[$j]);
								}
								else if($a <= $d && $a>= $c)   // range 1 and range 2
								{
									$count = $count + 1;
									array_push($right,$var1[$j]);
								}
								else if($var3[$j] =="")
								{
									
									$not_attempt = $not_attempt + 1;			
									array_push($nott,$var1[$j]);					
								}
								else if($b != $a)
								{
									$cout = $cout + 1;
									array_push($wrong,$var1[$j]);
								}	
							else{
								if($b == $a)
								{
									$count = $count + 1;
									array_push($right,$var1[$j]);
	
								}
								else if($var3[$j] == "")
								{
									$not_attempt = $not_attempt + 1;			
									array_push($nott,$var1[$j]);					
								}
								else if($b != $a)
								{
									$cout = $cout + 1;
									array_push($wrong,$var1[$j]);
								}	
							}
							}	
						}	
					
					}	
						$total_que = count($var1);


	  echo "<table > 
	  		<tr>
			<td width='658'>
			<center>
			<table width='200' height='225'>
			<tr>
			<td>
			<div class='abcd2'>Total Que. ".$total_que."</div>
			</td>
			</tr>
			<tr>
			<td>
			<div class='abcd0'>Correct ".$count."</div>
			</td>
			</tr>
			<tr>
			<td>
			<div class='abcd1'>Wrong ".$cout."</div>
			</td>
			</tr>
			<tr>
			<td>
			<div class='abcd3'>Not Attempt ".$not_attempt."</div>
			</td>
			</tr>
			<tr>
			<td height='20' align='center'>
			<button class='abcd' onclick='ShowDiv()'>Full Details <span><i class='fa fa-angle-double-right'></i></span></button>
			<br>
			</td>
			</tr>
			</table>
			</center>
			</td>
			<td>
	   <div id='chart_div' style='width:900px; height:500px;'> 
	   </div>
	   	</td>
		</tr>
		</table>";
	   	if(empty($var3))
		{
			$choice = 0;
		}	
		if(!empty($var3))
		{
	   		$choice = implode(',',$var3);
		}
			
		if(empty($right))
 		{
			array_push($right,'0');
  		}
		if(empty($wrong))
		{
			array_push($wrong,'0');
		}
		if(empty($nott))
		{
			array_push($nott,'0');
		}
$wrong_update =  implode(', ', $wrong);
$right_update =  implode(', ', $right);
$nott_update =  implode(', ', $nott);
$q_id = implode(', ',$var1_1);
$sql = "insert into	ag_ma_test(tid,right_answer,wrong_answer,not_attempt,id,score,qid,choice_selected) values('$t_id','". $right_update ."','".$wrong_update."','". $nott_update ."','$id','". $count. "','" . $q_id. "','". $choice."')";
$resultt = mysqli_query($mysqli,$sql) or die('error');
}
?>
<div style='margin:5%'><center>	<?php 
$solution = "viewsol.php";
echo "<div id='myDiv' style='display:none;' class='answer_list'>";
	echo "<table >";
	echo "<div class='abcd0'>Full Result</div>";
for($j=0,$a = 1;$j<count($var1),$a <= count($var1);$a++,$j++)
{

	if($var7[$j] == 's')
	{
		if($var3[$j] <= $var22[$j]  && $var3[$j] >= $var21[$j])
		{
			echo "<tr>";
			echo "<td bgcolor='#FFA500'; width='200';><center><span style='color:white'>". $a ."</span></center></td><td bgcolor='#008000'; width='200';><center><span style='color:white'>Correct</span></center></td></tr>";
		}
		elseif($var3[$j] == $var2[$j])
		{
			
			echo "<tr>";
			echo "<td bgcolor='#FFA500'; width='200';><center><span style='color:white'>". $a ."</span></center></td><td bgcolor='#008000'; width='200';><center><span style='color:white'>Correct</span></center></td></tr>";
			
		}
		else if($var3[$j]=="")
		{
			
			echo "<tr>";
			echo "<td bgcolor='#FFA500'; width='200';><center><span style='color:white'>". $a ."</span></center></td><td bgcolor='#0000FF'; width='200';><center><span style='color:white'>Not Attempt</span></center></td><td><a href='$solution?varname=$var1[$j]&var=$t_id'>Click here</a></td></tr>";
		
		}
		else if($var2[$j] != $var3[$j])
		{
			echo "<tr>";
			echo "<td bgcolor='#FFA500'; width='200';><center><span style='color:white'>". $a ."</span></center></td><td bgcolor='#F00'; width='200';><center><span style='color:White'>Wrong</span><center></td><td><a href='$solution?varname=$var1[$j]&var=$t_id'>Click here</a></td></tr>";

		}
		
	}
	else
	{
		if($var2[$j] == $var3[$j])
		{
			echo "<tr>";
			echo "<td bgcolor='#FFA500'; width='200';><center><span style='color:white'>". $a ."</span></center></td><td bgcolor='#008000'; width='200';><center><span style='color:white'>Correct</span></center></td></tr>";
		
		}
		else if($var3[$j]=="")
		{
			
			echo "<tr>";
			echo "<td bgcolor='#FFA500'; width='200';><center><span style='color:white'>". $a ."</span></center></td><td bgcolor='#0000FF'; width='200';><center><span style='color:white'>Not Attempt</span></center></td><td><a href='$solution?varname=$var1[$j]&var=$t_id' onClick='window.location.href='$solution?varname=$var1[$j]&var=$t_id';return false;' target='_blank'>Click here</a></td></tr>";
		
		}
		else if($var2[$j] != $var3[$j])
		{
			
			echo "<tr>";
			echo "<td bgcolor='#FFA500'; width='200';><center><span style='color:white'>". $a ."</span></center></td><td bgcolor='#F00'; width='200';><center><span style='color:White'>Wrong</span><center></td><td><a href='$solution?varname=$var1[$j]&var=$t_id' onClick='window.location.href='$solution?varname=$var1[$j]&var=$t_id';return false;' target='_blank'>Click here</a></td></tr>";
		
		}
	}
	
}	
echo "</table>";
echo "</div>";
?>
</center>
</div>
<footer>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table, 
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Options');
      data.addRows([
        ['correct', <?php echo $count;?>],
        ['wrong', <?php echo $cout;?>],
		['Not Attempt',<?php echo $not_attempt;?>]
      ]);
// Set chart options
      var options = {
  width: 900,
  height: 500,
  title: 'Your Result Chart',
  colors: ['#008000', '#F00','#0000FF']
};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
	function ShowDiv() {
    document.getElementById("myDiv").style.display = "";
}
</script>
</footer>
</html>