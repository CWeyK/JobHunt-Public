<?php
include 'conn.php';
$uid=$_GET["uid"];
//?uid=6 for testing


$profilequery="SELECT * FROM companyprofile INNER JOIN user on user.uid=companyprofile.uid WHERE companyprofile.uid=$uid";
$profileresult=mysqli_query($conn,$profilequery);
$profile=mysqli_fetch_assoc($profileresult);

//get number of jobs posted
$jobquery="SELECT * FROM job WHERE uid=$uid LIMIT 0,6";
$jobresult=mysqli_query($conn,$jobquery);
$jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);


$jobcountquery="SELECT * FROM job WHERE uid=$uid ";
$jobcountresult=mysqli_query($conn,$jobcountquery);
$jobcounts=mysqli_fetch_all($jobcountresult,MYSQLI_ASSOC);
$jobcount=count($jobcounts);

?>