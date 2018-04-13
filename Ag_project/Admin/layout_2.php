<html>
<head>
<style>
.example6 .navbar-brand{ 
  background: url(http://www.ahaguru.com/img/assets/images/ahaguru_logo.png) left / contain no-repeat;
  width: 100px;
}
.navbar-alignit .navbar-header {
	-webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
  height: 50px;
}
.navbar-alignit .navbar-brand {
	top: 50%;
	position:fixed;
	display: block;
	position: relative;
	height: auto;
	transform: translate(0,-50%);
	margin-right: 15px;
  margin-left: -45px;
}

.navbar-nav>li>.dropdown-menu {
	z-index: 9999;
}


body {
  font-family: "Lato";
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top example6">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand text-hide" href="index.php"> </a>
    </div>
    <div id="navbar6" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Add <span class="caret"></span></a>
          <ul id = "menu" class="dropdown-menu" role="menu">
         <li> <a href="adminpage.php" id="add">Add Single Choice</a></li>
		   <li> <a href ="adminpage1.php" id="add">Add Fillup</a></li>
				 <li><a href="addasub.php" id="search"> Add  Subject</a></li>
				<li><a href="addachaoter.php" id="search"> Add Topic</a></li>

           <!---<li class="divider"></li>---->
           
          </ul>
        </li>
		 <li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Edit <span class="caret"></span></a>			 
    		<ul id = "menu" class="dropdown-menu" role="menu">
		   <li> <a href="View_subject.php" id="edit"> Edit Subject </a></li>
		   <li> <a href ="View_chapter.php" id="edit">Edit Chapter</a></li>
		   <li> <a href ="edit.php" id="edit">Edit Question</a></li>
			
		</ul> 
      </ul>
    </div>
   
  </div>
 
</nav>


</div>
<div id="content" class="debug">
        </div>
</body>
<footer>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.4.min.js" type="text/javascript"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
</footer>
</html>