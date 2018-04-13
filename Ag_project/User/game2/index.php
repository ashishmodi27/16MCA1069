<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body {
	background-image: url(background.jpg);
	background-repeat:no-repeat;
   background-size:cover;
}
</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "header.php" ?>
<br /><br /><br /><br />
<div class="container">
<h2>Select Matrix Size :</h2>
<p>The form below contains two dropdown menus (select lists):</p>
<form action="new.php" method="post">
<label for="sel1">Select Rows (select one):</label>
      <select class="form-control" name="rows" id="rows">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
	    <br />
<label for="sel1">Select Cols (select one):</label>
      <select class="form-control" name="cols" id="cols">
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
	  <br />
	  <br />
<center>
	<button type="submit" class="btn btn-primary">Submit</button>
</center>
</form>
</div>
</body>
</html>