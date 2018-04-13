<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<head>
<?php
   include "sys_connect.php";
   include "layout_2.php" 
   ?>

<header>
<style type="text/css">
.form-container {
   border: 1px solid #f2e3d2;
   background: #c9b7a2;
   background: -webkit-gradient(linear, left top, left bottom, from(#f2e3d2), to(#c9b7a2));
   background: -webkit-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -moz-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -ms-linear-gradient(top, #f2e3d2, #c9b7a2);
   background: -o-linear-gradient(top, #f2e3d2, #c9b7a2);
   background-image: -ms-linear-gradient(top, #f2e3d2 0%, #c9b7a2 100%);
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -webkit-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   -moz-box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   box-shadow: rgba(000,000,000,0.9) 0 1px 2px, inset rgba(255,255,255,0.4) 0 0px 0;
   font-family: 'Helvetica Neue',Helvetica,sans-serif;
   text-decoration: none;
   vertical-align: middle;
   min-width:300px;
   padding:20px;
   width:300px;
   }
.form-field {
   border: 1px solid #c9b7a2;
   background: #e4d5c3;
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   color: #c9b7a2;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   padding:8px;
   margin-bottom:20px;
   width:auto;
   }
.form-field:focus {
   background: #fff;
   color: #725129;
   }
.form-container h2 {
   text-shadow: #fdf2e4 0 1px 0;
   font-size:18px;
   margin: 0 0 10px 0;
   font-weight:bold;
   text-align:center;
    }
.form-title {
   margin-bottom:10px;
   color: #725129;
   text-shadow: #fdf2e4 0 1px 0;
   }
.submit-container {
   margin:8px 0;
   text-align:right;
   }
.submit-button {
   border: 1px solid #447314;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #addc7e 0 1px 0;
   color: #31540c;
   font-family: helvetica, serif;
   padding: 8.5px 18px;
   font-size: 14px;
   text-decoration: none;
   vertical-align: middle;
   }
.submit-button:hover {
   border: 1px solid #447314;
   text-shadow: #31540c 0 1px 0;
   background: #6aa436;
   background: -webkit-gradient(linear, left top, left bottom, from(#8dc059), to(#6aa436));
   background: -webkit-linear-gradient(top, #8dc059, #6aa436);
   background: -moz-linear-gradient(top, #8dc059, #6aa436);
   background: -ms-linear-gradient(top, #8dc059, #6aa436);
   background: -o-linear-gradient(top, #8dc059, #6aa436);
   background-image: -ms-linear-gradient(top, #8dc059 0%, #6aa436 100%);
   color: #fff;
   }
.submit-button:active {
   text-shadow: #31540c 0 1px 0;
   border: 1px solid #447314;
   background: #8dc059;
   background: -webkit-gradient(linear, left top, left bottom, from(#6aa436), to(#6aa436));
   background: -webkit-linear-gradient(top, #6aa436, #8dc059);
   background: -moz-linear-gradient(top, #6aa436, #8dc059);
   background: -ms-linear-gradient(top, #6aa436, #8dc059);
   background: -o-linear-gradient(top, #6aa436, #8dc059);
   background-image: -ms-linear-gradient(top, #6aa436 0%, #8dc059 100%);
   color: #fff;
   }

.tb3 {
	border: 2px dashed #D1C7AC;
	width: 230px;
	font-family:"Times New Roman", Times, serif;
	color:#000000;
	
}
<!--
.style1 {font-family: "Times New Roman", Times, serif}
.form-field1 {   border: 1px solid #c9b7a2;
   background: #e4d5c3;
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;
   color: #c9b7a2;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(000,000,000,0.7) 0 0px 0px;
   padding:8px;
   margin-bottom:20px;
   width:auto;
}
-->
</style>

</header>
</head>
<body>
<form  id="form" method = "post" name="form" action="createjson.php">
<table width="1069" height="928" border="0" bordercolor="#990099">
  <tr>
  	<td align="center"> <font color="#FF0000">Add Single Choice </font> </td> 
	</tr>
	<tr>	
    <td width="1063" height="260" valign="top" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p class="form-title">Question :</p>
      <p>
     	<textarea   name="questiontext[text]" rows="20" cols ="125"></textarea>
      </p></td>
  </tr>
  <tr>
    <td height="258" valign="top" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p class="form-title">Enter the Choice in below : </p>
      <p>
        <?php

for($i = 1 ,$j = 'a' ; $i <= 4  ;$i++,$j++)
{
	echo  " 
	<font  aligh = 'left' ><b>$i </font><textarea  name = 'option[$i][text]' cols='90' rows='20'> </textarea><br>";
	
	
	
}
?>
      </p>
    <p></p></td>
  </tr>
  <tr>
    <td height="43" valign="middle" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p><span class="form-title">Mention the Answer:</span>
      <select name="questiontext[answerno]">
	  	<option value="0"> Select Option </option>
        <option value="1">Option1</option>
        <option value="2">Option2</option>
        <option value="3">Option3</option>
        <option value="4">Option4</option>
      </select>
    </p>
      </td>
  </tr>
  <tr>
    <td height="216" align="center" valign="middle" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p align="left" class="style1">&nbsp;</p>
      <p align="left" class="form-title">Solution:</p>
      <p align="left">
        <textarea  name="solution[text]" cols="90" rows="20"></textarea>        
        </p>
      <p align="left"><span class="form-title">Video Link For Solution :</span> 
        <input type="text" name="solution[link]"  class="tb3"  />
      </p>
      <p align="left"><span class="form-title">Subject:</span>
           <input list="browsers" name="questiontext[browser]" class="tb3">
      </p>
      <p align="left">
        <datalist id="browsers">  
          <?php
					$sql = "select * from ag_ma_subject where status ='1'";
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

					if($result > 0)
					{
							for($i=0;$i<$count;$i++)
								echo "<option id ='$i' value='$sname[$i]'>";

					}
			?>
        </datalist>
        </p>
      <p align="left"><span class="form-title">Topic:</span>
        <input list='browsers2' id="doll" name='questiontext[browser2]' class="tb3" autocomplete='off' />
      </p>
      
	  <p align="left" class="form-title">Use Katex: 
	    <input name="answer[usekatex]" type="radio" value="1" />
	    True 
	    <input name="answer[usekatex]" type="radio" value="0" />
	  False</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center">
        <input type="submit" class="submit-button" />
    </p>    </td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p></form>
</p>


</body>


<footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='tinymce-master/js/tinymce/tinymce.min.js'></script>
<script>
$(document).ready(function(){
$('input[name="questiontext[browser]"]').on('keyup',function(){
var name = $('input[name="questiontext[browser]"]').val();
if($.trim(name) !=''){
console.log(name);
$.post('fetch_subcategory.php', { name: name }, function(data){
	$('#doll').html(data);
		});
	}
});
$('input[name="questiontext[browser]"]').on('focusout',function(){
var name = $('input[name="questiontext[browser]"]').val();
if($.trim(name) !=''){
console.log(name);
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
	var c = $('select[name="questiontext[answerno]"]').val();
	if(c == "0")
	{
		  e.preventDefault();
		  alert('Options of the single choice have to select');	
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
  plugins: [
        "advlist autolink autosave link image lists charmap hr spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template textcolor paste textcolor colorpicker"
    ],
		setup: function(ed) {  
    	ed.on('keyup', function(e) {  
    	 var count = CountCharacters();  

       	});  
      }  ,

	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code",
  image_advtab: true,
  style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
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
