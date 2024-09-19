<?php
include 'conn.php';

$uid=$_SESSION['uid'];
$jobquery="SELECT * FROM jobhunter inner join user on jobhunter.uid=user.uid WHERE jobhunter.uid=$uid";
$jobresult=mysqli_query($conn,$jobquery);
$jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);



?>