<html>
<head>
<title>Edit a question</title>
<header>
<link type="text/css" rel="stylesheet" href="css/form.css">
</style>
</header>
<?php
include "sys_connect.php"; 
include "layout_2.php";
$id = $_GET['qid'];
$checking = "select queandans,sorm from physics where id='$id'";
$result = mysqli_query($mysqli,$checking);
if(count($result) > 0)
 {
 		if(isset($id))
		{
				while($r = mysqli_fetch_assoc($result)) 
				{
    					$rows[] = $r;
				}
				$var1 = $id -$id;					
				$var2 = [];
				$var3 = [];
				$var5 = [];
				$var6 = [];
				$var7 = [];
				$var = [];
				$var9 = [];
				$var12 = [];
				$var13 = [];
				$var14 =[];
				$var15 = [];
				$var16 =[];
				$var17 = [];

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
						@$var14[] = $var[$var1]['answer']['range_1'];
						@$var15[] = $var[$var1]['answer']['range_2'];
						@$var16[] = $var[$var1]['answer']['suffix'];
						@$var17[] = $var[$var1]['answer']['prefix'];
					}
		
			}
 }
 ?>
</head>
<body>
<div style="margin-left:20px;">
<form id="asd" action="edit_2.php?qid=<?php echo $id;?>" method="post">
	<center><font color="#CC0000" >Edit a  question</font></center>
<table width="1223" height="928" border="0" bordercolor="#990099">
  <tr>
    <td width="1217" height="260" valign="top" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p class="form-title">Question :</p>
      <p> 
        <textarea name="questiontext[text]" cols ="125" rows="20" class="form-title" id="space"> <?php echo $var2[$var1]; ?></textarea>
      </p>	 
	   </td>
  </tr>
  <tr>
      <p>
		<?php
		if($var11[$var1] == 'm')
		{
			?>
			    <td height="258" valign="top" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p class="form-title">Enter the Choice in below : </p>
<?php 
			for($i = 1; $i <= 4  ;$i++)
			{
				echo  " <font  aligh = 'left' ><b>$i </font><textarea  name = option[$i][text] cols='90' rows='20'> ";
				echo stripslashes($var7[$i]['text']); 
				echo" </textarea><br>";
			}
		}
		else if($var11[$var1] == 's')
		{?>
			<td height="258" valign="top" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p class="form-title"> 
      		<p class="form-title">Answer : </p>
      		<p>
	 		<textarea  name = "questiontext[correctanswer]"><?php echo stripslashes($var12[$var1]); ?></textarea><br>
	  		</p>
			<?php if(isset($var13[$var1])) 
			{ ?>

	 		<div id = "openup">
   			 <p class="form-title">Range1: 
      			<input type="text" name="answer[range_1]" value="<?php echo $var14[$var1]; ?>" />
    		</p>
   			 <p class="form-title">Range2:
      			<input type="text" name="answer[range_2]" value="<?php echo $var15[$var1]; ?>" />
    		</p>
			</div>
				<?php } ?>
						<?php if(isset($var13[$var1])) 
			{ ?>

	 		<div id = "openup">
   			 <p class="form-title">Suffix: 
      			<input type="text" name="answer[suffix]" value="<?php echo $var16[$var1]; ?>" />
    		</p>
   			 <p class="form-title">Prefix:
      			<input type="text" name="answer[prefix]" value="<?php echo $var17[$var1]; ?>" />
    		</p>
			</div>
				<?php } ?>


		<?php	}	
		?>
      </p>	</td>
  </tr>
	<?php 
		if($var11[$var1] == 'm')
		{
		?>
		  <tr>
  	    <td height="43" valign="middle" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field">
		 <p><span class="form-title">Mention the Answer on number:</span>
      		<select name="questiontext[answerno]" class="form-title">
      		<option value="<?php echo $var3[$var1]; ?>">
	  		<?php echo "Option".$var3[$var1]; 
	  		$check = $var3[$var1];
		  ?>	  </option>
	  <?php 	
			for($i=0;$i<4;$i++)
			{
				$a = $i+1;
				if($check == $a)
				{			
				}
				else
				{
					$a = $i+1;
					echo "<option value=$a> Option$a</option>" ;
				}	
			}
		?>
				</select>
			    </p>
    <p></p></td>
  </tr>

		<?php 
		}
		?>
  <tr>
    <td height="216" align="center" valign="middle" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p align="left" class="style1">&nbsp;</p>
      <p align="left" class="form-title">Solution:</p>
      
	  <p align="left">
        	<textarea  id="solution[text]" name="solution[text]" cols="90" rows="20"> <?php echo $var5[$var1]?> </textarea>        
        </p>
      
	  <p align="left">&nbsp;</p>
      
	  <p align="left">&nbsp;</p>
      
	  <p align="left"><span class="form-title">Video Link For Solution :</span> 
 		       <input type="text" name="solution[link]"  class="form-title"  value="<?php echo $var6[$var1]?>" />
      </p>
      <p align="left"><span class="form-title">Subject:</span>
        <input name="questiontext[browser]" class="form-title" value="<?php echo $var9[$var1]; ?>" list="browsers" autocomplete ="off">
		<datalist id="browsers">
		
		<?php
		
			$sql = "select * from ag_ma_subject where status = '1'";	
			$result = mysqli_query($mysqli,$sql);
			$cid = null;
			$count = 0;
			$sid = null;
			$sname = [];
			while($res=mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				$count = $count +1 ;
				$sid = $res['sid'];
				$sname[] = $res['subject_name'];
			}
			$count1 = mysqli_num_rows($result);
			if($count1 > 0)
			{
				for($i=0;$i<$count;$i++)
				echo "<option id ='$i' value='$sname[$i]'>";

			}
		?>
    </datalist>
      </p> 
	   <p align="left">  <span class="form-title">Topic:</span>
        <input name="questiontext[browser2]" class="form-title" id="doll" value="<?php echo $var10[$var1]; ?>" list="browsers2" autocomplete="off">
      	</p>
	   <p align="left">&nbsp;</p>
	   </p>
		<p align="left" class="form-title">Use Katex: 
		<?php 
		if($var13[$var1] == '1')
		{
		?>
	    <input name="answer[usekatex]" type="radio" value="1"  checked="checked"/>
	    True 
		<input name="answer[usekatex]" type="radio" value="0"/>
		False
		<?php 
		}
		if($var13[$var1] == '0')
		{
		?>
		<input name="answer[usekatex]" type="radio" value="1" />True
	    <input name="answer[usekatex]" type="radio" value="0" checked="checked" />
	 	 False
		 
		 <?php
		 }
		 ?>
		 </p>

      <p align="left">&nbsp; </p>
      <p align="center">&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center">
        <input id="submit" type="submit" class="submit-button" />
    </p>    </td>
  </tr>
</table>

</form>
</div>
</body>
<footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='tinymce-master/js/tinymce/tinymce.min.js'></script>
<script src="/Intership/admin/katex/katex.min.js"></script>
<script src="/Intership/admin/katex/contrib/auto-render.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('input[name="questiontext[browser]"]').on('keyup',function(){
var name = $('input[name="questiontext[browser]"]').val();
if($.trim(name) !=''){
$.post('fetch_subcategory.php', { name: name }, function(data){
	$('#doll').html(data);
		});
	}
});

$('input[name="questiontext[browser]"]').on('focusout',function(){
var name = $('input[name="questiontext[browser]"]').val();
if($.trim(name) !=''){
$.post('fetch_subcategory.php', { name: name }, function(data){
	$('#doll').html(data);
		});
	}
});
});
$('form').submit(function(e){
  	var s = $('input[name="solution[link]"]').val(); 
   	var count = CountCharacters();  
 	var s1 =  $('textarea[name="solution[text]"]').text();
  	if( (s == '') && (count < 1))
	{
		  e.preventDefault();
		  alert('Video Link or Solution Text atleast one needed! ');
   	}
});
</script>
 <script>
  tinymce.init({
  forced_root_block : "",
  selector: 'textarea',
  height: 200,
  width: 1000,
  theme: 'modern',
  entity_encoding : "raw",
	setup: function(ed) {  
    	ed.on('keyup', function(e) {  
    	 var count = CountCharacters();  

       	});  
      }  ,
  plugins: [
        "advlist autolink autosave link image lists charmap hr spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template textcolor paste textcolor colorpicker"
    ],
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code",

  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });
  function CountCharacters() {  
        var body = tinymce.get("solution[text]").getBody();  
        var content = tinymce.trim(body.innerText || body.textContent);  
        return content.length;  
    };  
 </script>
</footer>
</html> 
