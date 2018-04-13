<?php
      class Util 
	            {
					function encryptIt( $q ) 
					 {
   						 $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    			$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, 								MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
   						 return( $qEncoded );
					  }

					function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
					
					
					function getPagination($db_rows,$l,$url) // $tn=table name,$l=no of rec 
						{
							  $c=$db_rows;
							 $c=$c/$l;  //4.7
							 $x=ceil($c);
							$str="";
							for($i=0;$i<$x;$i++)
								{
										$index=$i*$l;
										$str.="<li><a href=".$url."tx=".$index.">".($i+1)."</a></li>";			
								}						
							return $str;								
						}//end of function
					function getcurrdate()
								{
   									$sql="SELECT CURDATE()";	
   									$rs=mysql_query($sql);
   									$d=mysql_fetch_array($rs);
   									$dt=$d[0];
   									return $dt;
								}
					function getcurrtime()
								{
   									$sql="SELECT CURTIME()";	
   									$rs=mysql_query($sql);
   									$d=mysql_fetch_array($rs);
   									$time=$d[0];
   									return $time;
								}			
								
					function delfile($file)
					           {
								  @unlink($file);
								  return 1;   
							   }

					function getfile($filerequest)
								{
    								@$fl=$_FILES[$filerequest];
									return $fl;
								}
					function uploadfile($fl,$new_file_name,$path_to_upload,$path_to_db)
								{
      								@$fn=$fl["name"];
	  								@$arr=explode(".",$fn);
	  								if(@$arr[1]!="")
	  									{
	  										@$nfn=$new_file_name.".".$arr[1];
	  										$tfn=$fl["tmp_name"];
	  										$path_to_db=$path_to_db.$nfn;
	  										if(move_uploaded_file($tfn,$path_to_upload.$nfn))
		      									{
			    									return $path_to_db;
			   									}
											else
		      									{
			    										return 0;
			  									 }	 	   	
	  										}
	  								else
	  									 {
	    										return 0;
	  										}	
								}
					function redirect($url)
								{
									?>
   										<script>
	 									window.location="<?php echo $url;?>";
   										</script>							  
									<?php
								}
					function alert($msg)
								{
									?>
   										<script>
	 									alert("<?php echo $msg;?>");
   										</script>							  
								<?php 
								}

					function getvalue($requestname)
								{
 									 @$requestvalue=$_REQUEST[$requestname];
  									 return $requestvalue;
								}

					function setsession($sesname,$sesvalue)
								{
  									$_SESSION[$sesname]=$sesvalue;
  									return 1;
								}  
					function setsessionarray($sesname)
								{
  									if(!@is_array($_SESSION[$sesname]))
  										 {
     										$_SESSION[$sesname]=array();
   											}
								}
					function setsessionarrayvaluesbegin($sesname,$value)
								{
  									unset($_SESSION[$sesname]);
  									setsessionarray($sesname);
  									$max=count($_SESSION[$sesname]);
 									 $max++;
  									$_SESSION[$sesname][$max]=$value;
								}
					function setsessionarrayvalues($sesname,$value)
								{
  									$max=count($_SESSION[$sesname]);
  									$max++;
  									$_SESSION[$sesname][$max]=$value;
								}  
					function getsessionarrayvalues($sesname)
								{
  									return @$_SESSION[$sesname];
								}
					function getsession($sesname)
								{
  									 @$sesvalue=$_SESSION[$sesname];
   		 							 return $sesvalue;
								}
					function unsetsession($sesname)
								{
   									unset($_SESSION[$sesname]);
   									return 1;
								}				
					function destroysession()
								{
   									session_destroy();
   									return 1;
								}	
					
					
				}