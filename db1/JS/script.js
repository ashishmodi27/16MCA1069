$('#kform').submit(function(e){
	var s = $('input[name="username"]').val();
	var l = $('input[name="password"]').val();
			$.ajax({
				type: "POST",
				url: "http://localhost:1443/db1/PHP/1.php",
				data: "username="+s+"&password="+l,
			success: function(html){    
			if($.trim(html) != 'true')   
			{
				localStorage.setItem("username", html);
				window.location="mainpage.html";
			}
			else  
			{
				console.log(html);
				$("#add_err").css('display', 'inline', 'important');
				$("#add_err").html("Wrong username or password");
			}
		}
	});
		return false;
});
   

