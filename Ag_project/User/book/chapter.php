<?php
include "header.php";
$book = $_GET['book'];
 $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ag_project';
$conn = mysqli_connect($host, $user, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * from book where subject = '$book'";
$result = mysqli_query($conn, $sql);
$book = array();
$chapter_id = array();
$link = array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		array_push($book,$row["chapter"]);
		array_push($link,$row["pdf"]);
		array_push($chapter_id,$row["chapter_id"]);
    }
} else {
    echo "0 results";
}
echo $book[0];
mysqli_close($conn);
?>
<html>
<head>
<style>
.button {
    background-color: #4d4dff;
    border: none;
    color: white;
	width:600px;
	height:35px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>
<br><br>
<center><h2>Choose your Chapter to Learn</h2></center>
<?php 
	for($i=0; $i<count($link); $i++){?>
	<center><a href="chapter1.php?link=<?php echo $link[$i]; ?>& chapter_id=<?php echo $chapter_id[$i]; ?>" class="button"><?php echo $book[$i]; ?></a><br></center>
<?php	}
?>
</body>
</html>
