<?php
include "header.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<title>AHAGURU</title>
<style>
#b{
margin-left:25px;
}
</style>
<header>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
<link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
<link rel="stylesheet" href="css/main.css">
<link  rel="stylesheet" href="css/font.css">
</header>
<?php
$id = $_SESSION["id"];
echo $id;
$que = $_POST['que'];
$q_no = $que;
$que_no=$que;
$que1 = $que-1;
$time = $que*60000;
?>
<body bgcolor="#990000" onLoad="f2()" onkeypress="return disableCtrlKeyCombination(event);" onkeydown="return disableCtrlKeyCombination(event);">
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="index.php" class="w3-bar-item w3-button w3-wide">AHAGURU</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
	<table width="100%" align="right">
        <tr><td><i class="fa fa-clock-o" style="font-size:24px"></i>&nbsp;</td>
		<td align="right"><div id="starttime"></div>
            <div id="endtime"></div>
			
          <div id="showtime">
         </td><td><a href="#SIGNOUT" class="w3-bar-item w3-button"><i class="fa fa-sign-out" aria-hidden="true"></i>SIGNOUT</a></td>
		 <td><a  class="w3-bar-item w3-button"><?php
		 if(isset($_SESSION["name"]))
		 {
		  echo $_SESSION["name"];
		 }
		 else if(isset($_SESSION["name"]))
		 {
		 	header('location:login.php');
		 }
		 
		 
		 ?></a></td></tr>
	  </table>
       

    </div><!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onClick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>

  </div>
</div>
<div class="panel" style="margin:5%">

<?php
if($_POST['select'] != 'all')
{
	if(isset($_POST['select']) and isset($_POST['subject']) )
	{
		$subject = $_POST['select'];
		$chap = $_POST['subject'];
		$sql = "select right_answer from ag_ma_test where id = '$id' ";	
		$re = $mysqli->query($sql);
		$res ="";
		if ($re->num_rows > 0) {
    		while($row = $re->fetch_assoc()) {
	   		$res = $row["right_answer"].",".$res;
    		}
	}
$abcd110 = substr($res, 0, -1);
$str10 = explode(",",$abcd110);
$str110 = implode(" OR id = ",$str10);
$str210 = "id = ".$str110;
$ra = [];
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
$h  = [];

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
for($i=0;$i<count($a);$i++)
{
		if(($subject == $c[$i] ) and ($chap ==  $d[$i]))
		{
			$f[] = $h[$i];
		}
}
$s1 = implode(",",$f);
for($i = 0;$i < 1;$i++)
{
$rows2 = [];
		

	if($str110 == '')
	{
		$que_main = "select * from physics where rid IN($s1) order by rand() LIMIT $q_no";
		$result = $mysqli->query($que_main);
	
		
	}
	else
	{
			//$que_ma = "select * from physics where rid = $f[$i] order by rand() LIMIT $q_no";
			$que_ma = "select * from physics where rid IN ($s1) and id NOT IN (select id from physics where $str210)  order by rand() LIMIT $q_no";
			$result1 = $mysqli->query($que_ma);
			
			@$co = 	mysqli_num_rows($result1);
			if($co < $q_no)
			{
					$remain = $q_no - $co;
					$que_main1 = "select * from physics where rid IN ($s1) and id IN (select id from physics where $str210) order by rand() LIMIT $remain ";
					$result2 = $mysqli->query($que_main1);
					while(@$r = mysqli_fetch_assoc($result2))
					{
						$rows2[] = $r;
					}	
					

			}
			else
			{
				$que_main2 = "select * from physics where rid IN($s1) order by rand() LIMIT $q_no ";
				$result2 = $mysqli->query($que_main2);
				while($r = mysqli_fetch_assoc($result2))
					{
						$rows2[] = $r;
					}	
					
			}			
	}
}

}
}
else 
{
	$rows2 = [];
	$sql = "select right_answer from ag_ma_test where id = '$id'";
	$result = $mysqli->query($sql);
	$res ="";
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	   $res = $row["right_answer"].",".$res;
    	}
	}
	$abcd110 = substr($res, 0, -1);	
	$str10 = explode(",",$abcd110);
	$str110 = implode(" OR id = ",$str10);
	$str210 = "id = ".$str110;
			
	if($str110 == "")
	{
		$que_main = "select * from physics  order by rand() LIMIT $q_no ";
		$result = $mysqli->query($que_main);	
		
	}	
	else
	{
		$que_ma = "select * from physics where id NOT IN (select id from physics where $str210) order by rand() LIMIT $q_no  ";
		$result1 = $mysqli->query($que_ma);
		
		$co = 	mysqli_num_rows($result1);
		
		if($co < $q_no)
		{
					$remain = $q_no - $co;
					$que_ma = "select * from physics where id IN (select id from physics where $str210) order by rand() LIMIT $remain ";
					$result2 = $mysqli->query($que_ma);
					while($r = mysqli_fetch_assoc($result2))
					{
						$rows2[] = $r;

					}	

		}
		else
		{
			$que_m = "select * from physics  order by rand() LIMIT $q_no";
			$result2 = $mysqli->query($que_m);
	
		}
			
	}
}	

?>
<form name="quiz" action="exam_result.php" onSubmit="if(!confirm('Are You Really Want To Submit?')){return false;} else{check(this);}" class="form-horizontal" method="post">
  <p>
    <?php 
						
			if(isset($result))
			{
				while($r = mysqli_fetch_assoc($result)) 
				{
    				$rows[] = $r;
				}
			}
			if(isset($result1))
			{
				while(@$r = mysqli_fetch_assoc($result1)) 
				{
    				$rows1[] = $r;
				}
			}
			
				if(!empty($rows2) and !empty($rows1))
				{
					$rows = array_merge($rows1,$rows2);
					
				}
				elseif(!empty($rows2))
				{
					$rows = $rows2;
					
				}
				elseif(!empty($rows1))
				{
					$rows = $rows1;
				}
				$var1 = [];
				$var2 = [];
				$var3 = [];
				$var5 = [];
				$var6 = [];
				$var7 = [];
				$var = [];
				for($i=0;$i<@count($rows);$i++)
				{
					$var1[]= $rows[$i]['id'];
					
				}
				for($i=0;$i<count($var1);$i++)
				{
					$var[] = json_decode($rows[$i]['queandans'] ,TRUE);
					
				}				
			    for($i=0;$i<count($var1);$i++)
				{
					if(isset($var [$i]) )
					{
					
					$var2[$i] = $var[$i]['questiontext']['text'];
					@$var3[$i] = $var [$i]['questiontext']['answerno'];
					$var5[$i] = $var [$i]['solution']['text'];
					$var6[$i] = $var [$i]['solution']['link'];
					
					$var9[$i] = $var [$i]['questiontext']['browser'];
					$var10[$i] = $var [$i]['questiontext']['browser2'];
					
					if(isset($var[$i]['option']))
					{			
						foreach(@$var[$i]['option'] as $key=>$value)
						{
							@$var7[$key]= $value;
							  
						}
						}
						}		 
					}		
					$src = [];
					for($i = 0 ;$i<count($var1);$i++)
					{
						$tt= preg_match_all( '@src="([^"]+)"@' , $var2[$i], $match );
						if($tt == 1)
						{
							$src = array_pop($match);
						}
					}
					for($i = 0 ;$i < count($var1)	;$i++)
					{				
						?>
					<?php	echo "<input type='hidden' name =qid$i value=$var1[$i] >";?>
    
						 		
						<p class="form-title">Question :<?php echo $i+1 ?></p>
    					 <b>	
						 <?php if($var[$i]['answer']['usekatex'] == '1'){
							echo "<div lang='latex' id='ash'>";
							echo "$\mathit{";
							}?>
						 <?php echo $var2[$i];
						 if($var[$i]['answer']['usekatex'] == '1'){
							echo "}$";
							echo "</div>";
							} ?> 
						 </b>
								<!---<?php 
								if(isset($src[0]))
								{
									//echo "<img src= @$src[0]> ";	
								}
								?>----->
						<p>	
							
							<?php
							@$correctanswer[]=$var[$i]['questiontext']['correctanswer'];
							@$range1[] = $var[$i]['answer']['range_1'];
							@$range2[] = $var[$i]['answer']['range_2'];
							$sorm[] = $rows[$i]['sorm'];
							echo "<input  type='hidden' value=$sorm[$i] name=sorm$i>";
							if($rows[$i]['sorm'] == 's')
							{	
								echo "<input type='hidden' value=$correctanswer[$i] name=answer$i>";
								echo "<input type='hidden' value=$range1[$i] name=range1$i>";
								echo "<input type='hidden' value=$range2[$i] name=range2$i>";
								
        					}
							elseif($rows[$i]['sorm'] == 'm')
							{
								echo "<input type='hidden' value=$var3[$i] name=answer$i>";
							}	
							?>
								<?php
							echo "<div>";	
							@	$co = count($var[$i]['option']);
								if($co > 0)
								{
								 for($b = 0 ;$b<$co;$b++)
						 			{
										$radio_value = $b+1;
										if($var[$i]['answer']['usekatex'] == '1')
										{
											echo "<table id='b'>";
											echo "<tr><td>";
											echo "<input type='radio' value=$radio_value  name=opt$i></td><td>";
											echo "<h6 lang='latex'>";
											echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$var[$i]['option'][$b+1]['text'];
											echo "</h6></td></tr></table>";
											
										}	
										if($var[$i]['answer']['usekatex'] != '1')
										{	
										echo  "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."<input type='radio' value=$radio_value  name=opt$i>" .$var[$i]['option'][$b+1]['text']."";
										echo "<br>";
										}	
									
									}
								}
								else if($rows[$i]['sorm'] == 's')
								{
									if($var[$i]['answer']['prefix'] != '')
									{
										echo $var[$i]['answer']['prefix'];
									}	
									if(is_numeric( $var[$i]['questiontext']['correctanswer']))
									{
										echo "<input type='text' name=opt$i onkeypress='return mask(this,event);'>";
										}
										else
										{
										echo "<input type='text' name=opt$i>";
										}
									if($var[$i]['answer']['suffix'] != '')
									{
										echo $var[$i]['answer']['suffix'];				
									}	
								}
							echo "<hr>";		
			
					}
						echo "<div>";		
								
								?> 
      
					<p>
<center><input type="submit" value="Hit Me to Finish"/></center>					
</form></body>
<footer>
<script src="http://latex.codecogs.com/latexit.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="JS/exam.js"></script>
<script type="text/javascript" src="JS/quiz.js"></script>
<script language="JavaScript" type="text/javascript"> 
var t = setTimeout("document.quiz.submit();",'<?php echo $time; ?>'); //2 seconds measured in miliseconds
</script>
<script language ="javascript">
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
var tim;       
      	var min = <?php echo $que1; ?>;
        var sec = 60;
		function pad2(number) {
    	return (number < 10 ? '0' : '') + number
		}
        var f = new Date();
			function f2() {
			// for block f5
						document.onkeydown = function() {
							if(event.keyCode == 116) {
								event.returnValue = false;
								event.keyCode = 0;
								return false;
							}
						}
	            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = pad2(min)+" : " + pad2(sec);
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                    min = parseInt(min) - 1;
                    if (parseInt(min) < 0) {
                        clearTimeout(tim);
                    }
                    else {
                        sec = 59;
                        document.getElementById("showtime").innerHTML = pad2(min) +" : " + pad2(sec);
                        tim = setTimeout("f2()", 1000);
                    }
                }
               
            }
        }
</script>
<script>
function show_next()
{
<?php 
$question_no; //my global php variable to keep track of question id
$question_no = $question_no + 1; 
show_question($question_no); //php function which shows data according to question no 
?>
 }
function show_prev()
{
<?php 
if($question_no>0)
{
$question_no = $question_no-1;
show_question();
}
else
{
?>
alert("Wrong Operation");
<?php
}
?>
}
</script>
<script>
function show_next()
{
<?php 
$question_no; //my global php variable to keep track of question id
$question_no = $question_no + 1; 
show_question($question_no); //php function which shows data according to question no 
?>
 }
function show_prev()
{
<?php 
if($question_no>0)
{
$question_no = $question_no-1;
show_question();
}
else
{
?>
alert("Wrong Operation");
<?php
}
?>
}
</script>
</footer>
</html>
