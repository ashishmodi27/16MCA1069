<?php
include "header.php";
$pdf = $_GET['link'];
$chapter_id = $_GET['chapter_id'];
?>
<html>
<style>
.pdfobject-container { height: 500px;}
.pdfobject { border: 1px solid #666; }
.button {
    background-color: #ff3333;
    border: none;
    color: white;
    padding: 15px 240px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
<br><br>
<div id="example1" height: 100px;
    width: 50%;></div><br>
 <center><a href="testpage.php?chapter_id=<?php echo $chapter_id; ?>" class="button">Take a Test</a><br></center>
	<script src="pdf/pdfobject.js"></script>
<script>PDFObject.embed("pdf/<?php echo $pdf; ?>", "#example1");</script>
</html>