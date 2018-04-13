<?php
include "sys_connect.php";
$id = $_GET['qid'];
$data1 = json_encode($_POST);
$data = json_decode($data1,TRUE);
if(($data['questiontext']['text'] != '') && ($data['questiontext']['browser'] != '') && ($data['questiontext']['browser2'] != ''))
{
	if(($data['solution']['text'] !='') || ($data['solution']['link'] !=''))
	{
		$update = "update physics set queandans = '$data1' where id='$id'";
		$result = mysqli_query($mysqli,$update);
		if(count($result) > 0)
		{
			echo "<script>
			window.location.href = 'edit.php';
			</script>";
		}
	}
}
?>
