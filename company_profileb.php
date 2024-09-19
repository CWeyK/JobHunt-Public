<?php
include 'conn.php';

$uid=$_SESSION['uid'];
$profilequery="SELECT * FROM companyprofile INNER JOIN user on user.uid=companyprofile.uid WHERE companyprofile.uid=$uid";

$profileresult=mysqli_query($conn,$profilequery);
$profile=mysqli_fetch_assoc($profileresult);

//if save button is pressed(about us)
if (isset($_POST['save-about'])){
    $aboutus= $_POST['aboutus'];
    $aboutquery="UPDATE companyprofile SET aboutus='$aboutus' WHERE uid=$uid";
    $aboutresult=mysqli_query($conn,$aboutquery);
    header("Location: company_profile.php");
}

//if save button is pressed(location)
if (isset($_POST['save-location'])){
    $location= $_POST['location'];
    $locationquery="UPDATE companyprofile SET location='$location' WHERE uid=$uid";
    $locationresult=mysqli_query($conn,$locationquery);
    header("Location: company_profile.php");
}

//if save button is pressed(date)
if (isset($_POST['save-date'])){
    $date= $_POST['date'];
    $datequery="UPDATE companyprofile SET establisheddate='$date' WHERE uid=$uid";
    $dateresult=mysqli_query($conn,$datequery);
    header("Location: company_profile.php");
}

//if save button is pressed(number of employees)
if (isset($_POST['save-number'])){
    $number= $_POST['number'];
    $numberquery="UPDATE companyprofile SET noofemployees='$number' WHERE uid=$uid";
    $numberresult=mysqli_query($conn,$numberquery);
    header("Location: company_profile.php");
}   

//if save button is pressed(name)
if (isset($_POST['save-name'])){
    $name= $_POST['name'];
    $namequery="UPDATE user SET name='$name' WHERE uid=$uid";
    $nameresult=mysqli_query($conn,$namequery);
    $_SESSION['name']=$name;
    header("Location: company_profile.php");
}   

//get number of jobs posted
$jobquery="SELECT * FROM job WHERE uid=$uid";
$jobresult=mysqli_query($conn,$jobquery);
$jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);
$jobcount=count($jobs);

?>