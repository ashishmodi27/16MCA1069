<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<style>
	.box{
	display: inline-block;
	/*border: 2px black solid;
  	background-color: pink;*/
  	padding: 20px;
	width: 630px;
	height: 350px;
	margin-left:300px;
	margin-top:50px;
	}
	</style>
	<body>
	<?php include "header.php" ?>

		<div class="mycontainer">
			<div class="innerLiner">
				<?php
					$mysqli = mysqli_connect("localhost","root","","flash");
					if (mysqli_connect_errno()){
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					for($j=0;$j<4;$j++){
						$sql = "select * from card where id=$j+1";
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
				?>
					<span class="box">
						<center>
							<img src="Level1.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</center>
							<bold>
								<center><h2><?php echo "<div lang='latex'>"; echo $que ; echo "</div>";?> &nbsp;&nbsp;&nbsp;&nbsp;</h2></center>
							</bold>
						<center><?php for($i=0;$i<5;$i++){ ?>
							<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
								<div class="flippable appcon ac-code<?php echo $i+1; ?>">
									<div class="front">
										<?php $x=$i+1; $y = "opt".$x; echo chr($i+65);?>
									</div>
									<div class="back" onClick="qwerty(<?php echo $$y ;?>,<?php echo $ans ;?>)">
										<?php $x=$i+1; $y = "opt".$x; echo $$y;?>
									</div>
								</div>
							</div>
						<?php  } ?></center>
					</span>
				<?php } ?>
			<span class="box">
				<center>Level Up.
					<input class="nextBtn" type="button" value="Next Level" onClick="level()">
				</center>
			</span>
			<?php
					$mysqli = mysqli_connect("localhost","root","","flash");
					if (mysqli_connect_errno()){
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					for($j=4;$j<8;$j++){
						$sql = "select * from card where id=$j+1";
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
				?>
					<span class="box">
						<center>
							<img src="Level2.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</center>
							<bold>
								<center><h2><?php echo $que ;?>&nbsp;&nbsp;&nbsp;&nbsp;</h2></center>
							</bold>
						<?php for($i=0;$i<5;$i++){ ?>
							<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
								<div class="flippable appcon ac-code<?php echo $i+1; ?>">
									<div class="front">
										<?php $x=$i+1; $y = "opt".$x; echo chr($i+65);?>
									</div>
									<div class="back" onClick="qwerty(<?php echo $$y ;?>,<?php echo $ans ;?>)">
										<?php $x=$i+1; $y = "opt".$x; echo $$y;?>
									</div>
								</div>
							</div>
						<?php  } ?>
					</span>
				<?php } ?>
			<span class="box">
				<center>Level Up.
					<input class="nextBtn" type="button" value="Next Level" onClick="level()">
				</center>
			</span>
			<?php
					$mysqli = mysqli_connect("localhost","root","","flash");
					if (mysqli_connect_errno()){
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					for($j=8;$j<12;$j++){
						$sql = "select * from card where id=$j+1";
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
				?>
					<span class="box">
						<center>
							<img src="Level3.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</center>
							<bold>
								<center><h2><?php echo $que ;?>&nbsp;&nbsp;&nbsp;&nbsp;</h2></center>
							</bold>
						<?php for($i=0;$i<5;$i++){ ?>
							<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
								<div class="flippable appcon ac-code<?php echo $i+1; ?>">
									<div class="front">
										<?php $x=$i+1; $y = "opt".$x; echo chr($i+65);?>
									</div>
									<div class="back" onClick="qwerty(<?php echo $$y ;?>,<?php echo $ans ;?>)">
										<?php $x=$i+1; $y = "opt".$x; echo $$y;?>
									</div>
								</div>
							</div>
						<?php  } ?>
					</span>
				<?php } ?>
			<span class="box">
				<center>Complete
					<input type="button" value="Home"onclick="window.location.href='../Ag_project/user';">
				</center>
			</span>
		</div>
	</div>
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
	<script src="http://latex.codecogs.com/latexit.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script>
	function level(){
		swal({
		  title: "Congratulation!",
		  text: "Next Level Unlock",
		  imageUrl: 'Level_up.png'
		});
		}
		$( ".nextBtn" ).click(function(e) {
	goRight();
});
$( ".backBtn" ).click(function(e) {
	goLeft();
});
window.onload = like();
function like()
{
		
	$.get('select.php', function(data){
		 data = data;
	var initalLeftMargin = $( ".innerLiner" ).css('margin-left').replace("px", "")*1;
	var newLeftMargin = (data); // extra 2 for border
	$( ".innerLiner" ).animate({marginLeft: newLeftMargin}, 500);
});
}
function goRight(){ // inner stuff slides left
	var initalLeftMargin = $( ".innerLiner" ).css('margin-left').replace("px", "")*1;
	var newLeftMargin = (initalLeftMargin - 934); // extra 2 for border
	$( ".innerLiner" ).animate({marginLeft: newLeftMargin}, 500);
	$.post('update.php', { name: newLeftMargin }, function(data){
			console.log(data);
		});

}
function goLeft(){ // inner stuff slides right
	var initalLeftMargin = $( ".innerLiner" ).css('margin-left').replace("px", "")*1;
	var newLeftMargin = (initalLeftMargin + 934*9); // extra 2 for border
	$( ".innerLiner" ).animate({marginLeft: newLeftMargin}, 500);
}
function qwerty(a,b){
if(a==b){
swal("Good Job!","Congratulations Your answer is correct !","success");
goRight();
}
else{
swal("Sorry !"," Try Again !","error");
}
}

	</script>
	</body>
</html>