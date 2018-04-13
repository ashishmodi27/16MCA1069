<?php
 class baseModel 
       {
		 	function getdata($rs)
					{
						@$d=mysql_fetch_array($rs);
						return $d;
					}
			function totalrows($rs)
					{
						$d=mysql_num_rows($rs);
						return $d;
					}
			function getmax_sql($field_name,$table_name,$where_clause='')
			{
				$whereSQL = '';
	   						 if(!empty($where_clause))
	    						{
	        						if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
	       							 {
	            						$whereSQL = " WHERE ".$where_clause;
	        						  } 
									else
	        						  {
	            						$whereSQL = " ".trim($where_clause);
	        						  }
	    						}
					$sql="SELECT MAX(".$field_name.") FROM ".$table_name.$whereSQL;	
					//echo $sql;
					$rs=mysql_query($sql);
					$d=mysql_fetch_array($rs);	
					//print_r($d);
					return $d[0];			
								
			}
					
					
  			function gettable_SQL($table_name,$where_clause='')
  					{
        				$whereSQL = '';
	   						 if(!empty($where_clause))
	    						{
	        						if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
	       							 {
	            						$whereSQL = " WHERE ".$where_clause;
	        						  } 
									else
	        						  {
	            						$whereSQL = " ".trim($where_clause);
	        						  }
	    						}
						$sql="SELECT * FROM ".$table_name.$whereSQL;
						//echo $sql;
						$rs=mysql_query($sql);
         				$c=1;
	     				$array = array();
	     				$array[0] = array();
	     				$tf=mysql_num_fields($rs);
	     				for($i=0;$i<$tf;$i++)
							{
			    				$fn=mysql_field_name($rs,$i);
								$array[0][$fn] = $fn;
			 				}
	      				while($d=$this->getdata($rs))
							{
								for($i=0;$i<$tf;$i++)
				         			{
					          			$fn=mysql_field_name($rs,$i);
					           			$array[$c][$fn] = $d[$fn];
				          			}
						  		$c++;
							}
						return $array;	
  					}
					function gettable_SQLJ2($table_name1,$table_name2,$where_clause='')
  					{
        				$whereSQL = '';
	   						 if(!empty($where_clause))
	    						{
	        						if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
	       							 {
	            						$whereSQL = " WHERE ".$where_clause;
	        						  } 
									else
	        						  {
	            						$whereSQL = " ".trim($where_clause);
	        						  }
	    						}
						$sql="SELECT * FROM ".$table_name1.",".$table_name2.$whereSQL;
						//echo $sql;
						$rs=mysql_query($sql);
         				$c=1;
	     				$array = array();
	     				$array[0] = array();
	     				$tf=mysql_num_fields($rs);
	     				for($i=0;$i<$tf;$i++)
							{
			    				$fn=mysql_field_name($rs,$i);
								$array[0][$fn] = $fn;
			 				}
	      				while($d=$this->getdata($rs))
							{
								for($i=0;$i<$tf;$i++)
				         			{
					          			$fn=mysql_field_name($rs,$i);
					           			$array[$c][$fn] = $d[$fn];
				          			}
						  		$c++;
							}
						return $array;	
  					}
              function gettable_SQLJ3($table_name1,$table_name2,$table_name3,$where_clause='')
  					{
        				$whereSQL = '';
	   						 if(!empty($where_clause))
	    						{
	        						if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
	       							 {
	            						$whereSQL = " WHERE ".$where_clause;
	        						  } 
									else
	        						  {
	            						$whereSQL = " ".trim($where_clause);
	        						  }
	    						}
						$sql="SELECT * FROM ".$table_name1.",".$table_name2.",".$table_name3.$whereSQL;
						$rs=mysql_query($sql);
						//echo $sql;
         				$c=1;
	     				$array = array();
	     				$array[0] = array();
	     				@$tf=mysql_num_fields($rs);
	     				for($i=0;$i<$tf;$i++)
							{
			    				$fn=mysql_field_name($rs,$i);
								$array[0][$fn] = $fn;
			 				}
	      				while($d=$this->getdata($rs))
							{
								for($i=0;$i<$tf;$i++)
				         			{
					          			$fn=mysql_field_name($rs,$i);
					           			$array[$c][$fn] = $d[$fn];
				          			}
						  		$c++;
							}
						return $array;	
  					}
                 
				function gettable_SQLD($field_name,$table_name,$where_clause='')
  					{
        				$whereSQL = '';
	   						 if(!empty($where_clause))
	    						{
	        						if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
	       							 {
	            						$whereSQL = " WHERE ".$where_clause;
	        						  } 
									else
	        						  {
	            						$whereSQL = " ".trim($where_clause);
	        						  }
	    						}
                        $sql="SELECT DISTINCT ".$field_name." FROM ".$table_name.$whereSQL;
						$rs=mysql_query($sql);
         				$c=1;
	     				$array = array();
	     				$array[0] = array();
	     				$tf=mysql_num_fields($rs);
	     				for($i=0;$i<$tf;$i++)
							{
			    				$fn=mysql_field_name($rs,$i);
								$array[0][$fn] = $fn;
			 				}
	      				while($d=$this->getdata($rs))
							{
								for($i=0;$i<$tf;$i++)
				         			{
					          			$fn=mysql_field_name($rs,$i);
					           			$array[$c][$fn] = $d[$fn];
				          			}
						  		$c++;
							}
						return $array;	
  					} 
  		    function gettable($rs)
  						{
   							 $c=1;
	    					 $array = array();
	     					 $array[0] = array();
	    					 $tf=mysql_num_fields ($rs);
	    					 for($i=0;$i<$tf;$i++)
									{
			   							 $fn=mysql_field_name($rs,$i);
										 $array[0][$fn] = $fn;
									 }
	      					while($d=$this->getdata($rs))
									{
										for($i=0;$i<$tf;$i++)
				         					{
					          					$fn=mysql_field_name($rs,$i);
					           					$array[$c][$fn] = $d[$fn];
				          					}
						  					$c++;
									}
								return $array;	
  						}
    			function dbRowInsert($table_name, $form_data)
					{
	    					$fields = array_keys($form_data);
                             $sql = "INSERT INTO ".$table_name."(`".implode('`,`', $fields)."`)VALUES('".implode("','", $form_data)."')";
	    					return mysql_query($sql);
					}
				function dbRowUpdate($table_name, $form_data, $where_clause='')
					{
	    				$whereSQL = '';
	    					if(!empty($where_clause))
	    						{
	        						if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
	        							{
	            							$whereSQL = " WHERE ".$where_clause;
	        							} else
	        							{
	            							$whereSQL = " ".trim($where_clause);
	       								 }
	   							 }
	    					$sql = "UPDATE ".$table_name." SET ";
	    					$sets = array();
	    							foreach($form_data as $column => $value)
	    								{
	        								 $sets[] = "`".$column."` = '".$value."'";
	    								}
	    					$sql .= implode(', ', $sets);
	    					$sql .= $whereSQL;
	    					return mysql_query($sql);
					}
				function dbRowDelete($table_name, $where_clause='')
					{
	    				$whereSQL = '';
	    					if(!empty($where_clause))
	    						{
	        						if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
	        							{
	            							$whereSQL = " WHERE ".$where_clause;
	        							} else
	        							{
	            							$whereSQL = " ".trim($where_clause);
	        							}
	    						}
	    					$sql = "DELETE FROM ".$table_name.$whereSQL;
	   						 return mysql_query($sql);
					}
					function no_arg($tn)
	 					{
	  						 $sql="select * from $tn where 1";
	  						 //echo $sql;
	  						 $rs=mysql_query($sql);
	   						return $rs;
	 					 }
					function one_arg($tn,$fn,$cond)//fn=field name , cond=condition//
	 					{
	   						$sql="select * from $tn where $fn='$cond'";
	   						//echo $sql;
	   						$rs=mysql_query($sql);
	  						// $d=mysql_fetch_array($rs);
	  						 return $rs;
	  					}	 
					function two_arg($tn,$fn1,$cond1,$fn2,$cond2)
						 {
	   						$sql="select * from $tn where $fn1='$cond1' and $fn2='$cond2'";
	   						//echo $sql;
	   						$rs=mysql_query($sql);
	   						return $rs;
	 
						 } 	 
					
}