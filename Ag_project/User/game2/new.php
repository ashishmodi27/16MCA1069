<html>
<style>
.qwe {
    border-radius: 25px;
    <!-- background: #73AD21; -->
	background-color: transparent;
    padding: 30px;
	min-width:150px;
	max-width:200px;
	min-height:10px;
	max-height:50px; 
	display: inline-block;  
}
.ans {
    border-radius: 25px;
    background: Purple;
    padding: 30px; 
	min-width:50px;
	max-width:100px;
	min-height:10px;
	max-height:50px;
}
.selected{
border-style: dotted;
border-color: red;
}
.noselected{
border-style: none;
}
body {
	background-image: url(background.jpg);
	background-repeat:no-repeat;
   background-size:cover;
}
.shake { display: block; }
a.shake {display: inline-block; }

@-webkit-keyframes spaceboots {
    0% { -webkit-transform: translate(2px, 1px) rotate(0deg); }
    10% { -webkit-transform: translate(-2px, -1px) rotate(-1deg); }
    20% { -webkit-transform: translate(-3px, 0px) rotate(1deg); }
    30% { -webkit-transform: translate(0px, 2px) rotate(0deg); }
    40% { -webkit-transform: translate(1px, -1px) rotate(1deg); }
    50% { -webkit-transform: translate(-1px, 2px) rotate(-1deg); }
    60% { -webkit-transform: translate(-3px, 1px) rotate(0deg); }
    70% { -webkit-transform: translate(2px, 1px) rotate(-1deg); }
    80% { -webkit-transform: translate(-1px, -1px) rotate(1deg); }
    90% { -webkit-transform: translate(2px, 2px) rotate(0deg); }
    100% { -webkit-transform: translate(1px, -2px) rotate(-1deg); }
}

.shake{
    -webkit-animation-name: spaceboots;
    -webkit-animation-duration: 0.8s;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;
    -webkit-transform-origin: 50% 50%;
}
</style>
<body>
</body>
</html>
<?php
$rows = $_REQUEST['rows'];
$cols = $_REQUEST['cols'];
$mysqli = mysqli_connect("localhost","root","","flash");
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "<center>";
echo "<table>";
$counts = 0;
$a = array();
for($i=0;$i<$rows;$i++){
	echo "<tr>";
	for($j=0;$j<$cols;$j++){
		$counts++;
		$sql = "select * from card where id=$counts";
						$result = mysqli_query($mysqli,$sql);
						$count = mysqli_num_rows($result);
						while($row = mysqli_fetch_assoc($result)){
							$id = $row['id'];
							$que = $row['question'];
							$opt1 = $row['opt1'];
							$opt2 = $row['opt2'];
							$opt3 = $row['opt3'];
							$opt4 = $row['opt4'];
							$opt5 = $row['opt5'];
							$opt6 = $row['opt6'];
							$ans = $row['ans'];
						}
						array_push($a,$counts);
		echo "<td width='400' height='80'>";
		echo "<center><span class='qwe' id=$counts><center>$que</center></span></center>";
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";
echo "</center>";

shuffle($a);

echo "<center>";
echo "<table>";
$counts = 0;
for($i=0;$i<$rows;$i++){
	echo "<tr>";
	for($j=0;$j<$cols;$j++){
		$sql = "select * from card where id=$a[$counts]";
						$result = mysqli_query($mysqli,$sql);
						$count = mysqli_num_rows($result);
						while($row = mysqli_fetch_assoc($result)){
							$id = $row['id'];
							$que = $row['question'];
							$opt1 = $row['opt1'];
							$opt2 = $row['opt2'];
							$opt3 = $row['opt3'];
							$opt4 = $row['opt4'];
							$opt5 = $row['opt5'];
							$opt6 = $row['opt6'];
							$ans = $row['ans'];
						}
						
		echo "<td width='100' height='80'>";
		echo "<div class='ans' id=$a[$counts]><center>$ans</center></div>";
		echo "</td>";
		$counts++;
	}
	echo "</tr>";
}
echo "</table>";
echo "</center>";
?>
<html>
<script type="text/javascript" src="http://latex.codecogs.com/latexit.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script>
var a = 1;
$('span#'+a+'.qwe').addClass('selected');
$('span#'+a+'.qwe').addClass('shake');
var b = "d";
$('div').click(function(){
    b = this.id;
    if(a==b){
	$('span#'+a+'.qwe').fadeOut();
	$('div#'+b+'.ans').fadeOut();
	swal("Good job!", "Correct Answer!", "success");
	b = parseInt(b);
	c = b+1;
	$('span#'+c+'.qwe').addClass('selected');
	$('span#'+c+'.qwe').addClass('shake');
	a = c;
    }
    else{
   swal("Sorry!", "Wrong Answer!", "error");
    }
});
</script>
</html>