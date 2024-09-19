<?php
include 'conn.php';

$uid=$_SESSION['uid'];
$jobquery="SELECT * FROM job inner join user on job.uid=user.uid WHERE job.uid=$uid";
$jobresult=mysqli_query($conn,$jobquery);
$jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);



?>