<?php

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
echo "<br><br><br><br><br><br><br><br><br>";
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
echo $count;
?>