<script>
 function myfunction()
 {
  window.location = "chapter.php?book=Physics";
}
function myfunction1()
 {
  window.location = "chapter.php?book=Chemistry";
}
function myfunction2()
 {
  window.location = "chapter.php?book=Math";
}
</script>

<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Learning platform</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  
<div class="main-content">
  <h1>
     Learning Platform<small>To learn and check your knowledge</small></h1>
  <div class="moleskine-wrapper" onClick="myfunction()">
    <div class="moleskine-notebook">
      <div class="notebook-cover">
        <div class="notebook-skin">Physics</div>
      </div>
      <div class="notebook-page"></div>
    </div>
  </div>
  <div class="moleskine-wrapper" onClick="myfunction1()">
    <div class="moleskine-notebook">
      <div class="notebook-cover blue">
        <div class="notebook-skin">Chemistry</div>
      </div>
      <div class="notebook-page ruled"></div>
    </div>
  </div>
  <div class="moleskine-wrapper" onClick="myfunction2()">
    <div class="moleskine-notebook">
      <div class="notebook-cover yellow">
        <div class="notebook-skin">Maths</div>
      </div>
      <div class="notebook-page squared"></div>
    </div>
  </div>
</div>
</body>
</html>
