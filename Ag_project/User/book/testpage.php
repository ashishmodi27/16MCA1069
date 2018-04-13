<?php
include "header.php";
$chapter_id = $_GET['chapter_id'];
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
$question = array();
$opt1 = array();
$opt2 = array();
$opt3 = array();
$opt4 = array();
$answer = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		array_push($question_Id,$row["question_Id"]);
		array_push($question,$row["question"]);
		array_push($opt1,$row["opt1"]);
		array_push($opt2,$row["opt2"]);
		array_push($opt3,$row["opt3"]);
		array_push($opt4,$row["opt4"]);
		array_push($answer,$row["answer"]);
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
<html><body><form action = "display.php?chapter_id=<?php echo $chapter_id; ?>" method = "post">
<?php
echo "<input type='hidden' name='chapter_id' value=$chapter_id>";
for($i=0;$i<10;$i++){
$j=$i+1;
echo "<b>";
echo "Question no. ";
echo $question_Id[$i];
echo "&nbsp;&nbsp;&nbsp;&nbsp;";
echo $question[$i];
echo "</b>";
echo "<br>";
echo "<input type ='radio' name=que$j value='opt1'>";
echo $opt1[$i];
echo "<br>";
echo "<input type ='radio' name=que$j value='opt2'>";
echo $opt2[$i];
echo "<br>";
echo "<input type ='radio' name=que$j value='opt3'>";
echo $opt3[$i];
echo "<br>";
echo "<input type ='radio' name=que$j value='opt4'>";
echo $opt4[$i];
echo "<br>";
}
echo "<input type=submit value='submit'>";
echo "</form></body></html>"
?>