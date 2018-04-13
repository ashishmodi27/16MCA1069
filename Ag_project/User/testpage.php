<?php 
include "userlayout.php";
include "config.php";
?>
<html>
<header>
<link rel="stylesheet" href="css/test.css">
</header>
<?php	
$id=$_SESSION['id'];
$sql = "select * from ag_ma_test where id = '$id' ORDER BY tid+0 asc";
$result = $mysqli->query($sql);
$res1 ="";
$r_count=0;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		   $res1 = $row["right_answer"].",".$res1;
		   $r_count++;
		   $ab[$r_count] = $row["right_answer"];
		   $tid[$r_count] = $row["tid"];
		}
	}


for($i=1;$i<=$r_count;$i++){ 
$qwerty[$i] = 0;
$abc = explode(",",$ab[$i]);
$r_no_cot[$i] = count($abc);
for($j=0;$j<$r_no_cot[$i];$j++){
if($abc[$j]!=0)
$qwerty[$i]++;
} 
}

$sql1 = "select * from ag_ma_test where id='$id'";
$result2 = $mysqli->query($sql1);
$res2 ="";
$w_count=0;
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
		   $res2 = $row["wrong_answer"].",".$res2;
		   $w_count++;
		   $ab1[$w_count] = $row["wrong_answer"];
		}
	}
	

for($i=1;$i<=$w_count;$i++){ 
$qwerty1[$i] = 0;
$abc1 = (explode(",",$ab1[$i]));
$w_no_cot[$i] = count($abc1);
for($j=0;$j<$w_no_cot[$i];$j++){
if($abc1[$j]!=0)
$qwerty1[$i]++;
} 
}

$sql3 = "select * from ag_ma_test where id = '$id'";
$result3 = $mysqli->query($sql3);
$res3 ="";
$u_count=0;
	if ($result3->num_rows > 0) {
		while($row = $result3->fetch_assoc()) {
		   $res3 = $row["not_attempt"].",".$res3;
		   $u_count++;
		   $ab3[$u_count] = $row["not_attempt"];
		}
	}
for($i=1;$i<=$u_count;$i++){ 
$qwerty3[$i] = 0;
$abc3 = explode(",",$ab3[$i]);
$u_no_cot[$i] = count($abc3);
for($j=0;$j<$u_no_cot[$i];$j++){
if($abc3[$j]!=0)
$qwerty3[$i]++;
} 
}

for($i=1;$i<=$r_count;$i++){
$total[$i] = $qwerty[$i]+$qwerty1[$i]+$qwerty3[$i];
}


echo "<section>
  <h1>Test Attented By You</h1>
  <div class='tbl-header'>";
echo "<table cellpadding='0' cellspacing='0' border='0'>";
echo "<thead>
        <tr class='abc'>
          <th>S. no.</th>
          <th>Test</th>
          <th>Result</th>
        </tr>
      </thead>
    </table>
  </div>";
echo "<div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <tbody>";
for($i=1;$i<=$r_count;$i++){
echo "<tr class='odd' data-href='history.php?tid=".$tid[$i]."'><td><a href=history.php?tid=".$tid[$i].">".$i."</a></td>"."<td><a href=history.php?tid=".$tid[$i].">Test".$i."</a></td>"."<td><a href=history.php?tid=".$tid[$i].">".$qwerty[$i]."/".$total[$i]."</a></td></tr>";
}
echo "</tbody>
    </table>
  </div>
</section></table>";
$mysqli->close();
?>
<footer>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="JS/test.js"></script>
</footer>
</html>