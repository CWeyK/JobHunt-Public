<?php
include 'conn.php';
//get job details from database
$hid=$_GET["hid"];
$jobquery="SELECT * FROM jobhunter INNER JOIN user on user.uid=jobhunter.uid INNER JOIN jobhunterdetails on jobhunter.hid=jobhunterdetails.hid WHERE jobhunter.hid=$hid";
$jobresult=mysqli_query($conn,$jobquery);
$job=mysqli_fetch_assoc($jobresult);
//get user details from database

$uid=$job['uid'];
$profilequery="SELECT * FROM userprofile INNER JOIN user on user.uid=userprofile.uid WHERE userprofile.uid=$uid";
$profileresult=mysqli_query($conn,$profilequery);
$profile=mysqli_fetch_assoc($profileresult);

//if save button is pressed(title)
if (isset($_POST['save-title'])){
    $title= $_POST['title'];
    $titlequery="UPDATE jobhunter SET title='$title' WHERE hid=$hid";
    $titleresult=mysqli_query($conn,$titlequery);
    header("Location: user_jobhunter.php?hid=$hid");
}
//if save button is pressed(location)
if (isset($_POST['save-location'])){
    $location= $_POST['location'];
    $locationquery="UPDATE jobhunter SET location='$location' WHERE hid=$hid";
    $locationresult=mysqli_query($conn,$locationquery);
    header("Location: user_jobhunter.php?hid=$hid");
}
//if save button is pressed(salary)
if (isset($_POST['save-salary'])){
    $salary= $_POST['salary'];
    $salaryquery="UPDATE jobhunter SET salary='$salary' WHERE hid=$hid";
    $salaryresult=mysqli_query($conn,$salaryquery);
    header("Location: user_jobhunter.php?hid=$hid");
}
//if save button is pressed(experience)
if (isset($_POST['save-number'])){
    $experience= $_POST['number'];
    $experiencequery="UPDATE jobhunter SET experience='$experience' WHERE hid=$hid";
    $experienceresult=mysqli_query($conn,$experiencequery);
    header("Location: user_jobhunter.php?hid=$hid");
}
//if save button is pressed(type)
if (isset($_POST['save-type'])){
    $type= $_POST['type'];
    $typequery="UPDATE jobhunter SET type='$type' WHERE hid=$hid";
    $typeresult=mysqli_query($conn,$typequery);
    header("Location: user_jobhunter.php?hid=$hid");
}
//if save button is pressed(about)
if (isset($_POST['save-about'])){
    $about= $_POST['about'];
    $aboutquery="UPDATE jobhunterdetails SET description='$about' WHERE hid=$hid";
    $aboutresult=mysqli_query($conn,$aboutquery);
    header("Location: user_jobhunter.php?hid=$hid");
}
//if delete button is pressed{
if (isset($_POST['delete'])){
    $deletequery2="DELETE FROM jobhunterdetails WHERE hid=$hid";
    $deleteresult2=mysqli_query($conn,$deletequery2);
    $deletequery="DELETE FROM jobhunter WHERE hid=$hid";
    $deleteresult=mysqli_query($conn,$deletequery); 
    header("Location: yourposts.php");
}
?>