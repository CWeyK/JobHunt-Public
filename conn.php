<?php
$dhost="localhost";
$duser="root";
$dpassword="";
$database="jobhunt2";

// Create connection
//if database error,remove/add 3307
//$conn = mysqli_connect($host, $user, $password, $database);
$conn = mysqli_connect($dhost, $duser, $dpassword, $database,3307);

?>