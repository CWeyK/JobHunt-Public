<?php
include 'conn.php';

$uid=$_SESSION['uid'];
$profilequery="SELECT * FROM userprofile INNER JOIN user on user.uid=userprofile.uid WHERE userprofile.uid=$uid";

$profileresult=mysqli_query($conn,$profilequery);
$profile=mysqli_fetch_assoc($profileresult);

//if save button is pressed(about us)
if (isset($_POST['save-about'])){
    $aboutus= $_POST['aboutus'];
    $aboutquery="UPDATE userprofile SET aboutus='$aboutus' WHERE uid=$uid";
    $aboutresult=mysqli_query($conn,$aboutquery);
    header("Location: user_profile.php");
}

//if save button is pressed(location)
if (isset($_POST['save-location'])){
    $location= $_POST['location'];
    $locationquery="UPDATE userprofile SET location='$location' WHERE uid=$uid";
    $locationresult=mysqli_query($conn,$locationquery);
    header("Location: user_profile.php");
}

//if save button is pressed(date)
if (isset($_POST['save-date'])){
    $date= $_POST['date'];
    $datequery="UPDATE userprofile SET birthdate='$date' WHERE uid=$uid";
    $dateresult=mysqli_query($conn,$datequery);
    header("Location: user_profile.php");
}

//if save button is pressed(experience)
if (isset($_POST['save-number'])){
    $number= $_POST['number'];
    $numberquery="UPDATE userprofile SET lifeexperience='$number' WHERE uid=$uid";
    $numberresult=mysqli_query($conn,$numberquery);
    header("Location: user_profile.php");
}   

//if save button is pressed(name)
if (isset($_POST['save-name'])){
    $name= $_POST['name'];
    $namequery="UPDATE user SET name='$name' WHERE uid=$uid";
    $nameresult=mysqli_query($conn,$namequery);
    $_SESSION['name']=$name;
    header("Location: user_profile.php");
}   

//if save button is pressed(education)
if (isset($_POST['save-education'])){
    $education= $_POST['education'];
    $educationquery="UPDATE userprofile SET education='$education' WHERE uid=$uid";
    $educationresult=mysqli_query($conn,$educationquery);
    header("Location: user_profile.php");
}

//if save button is pressed(skills)
if (isset($_POST['save-skills'])){
    $skills= $_POST['skills'];
    $skillsquery="UPDATE userprofile SET skills='$skills' WHERE uid=$uid";
    $skillsresult=mysqli_query($conn,$skillsquery);
    header("Location: user_profile.php");
}

//get number of jobs posted
$jobquery="SELECT * FROM jobhunter WHERE uid=$uid";
$jobresult=mysqli_query($conn,$jobquery);
$jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);
$jobcount=count($jobs);

?>