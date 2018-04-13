
<?php
include("config.php");
$check = "select * from user_history";
$rs = mysqli_query($mysqli,$check);
$link_check = [];
while($row = mysqli_fetch_assoc($rs))
{
	$link_check[] = $row['link'];
}
$id = $_POST['id'];
$link = $_POST['link'];
$tag = $_POST['tag'];
$topic = $_POST['topic'];
$md = md5($link);
$flag = 0;
for($i=0;$i<count($link_check);$i++)
{
	$b = $link_check[$i];
	$c = md5($b);
	if($md == $c)
	{
		$flag = 1;
	}
}
if($flag != 1 )
{
	$flag = 0;
}
if($flag == 1)
{	
	echo 'not';
}
else if($flag == 0)
{
$sql = "insert into user_history(id,link,tag,topic) values('". $id ."','".$link."','". $tag ."','". $topic ."')";
$result = mysqli_query($mysqli,$sql);

	if($result > 0)
	{
		echo 'true';
	}
	else
	{
		echo 'false';
	}
}
?>
