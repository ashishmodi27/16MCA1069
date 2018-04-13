<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php
include "layout_2.php";
echo"<h1>View Chapters Records</h1>";
echo"<br>";
include('sys_connect.php');
if ($result = $mysqli->query("SELECT * FROM ag_ma_chapter ORDER BY cid"))
{
if ($result->num_rows > 0)
{
echo "<table border='1' cellpadding='10' width='800'>";
echo "<tr><th>Chapter_Name</th><th>Subject_Id</th><th>Status</th><th>Edit</th><th>Delete</th></tr>";
while ($row = $result->fetch_object())
{
$a = $row->sid;
$s= $mysqli->query("SELECT subject_name from ag_ma_subject where sid='$a'");
while($res = mysqli_fetch_array($s))
{
    $subject_name = $res['subject_name'];
}
echo "<tr>";
echo "<td>" . $row->cname . "</td>";
echo "<td>" . $subject_name . "</td>";
if(@$row->status == '0')
{
	echo "<td> Disable</td>";
}
elseif(@$row->status == '1')
{
	echo "<td> Enable</td>";
}
echo "<td><a style='text-decoration:none' href='Edit_chapter.php?cid=" . $row->cid . "'>Edit</a></td>";
echo "<td><a style='text-decoration:none' href='delete_chapter.php?cid=" . $row->cid . "'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";
}
else
{
echo "No results to display!";
}
}
else
{
echo "Error: " . $mysqli->error;
}
$mysqli->close();
?>
</body>
</html>