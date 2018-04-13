
function qwerty(a){
if(a== 'not'){
swal("Good Job!","Congratulations Your answer is correct !","success");
}
else{
swal("Sorry !"," Try Again !","error");
}

}

var d = localStorage.getItem("username");
var l = $.trim(d);
if (l !== null){
 	//window.localStorage.setItem('refresh', "1");
 $( window ).load(function(e) {
		if(typeof $.trim(d) !=='' && $.trim(d) !== null && d  == false)
		{
				window.location = "popup.html";
				console.log(d );

		
		}
			
});
}
$(document).ready(function(){
 $("#checkout").click(function(e) {
	 localStorage.removeItem("username");
	window.location = "popup.html";

	
});


$('form').submit(function(e){
	var k = localStorage.getItem("username");
		chrome.tabs.query({currentWindow: true, active: true}, function(tabs){
		  var z	 = tabs[0].url ;
		  read(z);
		  
	});
	
	if($.trim(k) != "")
	{
		function read(z)
		{
			var tag = $('input[name="tag"]').val();
			var topic = $("#topic").val();
			var link = z;
			var id = k;
			$.ajax({
				type: "POST",
				url: "http://localhost:1443/db1/PHP/2.php",
				data: "tag="+tag+"&topic="+topic+"&link="+link+"&id="+id,
			success: function(html){    
				console.log(html);
			if($.trim(html) == 'true')   
			{
				qwerty(1);	
				$('input[name="tag"]').val("");
				$('input[name="topic"]').val("") ;

			}
			else if($.trim(html) == 'false')  
			{
				qwerty(html);	
					$('input[name="tag"]').val("");
				$('input[name="topic"]').val("") ;
			}
			else if($.trim(html) == 'not')  
			{
				qwerty(html);		
				$('input[name="tag"]').val("");
				$('input[name="topic"]').val("") ;

			}

			}
			});
		};

	}		
	else{
		window.location = "popup.html";
	}
	e.preventDefault();
	});
  });  
    
function qwerty(a){
console.log(a);	
if($.trim(a) == 'not'){
	swal("Sorry!"," Already Saved !","error");
}
else if($.trim(a) == 'false'){
	swal("Sorry !","Contact Admin!","error");
}
else if($.trim(a) == '1'){
	swal("Sucessfully Saved!","saved","success");
}

}	
	