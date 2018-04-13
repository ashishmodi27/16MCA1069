
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Material Design Box Shadows</title>
      <link rel="stylesheet" href="css/san.css">
      <style>
.button {
    background-color: #4d4dff;
    border: none;
    color: white;
    padding: 15px 240px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    width:600px;
	height:60px;
}
</style>
</head>
<?php
include "header.php";

$chapter_id = $_REQUEST['chapter_id'];
@$que1 = $_REQUEST['que1'];
@$que2 = $_REQUEST['que2'];
@$que3 = $_REQUEST['que3'];
@$que4 = $_REQUEST['que4'];
@$que5 = $_REQUEST['que5'];
@$que6 = $_REQUEST['que6'];
@$que7 = $_REQUEST['que7'];
@$que8 = $_REQUEST['que8'];
@$que9 = $_REQUEST['que9'];
@$que10 = $_REQUEST['que10'];
 $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ag_project';
$conn = mysqli_connect($host, $user, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "SELECT * from book where chapter = '$chapter_id'";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
	$link = $row["pdf"];
		}
		}
$sql = "SELECT * from auto_genrate where chapter = '$chapter_id'";
$result = mysqli_query($conn, $sql);
$question_Id = array();
$answer = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		array_push($question_Id,$row["question_Id"]);
		array_push($answer,$row["answer"]);
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
$count = 0;
for($i=0;$i<10;$i++){
$q = $i+1;
@$x = que.$q;
if($$x==$answer[$i]){
$count++;
}
}
?>
<br><br>
<body>

<div class="card">
	<center><H3><font color="#000000">REULTS & INSTRUCTIONS</font></H3></center>
	<p align="center"><font color="#000099" font-style: italic; >
		Student scoring more than 70% in the Test will be Considered as the Expert Level on that particular topic and will be allowed to attend the high_level Test directly whereas student scoring between 50-69% has to give the first level exam and then the high_level Exam. Lastly, student scoring less than 50% has to study the topic and again appear for the low level Question.
	</font></p>
		<center><H3><font color="#000000"Your Score is>Your Score is</font></H3></center>
		<b><font size="+3"><?php echo $count;?><br>
		---------<br>
		
		10</font></b>
</div>
<?php

if($count >7){
echo "<center><a href='#' class='button'>Expert Level</a><br></center>
<center><a href='#' class='button'>First Level</a><br></center>";
}
else if($count >5 && $count <8){
echo "<center><a href='#' class='button'>First Level</a><br></center>";
}
else{
echo "<center><a href='chapter1.php?link=P-chapter1.pdf & chapter_id=$chapter_id' class='button'>Go back again study</a><br></center>";
}
?>
</body>
<script>
function fun(){
alert("go back and study first");
}
</script>
</html>
