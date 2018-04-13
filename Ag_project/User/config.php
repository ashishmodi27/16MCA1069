<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'ag_project';
    $mysqli = new mysqli($host, $user, $password, $database);
   	if (mysqli_connect_errno()) {
        exit('Connect failed: '. mysqli_connect_error());
    }
?>