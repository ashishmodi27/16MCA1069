<?php
include "sys_connect.php";
$checking = "select queandans,sorm from physics";
$result = mysqli_query($mysqli,$checking);
if(count($result) > 0)
 {
				while($r = mysqli_fetch_assoc($result)) 
				{
    					$rows[] = $r;
  				
				}
				$var1 = 0;					
				$var2 = [];
				$var3 = [];
				$var5 = [];
				$var6 = [];
				$var7 = [];
				$var = [];
				$var9 = [];
				$var12 = [];
				$var13 = [];
					for($var1=0;$var1<count($rows);$var1++)
					{
						$var[] = json_decode($rows[$var1]['queandans'] ,TRUE);
						$var11[] = $rows[$var1]['sorm']; 
			   			$var2[$var1] = $var [$var1]['questiontext']['text'];
						@$var3[$var1] = $var [$var1]['questiontext']['answerno'];
						$var5[$var1] = $var [$var1]['solution']['text'];
						$var6[$var1] = $var [$var1]['solution']['link'];
						$var9[$var1] = $var [$var1]['questiontext']['browser'];
						$var10[$var1] = $var [$var1]['questiontext']['browser2'];
						$var13[$var1] = $var [$var1]['answer']['usekatex'];
						$j = 'a';
						if($var11[$var1] == 'm')
						{
								foreach($var[$var1]['option'] as $key=>$value)
								{
								      $var7[$key]= $value;
								}
						}
						else if($var11[$var1] == 's')
						{
							$var12[] = $var[$var1]['questiontext']['correctanswer'];
						}
	}
}
?>