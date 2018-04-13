<html>
<head>    
    <title>Homepage</title>
</head>

<?php
include "sys_connect.php";
include "layout_2.php";
$result = mysqli_query($mysqli, "SELECT * FROM physics ORDER BY id "); 
?>
<style>
 th {
    background-color: #4CAF50;
    color: white;
}
#td {border:solid 1px #fab; width:330px; word-wrap:break-word;}
#tdwidth
{
height:300px;
}  
</style>
<body>
   <br/><br/>

    <table width="100%" border=1>
        <tr bgcolor='#CCCCCC' style="color: white;">
			<td align="center" >Id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center">Question</td>
            <td align="center">Answer</td>
            <td align="center">Options</td>
			<td align="center">Subject</td>
			<td align="center">Chapter</td>
            <td>Update</td>
        </tr>
		 <?php
 				
 				
				while($r = mysqli_fetch_assoc($result)) 
				{
	    			$rows[] = $r;
				}
				$var1 = [];
				$var11 = [];
				for($i=0;$i<count($rows);$i++)
				{
					$var1[] = $rows[$i]['id'];
					$var11[] = $rows[$i]['sorm'];
				}
				$correctanswer = [];
				$var2 = [];
				$var3 = [];
				$var5 = [];
				$var6 = [];
				$var7 = [];
				$var = [];
				for($i=0;$i<count($var1);$i++)
				$var[] = json_decode($rows[$i]['queandans'] ,TRUE);
				
			    for($i=0;$i<count($var1);$i++)
				{
					if(isset($var [$i]) )
					{
					$var2[$i] = $var [$i]['questiontext']['text'];
					@$var3[$i] = $var [$i]['questiontext']['answerno'];	
					$var5[$i] = $var [$i]['solution']['text'];
					$var6[$i] = $var [$i]['solution']['link'];
					$var9[$i] = $var [$i]['questiontext']['browser'];
					$var10[$i] = $var [$i]['questiontext']['browser2'];
					
					if($var11[$i] == 'm')
					{	
							foreach($var[$i]['option'] as $key=>$value)
							{
						      $var7[$key]= $value;
							}
						
					}
					else if($var11[$i] == 's')
					{
						$correctanswer[$i] = $var[$i]['questiontext']['correctanswer'];
						
					}		 
				}	
		}
			$a = count($var1);
		
 
 ?>
        <?php 
         for($i=0;$i<count($var1);$i++)
		  {
						echo "<tr>"; 
						echo "<td align='center' >";
						echo $var1[$i];
						echo "</td>";
						echo "<td id = 'td'>";
						echo $var2[$i];
						echo "</td>";
						echo "<td align='center' >";
						echo $var3[$i];
						echo "</td>";
						echo "<td id = 'td'>";
						$j = 'a';
						$c = null;
						if($var11[$i] == 'm')
						{	
							$co = count($var[$i]['option']);
							 for($b = 0 ;$b<$co;$b++)
						 	{
								echo  $var[$i]['option'][$b+1]['text'];
								echo "<br>";	
								$j++;
							}
						unset($j);	
						}
						else if($var11[$i] == 's')
						{
							echo $correctanswer[$i];
						}
					    echo "</td>";
						echo "<td>";
						echo $var9[$i];
						echo "</td>";
						echo "<td id='td'>";
						echo $var10[$i];
						echo "</td>";
					    echo "<td><a href=\"edit_1.php?qid=$var1[$i]\">Edit</a></td>";					
						
				}
		
        
        ?>
    </table>

</body>
 
</html>