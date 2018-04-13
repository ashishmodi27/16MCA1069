<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<body>
	<div class="fixed">  
  		Revision Notes
  </div>
	<br/>
  <br/>
  <br/>
	<div>
<table id="myTable">  
        <thead>  
          <tr>  
            <th>Topic</th>  
            <th>Tag</th>  
            <th>Link</th>  
          </tr>  
        </thead>  
        <tbody>  

<?php
include("config.php");
$sql = "select * from user_history";
$rs = mysqli_query($mysqli,$sql);
while($r = mysqli_fetch_assoc($rs))
{
?>
          <tr>  
            <td><?php echo $r['topic']; ?></td>  
            <td><?php echo  $r['tag']; ?></td>  
            <td><?php
			 $a =   $r['link'];
			 echo "<a href=$a target=_blank> $a </a>";
			  ?></td>  
          </tr>  
<?php
}
?>	  
  </tbody>  
   </table>  
 
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
	

</script>	  
</div>
</body>

<style>

div
{
 
  padding: 0 10px;
  margin: 0 0 10px 0;
  background-color: white;
}
.fixed, .sticky
{
  font-size: 1.4em;
  padding: 10px;
  z-index: 1;
}
.fixed
{
  position: fixed;
  background-color: #34495e;
  color: white;
  width: 100%;
  left: 0;
  text-align: center;
  z-index: 2;
}
.sticky
{
  position: sticky;
  top: 60px;
  background-color: #2ecc71;
}
.container
{
  height: 250px;
  overflow: auto;
}
.out-container
{
  top: 50px;
  background-color: #9b59b6;
  z-index: 2;
}
.inside-container
{
  top: 70%;
  z-index: 3;
  left: 70%;
  height: 120px;
  width: 250px;
  overflow: auto;
}
</style>
