<?php
include "header.php";
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Search </title>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
   <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br><br><br>
<center><img src="index.jpg"></center><br><br>
<form method="post" action="google_search.php"> 
  <div class="container">
	<div class="input-group">
	<input type="text" name="search" class="form-control" placeholder="Search for">
      <span class="input-group-btn">
	        <button class="btn btn-search" type="submit"><i class="fa fa-search fa-fw"></i> Search</button>
      </span>
</div>
</div>
</form>
</body>

<footer>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
  $('form').submit(function(e){
  var name = $('input[name="search"]').val();
  if($.trim(name) == '')
  {
	  e.preventDefault();
	  alert('pleasea fill the box to search');
  }
</script>
</footer>
</html>
