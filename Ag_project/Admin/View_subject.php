<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php
include "layout_2.php";
include('sys_connect.php');
echo"<h1>View Subject Records</h1>";
if ($result = $mysqli->query("SELECT * FROM ag_ma_subject ORDER BY sid"))
{
if ($result->num_rows > 0)
{
echo "<table border='1' cellpadding='10' width='800'>";
echo "<tr><th>Subject_Name</th><th>Status</th><th>Edit</th><th>Delete</th></tr>";
while ($row = $result->fetch_object())
{
echo "<tr>";
echo "<td>" . $row->subject_name . "</td>";
if(@$row->status == '0')
{
	echo "<td> Disable</td>";
}
elseif(@$row->status == '1')
{
	echo "<td> Enable</td>";
}
echo "<td><a href='Edit_subject.php?sid=" . $row->sid . "'>Edit</a></td>";
echo "<td><a href='delete_subject.php?sid=" . $row->sid . "'>Delete</a></td>";
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