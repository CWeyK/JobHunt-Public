<?php 
include 'conn.php';


$jobquery="SELECT * FROM job inner join user on job.uid=user.uid ORDER BY dateposted DESC LIMIT 0,6 ";
$jobresult=mysqli_query($conn,$jobquery);
$jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);

$jobhunterquery="SELECT * FROM jobhunter inner join user on jobhunter.uid=user.uid ORDER BY dateposted DESC LIMIT 0,6 ";
$jobhunterresult=mysqli_query($conn,$jobhunterquery);
$jobhunters=mysqli_fetch_all($jobhunterresult,MYSQLI_ASSOC);
?>