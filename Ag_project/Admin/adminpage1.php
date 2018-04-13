<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
  include "layout_2.php";
  include "sys_connect.php";
 ?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="form.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.tb3 {
	border: 2px dashed #D1C7AC;
	width: 230px;
}
<!--
.style1 {
	font-size: 18px;
	color: #FF6633;
}
-->
</style>
</head>
<body>
<form method = "post" name="form" action="createjson1.php">
<table width="1069" height="928" border="0" bordercolor="#990099">
  <tr>
  <td align="center"> <font color="#FF0000">Add Fill Up </font> </td> 
	</tr>
	<tr>	
    <td width="1063" height="260" valign="top" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p class="form-title">Question :</p>
      <p>
        <textarea   name="questiontext[text]" rows="20" cols ="125"></textarea>
      </p></td>
  </tr>
  <tr>
    <td height="258" valign="top" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p class="form-title">Choose a Option for fill up whether Numeric or Charcters: 
      <input name="questiontext[choice]" type="radio" value="num" />
      Numeric 
      <input name="questiontext[choice]" type="radio" value="char" checked="checked" />
      Characters</p>
      <p class="form-title">Answer : </p>
      <p>
	 	 <textarea  name = "questiontext[correctanswer]"> </textarea><br>
	  </p>
	  <div id = "openup">
    	<p class="form-title">Range1: 
      		<input type="text" name="answer[range1]" />
    	</p>
   		 <p class="form-title">Range2:
      		<input type="text" name="answer[range2]" />
    	</p>
	</div>	
    <p class="form-title">Suffix:
      <input type="text" name="answer[suffix]" />
    </p>
    <p class="form-title">Prefix:
      <input type="text" name="answer[prefix]" />
    </p></td>
  </tr>
  <tr>
    <td height="216" align="center" valign="middle" nowrap="nowrap" bordercolor="#FFFFFF" class="form-field"><p align="left" class="style1">&nbsp;</p>
      <p align="left" class="form-title">Solution:</p>
      <p align="left">
        <textarea  name="solution[text]" cols="90" rows="20"></textarea>        
      </p>
      <p align="left">&nbsp;</p>
      <p align="left"><span class="form-title">Video Link For Solution : </span>
        <input type="text" name="solution[link]"  class="form-title"  />
      </p>
      <p align="left"><span class="form-title">Subject:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <input list="browsers" name="questiontext[browser]" class="form-title">
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
      <p align="left"><span class="form-title">Topic:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input list='browsers2' id="doll" name='questiontext[browser2]' class="form-title" autocomplete='off' />
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
<p><form>
</p>


</body>
<footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src='tinymce-master/js/tinymce/tinymce.min.js'></script>
<link rel="stylesheet" href="/katex/katex.css">
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

 $("div#openup").hide();
 $('input[name="questiontext[choice]"]').click(function() {
    	if (this.value == 'num') {
			$("div#openup").show();
		} 	 
        else if (this.value == 'char') {
            $("div#openup").hide();
        }
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
	var va = $('input[name="questiontext[choice]"]').val();
	if(va == 'numeric')
	{
		var check = $('input[name="answer[range2]"]').val();
		var check1 = $('input[name="answer[range1]"]').val();
		if(check1 > check)
		{
			e.preventDefault();
			alert('range1 always smaller than range2');
		}
		else if(check == '')
		{
			e.preventDefault();
			alert('range2 need to be fill');
		}
		else if(check1 == '')
		{
			e.preventDefault();
			alert('range1 need to be fill');
		}
}
});
$(document).ready(function() {
    $('input[name="answer[range1]"]').keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
	    $('input[name="answer[range2]"]').keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

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
