<?php
include "config.php";
include "Class_model.php";
include "Class_utility.php";
session_start();
$Model= new baseModel();
$Util= new Util();
?>
<!DOCTYPE html>
<html>
<title>AHAGURU</title>
<header>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/index.css">
</header>
<body>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">AHAGURU</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
	<a href="webscraping/index.php" class="w3-bar-item w3-button">SEARCH</a>
	<a href="book/index.php" class="w3-bar-item w3-button">LEARN</a>
      <a href="#exam" class="w3-bar-item w3-button">EXAM</a>
      <a href="#game" class="w3-bar-item w3-button">GAME</a>
      <a href="testpage.php" class="w3-bar-item w3-button">PRATICE HISTORY</a>
	   <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out" aria-hidden="true"></i>
SIGNOUT</a>
<a  class="w3-bar-item w3-button"><?php 
if(!isset($_SESSION['name']))
{
		
	  header('location:login.php');	
}
if(isset($_SESSION['name']))
{
	
echo $_SESSION['name'];

}


?></a>
		
            

    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onClick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onClick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ?</a>
  <a href="#exam" onClick="w3_close()" class="w3-bar-item w3-button">EXAM</a>
  <a href="#game" onClick="w3_close()" class="w3-bar-item w3-button">GAME</a>
  <a href="#signout" onClick="w3_close()" class="w3-bar-item w3-button">SIGNOUT</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <p><a href="#exam" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Take a Quiz today</a></p>
  </div> 
</header>
<br>
<!-- exam Section -->
<div class="w3-container" style="padding:128px 16px" id="exam">
  <h3 class="w3-center">ONLINE TEST</h3>
  <p class="w3-center w3-large">WELCOME TO THE PORTAL</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
  
</head>
<div style="width: 99%;">
<table border="0"><tr><td width="769" >    
<h2><p align="left">Instructions to be followed.</p></h2><ul><li>
<p align="left">exams can be taken subject-wise or on whole.</p></li><li>
<p align="left">exams answers can be viewed at the end.</p></li></ul>
</td><td  width="1000">
    
 		<div class="w3-container" style="height:100px;">
	
<form id="form_id" method="post" name="myform"> 
  	<!-- <div class="w3-border" >
   		 <div class="w3-container w3-margin w3-grey">-->
<div id="div4">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="form_action" onChange="select_change()" style="width: 150px;">
<option  value="practice.php"  >PRACTICE</option>
<option   value="quiz.php" >TEST</option>
</select>
</div>		 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subjects &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <select name="select" id="select" style="width: 150px;">
    <option name="tab" value ="all" onClick="show1();" >ALL SUBJECT</option>
		<?php 
		
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
			$abc = array();
			$qw = array_unique($c);
			for($i=0;$i<count($c);$i++)
			{
			if(@$qw[$i]!="")
			{
			array_push($abc,$qw[$i]);
			}
			}
			for($i=0;$i<count($abc);$i++)
			{
			$str = strtoupper($abc[$i]);
			echo "  <option name='tab' value='$abc[$i]' onClick='show2();' >  $str </option>";
			}
		  
    ?>
	
  </select>

<div id="div1"  class="hide">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chapter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select id="doll" name="subject" style="width: 150px;">
		
	</select>
</div>
<div id="div2">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No.Of.Question:
<select name="que" style="width: 150px;" >
<option  value="5" >5</option>
<option  value="10" >10</option>
<option  value="15"  >15</option>
<option  value="20"  >20</option>
<option  value="25"  >25</option>
</select>
</div>
<div id="div3">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Complexity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select id="Complexity" name="Complexity" style="width: 150px;">
<option  value="IIT_MAIN"  >IIT MAIN</option>
<option  value="IIT_JEE"  >IIT JEE</option>
<option  value="AIEEE"  >AIEEE</option>
<option  value="SCHOOL"  >SCHOOL</option>
</select>
</div>

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
<input type="button" value="Submit" onClick="myfunction()"/>
   </form>
	  </div>
  </td></tr></table>
<br><br><br><br><br><br><br><br>
<!-- Game -->

<header id="game">
  <meta charset="UTF-8">
  <title>Thumbnail Animation Effects</title>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* ------------------------ */
/* Variables				*/
/* ------------------------ */
/* ------------------------ */
/* Some Helper Mixins		*/
/* ------------------------ */
/* ------------------------ */
/* The Magic :)				*/
/* ------------------------ */

.shake {
  transition: transform;
  transition-duration: 200ms;
  transition-timing-function: ease-out;
}
.shake:hover {
  animation: shake 10, grow steps(10) forwards;
  animation-duration: 0.1s, 1s;
}
.shake:hover.from-center {
  animation: shake-from-center 10, grow steps(10) forwards;
  animation-duration: 0.1s, 1s;
}

/* ------------------------ */
/* Animations				*/
/* ------------------------ */
@keyframes grow {
  from {
    width: 200px;
    height: 200px;
  }
  to {
    width: 620px;
    height: 400px;
  }
}
@keyframes shake {
  0% {
    transform: translateX(-5px) rotate(-5deg);
  }
  50% {
    transform: translateX(5px) rotate(5deg);
  }
  100% {
    transform: translateX(-5px) rotate(-5deg);
  }
}
@keyframes shake-from-center {
  0% {
    transform: translateX(calc(-50% - 5px)) rotate(-5deg);
  }
  50% {
    transform: translateX(calc(-50% + 5px)) rotate(5deg);
  }
  100% {
    transform: translateX(calc(-50% - 5px)) rotate(-5deg);
  }
}
/* ------------------------ */
/* General Styles			*/
/* ------------------------ */

.row {
  position: relative;
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);
  background-size: cover;
  background-size: 100%;
  background-image: -moz-linear-gradient(290deg, rgba(65, 166, 180, 0.9), rgba(149, 207, 184, 0.9));
  background-image: -webkit-linear-gradient(290deg, rgba(65, 166, 180, 0.9), rgba(149, 207, 184, 0.9));
  background-image: linear-gradient(160deg, rgba(65, 166, 180, 0.9), rgba(149, 207, 184, 0.9));
}
.row:first-child, .row:last-child {
  background: #41a6b4;
}
.row.header .row__inner, .row.footer .row__inner {
  text-align: center;
  line-height: 0.75em;
  padding: 50px 0;
}
.row:not(.header):not(.footer) .row__inner {
  height: 500px;
}

.row__inner {
  margin: 0 auto;
  padding: 10px 10 30px 10;
  width: 620px;
  position: relative;
}

.block {
  width: 200px;
  height: 200px;
  position: absolute;
  border-radius: 25px;
  box-sizing: border-box;
}
.block:before, .block:after {
  border-radius: 5px;
  overflow: hidden;
  box-sizing: border-box;
}
.block:hover {
  z-index: 100;
}

.to-left,
.to-left:before,
.to-left:after {
  right: 0;
}

.to-right,
.to-right:before,
.to-right:after {
  left: 0;
}

.from-center,
.from-center:before,
.from-center:after {
  left: 50%;
  transform: translateX(-50%);
}

/* ------------------------ */
/* Lorem Pixels				*/
/* ------------------------ */

.shake:nth-child(2) {
    background-color:#ccd9ff;
  background-size: cover;
  background-position: center center;
}
.shake:nth-child(3) {
    background-color:#b3b3ff;

  background-size: cover;
  background-position: center center;
}
.shake:nth-child(4) {
    background-color:#ccfff2;
  background-size: cover;
  background-position: center center;
}

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</header>

<body>
<br><br>
<div id="shake" class="row"><br><br>
  <div class="row__inner">
    <h1>Welcome To Play and Learn</h1>
    <div class="block to-left shake">
      <center><br><br><a href="game3" style="text-decoration: none;"><font face="verdana" color="black"><h1>Game3</h1></font></a></div>
    <div class="block to-right shake">
<center><br><br><a href="game1/index.php" style="text-decoration: none;"><font face="verdana" color="black" ><h1>Game1</h1></font></a></div>
    <div class="block from-center shake">
<center><br><br><a href="game2/index.php" style="text-decoration: none;"><font face="verdana" color="black" ><h1>Game2</h1></font></a></div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/game.js"></script>
</body>
<br><br><br><br><br><br>
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>&copy; Copyright by <a href="http://www.ahaguru.com/" title="W3.CSS" target="_blank" class="w3-hover-text-green" style="text-decoration:none">AHAGURU</a></p>
</footer>
</body>
<footer>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="JS/index.js"> </script>
<script type="text/javascript" src="JS/form_action.js"></script>

</footer>
</html>
