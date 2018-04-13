<?php
include "header.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<header>
<link rel="stylesheet" href="css/practice.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</header>
<body>
<br /><br />

<?php
$b = [];
$c = [];
$d = [];
$e = [];
$f = [];
$h  = [];
if(isset($_POST['que']))
{
	$quesno = $_POST['que'];
	@$subject = $_POST['select'];
	@$chap = $_POST['subject'];
}	
$ra = [];
$sq = "select * from physics";
$res = mysqli_query($mysqli,$sq);
$ro = [];

while($r = mysqli_fetch_assoc($res)) 
{
	$ra[] = $r;
  				
}
if($subject != 'all' )
{
	$a = [];
	for($i=0;$i<count($ra);$i++)
	{
		$a[] = $ra[$i]['id'];
	}
					
	for($i=0;$i<count($a);$i++)
		$b[] = json_decode($ra[$i]['queandans'] ,TRUE);
				
				
	for($i=0;$i<count($b);$i++)
	{
			if(isset($b [$i]) )
			{
				$c[$i] = $b [$i]['questiontext']['browser'];
				$d[$i] = $b [$i]['questiontext']['browser2'];
				$h[$i] = $ra [$i]['rid'];
			}
	}	
	for($i=0;$i<count($b);$i++)
	{
			if(($subject == $c[$i] ) and ($chap ==  $d[$i]))
			{
				$f[] = $h[$i];
			
			}
	}

	for($i=0;$i<count($f);$i++)
	{	
		$que_mai = "select * from physics where rid = $f[$i] order by rand() LIMIT $quesno";
		$result = mysqli_query($mysqli,$que_mai);	
		while($row = mysqli_fetch_assoc($result))
		{
			$ro[] = $row;
		}
	
	}
}
else
{
		$que_main = "select * from physics order by rand() LIMIT $quesno";
		$result = mysqli_query($mysqli,$que_main);		
		while($row = mysqli_fetch_assoc($result))
		{
			$ro[] = $row;
		}

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
?>
<form method="post" name="answers" id="answers" action="practice_result.php">
<div id="qContainer">

<?php 
count($var1);
for($i = 0; $i<count($var1); $i++)
 {
 	$cont = "cont".$i;
    $contt = "contt".$i;
 	$conttt = "conttt".$i;
	$cons = "co".$i;
	 ?>	
	 	 <input type="hidden" id="count" value=<?php  echo $i ;?>>

						<div class='qPanel'>
						<div class='qText'>
						<br />
						<?php	echo "<input type='hidden' name =qid$i value=$var1[$i] >";
						
						?>
								
							&nbsp;&nbsp;&nbsp;Question &nbsp;
							<?php $a=$i+1; 
							echo $a; ?>:
							<br />
							<b>
							<?php if($var[$i]['answer']['usekatex'] == '1'){
							echo "<div lang='latex' id='d'>";
							echo "$\mathit{";
							}?>
							<?php echo "&nbsp;&nbsp;&nbsp;".$var2[$i];
							if($var[$i]['answer']['usekatex'] == '1'){
							echo "}$";
							echo "</div>";
							} ?>
						  </b>
							 <?php if($var[$i]['answer']['usekatex'] != '1'){
							 echo "<br />";
							 }?>
							<?php
							@$correctanswer[]=$var[$i]['questiontext']['correctanswer'];
							@$range1[] = $var[$i]['answer']['range_1'];
							@$range2[] = $var[$i]['answer']['range_2'];
							$sorm[] = $ro[$i]['sorm'];
							echo "<input  type='hidden' value=$sorm[$i] name=sorm$i>";
							echo "<input type='hidden' id=id$i value=$sorm[$i]>";

							if($ro[$i]['sorm'] == 's')
							{	
								echo "<input type='hidden' value=$correctanswer[$i] name=answer$i>";
								echo "<input type='hidden' value=$range1[$i] name=range1$i>";
								echo "<input type='hidden' value=$range2[$i] name=range2$i>";								
        					}
							elseif($ro[$i]['sorm'] == 'm')
							{
								echo "<input type='hidden' value=$var3[$i] name=answer$i>";
							}	
										@$co = count($var[$i]['option']);
								
								echo "<div id='$contt' class='content'>";
								
								if($co > 0)
								{
								 for($b = 0 ;$b<$co;$b++)
						 			{
										$radio_value = $b+1;
										if($var[$i]['answer']['usekatex'] == '1')
										{
											echo "<table id='b'>";
											echo "<tr><td>";
											echo "<input type='radio' value=$radio_value  name=opt$i onclick='viss($i)'></td><td>";
											echo "<h6 lang='latex'>";
											echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$var[$i]['option'][$b+1]['text'];
											echo "</h6></td></tr></table>";
											
										}	
										if($var[$i]['answer']['usekatex'] != '1')
										{	
										echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<input type='radio' value=$radio_value id=opt$i  name=opt$i onclick='viss($i)'>" .$var[$i]['option'][$b+1]['text']."";
										echo "<br>";
										}
									}
								}
								
								else if($ro[$i]['sorm'] == 's')
								{
									if($var[$i]['answer']['prefix'] != '')
									{
										echo $var[$i]['answer']['prefix'];
									}	
									if(is_numeric( $var[$i]['questiontext']['correctanswer']))
									{
										echo "<input type='text' onclick='viss($i)' id=opt$i name=opt$i onkeypress='return mask(this,event);'>";
									}
									else
									{
											echo "<input type='text' name=opt$i  id=opt$i onclick='viss($i)'>";
									}
									if($var[$i]['answer']['suffix'] != '')
									{
										echo $var[$i]['answer']['suffix'];				
									}	
								}
								echo "</div>"; 
						echo "<div id='$cont' class='content'>";
						echo "</div>";
								
					echo "<div id='$conttt' class='qwerty content hidden'>";

					echo "</div>";		
							?> 
							 </b>
						  </div>
		
		
					<div class="pers" align="right"> <?php hp($var1[$i]); ?> </div>
	
		
					<?php echo"<div id='$cons' class='ashu hidden'><input type='button' id=check$i value='View Solution' onclick ='vis($i,$var1[$i]);'/></div>";?>
					
				</div>
				
				
				
<?php } ?>
				<div id='nav'><a class='navbutton' onclick='nav(-1)'>&laquo; Previous Question</a> <a class='navbutton' onclick='nav(1)'>Next Question &raquo;</a><br /><br /><br /><br /><?php for($q=0;$q<count($ro);$q++){ $qq=$q+1; echo "<a class='qButton' onclick='show($q)'>$qq</a>"; }?></div>
					
                    <center><input class="button" type="submit" value="Submit Answers" onClick="show_alert();" name="submit1"/></center>	
				</form>
<?php
function hp($i)
{
include "config.php";
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
$qid = $i;
$sql = "select count(tid) as rtid from ag_ma_test where right_answer LIKE '%$qid%'";
$sql1 = "select count(tid) as wtid from ag_ma_test where wrong_answer LIKE '%$qid%'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       // echo $row["rtid"];
		$right = $row["rtid"];
    }
}
$result1 = $mysqli->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        //echo $row["wtid"];
		$wrong = $row["wtid"];
    }
}
$total = $right+$wrong;
if($total == 0)
{

}
if($total != 0)
{
$sucess = ($right/$total)*100;
$sucess1 = round($sucess, 2);
if(isset($sucess1) and isset($sucess) and isset($total))
{
	echo "Overall Success Rate : ".$sucess1."% in ".$total." Attempts";
}

}

$mysqli->close();
}
?>
<div id="h2">
</div>
</body>
<footer>
<script src="http://latex.codecogs.com/latexit.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="JS/practice.js"></script>
<script language ="javascript">
function vis(i,qid) 
{
	var str1 = "cont";
	var str3 = "contt";
	var str4 = "conttt";
	var str2 = i;
	var res = str1.concat(str2);
	var res1 = str3.concat(str2);
	var res2 = str4.concat(str2);
	var cons = "co".concat(str2);
//console.log(qid);
$(document).on("click",'#check'+(i),function() {
	 var k = $('#id'+(i)).val();	
	 var j = null;
	 if(k == "m")
	 {
	  	j = $('#opt'+(i)+':checked').val(); 
	 }		
	 else
	 {
	 	j = $('#opt'+(i)).val();
	 }
		 $.ajax({
				url: 'pratice_2.php',
				type: 'POST',
				data: 
				{
					opt:j,
					q:qid
				},
				success: function(data) {
				 $("#cont"+(i)).html(data);
				}
			});
		console.log(j);
		console.log(qid);
});
	document.getElementById(res1).classList.add('hidden');
	//document.getElementById(res).classList.remove('hidden');
	document.getElementById(res2).classList.remove('hidden');
	document.getElementById(cons).classList.add('hidden');

}
function viss(i){
var str2=i;
var cons="co".concat(str2);
document.getElementById(cons).classList.remove('hidden');
}

function mask(textbox, e) {

      var charCode = (e.which) ? e.which : e.keyCode;
	  if(charCode==46){
	   return true;
	  }
      else if (charCode > 31&& (charCode < 48 || charCode > 57)) 
         {
            alert("Only Numbers Allowed");
            return false;
         }
     else
         {
             return true;
         }
       }

</script>
<script>
function show_alert() {
 confirm("Are You Sure?");}
</script>
</footer>
</html>