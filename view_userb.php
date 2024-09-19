<?php
include 'conn.php';

$uid=$_GET['uid'];
$profilequery="SELECT * FROM userprofile INNER JOIN user on user.uid=userprofile.uid WHERE userprofile.uid=$uid";

$profileresult=mysqli_query($conn,$profilequery);
$profile=mysqli_fetch_assoc($profileresult);
    

//get number of jobs posted
$jobquery="SELECT * FROM jobhunter WHERE uid=$uid LIMIT 0,6";
$jobresult=mysqli_query($conn,$jobquery);
$jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);


$jobcountquery="SELECT * FROM jobhunter WHERE uid=$uid ";
$jobcountresult=mysqli_query($conn,$jobcountquery);
$jobcounts=mysqli_fetch_all($jobcountresult,MYSQLI_ASSOC);
$jobcount=count($jobcounts);
?>