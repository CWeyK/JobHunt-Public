<?php
include 'conn.php';
//get job details from database
$jid=$_GET["jid"];
$jobquery="SELECT * FROM job INNER JOIN user on user.uid=job.uid INNER JOIN jobdetails on job.jid=jobdetails.jid WHERE job.jid=$jid";
$jobresult=mysqli_query($conn,$jobquery);
$job=mysqli_fetch_assoc($jobresult);
//get company details from database
$uid=$job['uid'];
$profilequery="SELECT * FROM companyprofile INNER JOIN user on user.uid=companyprofile.uid WHERE companyprofile.uid=$uid";
$profileresult=mysqli_query($conn,$profilequery);
$profile=mysqli_fetch_assoc($profileresult);

//if save button is pressed(title)
if (isset($_POST['save-title'])){
    $title= $_POST['title'];
    $titlequery="UPDATE job SET title='$title' WHERE jid=$jid";
    $titleresult=mysqli_query($conn,$titlequery);
    header("Location: company_job.php?jid=$jid");
}
//if save button is pressed(location)
if (isset($_POST['save-location'])){
    $location= $_POST['location'];
    $locationquery="UPDATE job SET location='$location' WHERE jid=$jid";
    $locationresult=mysqli_query($conn,$locationquery);
    header("Location: company_job.php?jid=$jid");
}
//if save button is pressed(salary)
if (isset($_POST['save-salary'])){
    $salary= $_POST['salary'];
    $salaryquery="UPDATE job SET salary='$salary' WHERE jid=$jid";
    $salaryresult=mysqli_query($conn,$salaryquery);
    header("Location: company_job.php?jid=$jid");
}
//if save button is pressed(benefits)
if (isset($_POST['save-benefits'])){
    $benefits= $_POST['benefits'];
    $benefitsquery="UPDATE jobdetails SET benefits='$benefits' WHERE jid=$jid";
    $benefitsresult=mysqli_query($conn,$benefitsquery);
    header("Location: company_job.php?jid=$jid");
}
//if save button is pressed(type)
if (isset($_POST['save-type'])){
    $type= $_POST['type'];
    $typequery="UPDATE job SET type='$type' WHERE jid=$jid";
    $typeresult=mysqli_query($conn,$typequery);
    header("Location: company_job.php?jid=$jid");
}
//if save button is pressed(requirements)
if (isset($_POST['save-requirements'])){
    $requirements= $_POST['requirements'];
    $requirementsquery="UPDATE jobdetails SET requirements='$requirements' WHERE jid=$jid";
    $requirementsresult=mysqli_query($conn,$requirementsquery);
    header("Location: company_job.php?jid=$jid");
}
//if save button is pressed(skills)
if (isset($_POST['save-skills'])){
    $skills= $_POST['skills'];
    $skillsquery="UPDATE jobdetails SET skills='$skills' WHERE jid=$jid";
    $skillsresult=mysqli_query($conn,$skillsquery);
    header("Location: company_job.php?jid=$jid");
}
//if save button is pressed(description)
if (isset($_POST['save-description'])){
    $description= $_POST['description'];
    $descriptionquery="UPDATE jobdetails SET description='$description' WHERE jid=$jid";
    $descriptionresult=mysqli_query($conn,$descriptionquery);
    header("Location: company_job.php?jid=$jid");
}
//if save button is pressed(number)
if (isset($_POST['save-number'])){
    $number= $_POST['number'];
    $numberquery="UPDATE jobdetails SET noofcandidates='$number' WHERE jid=$jid";
    $numberresult=mysqli_query($conn,$numberquery);
    header("Location: company_job.php?jid=$jid");
}
//if delete button is pressed{
if (isset($_POST['delete'])){
    $deletequery2="DELETE FROM jobdetails WHERE jid=$jid";
    $deleteresult2=mysqli_query($conn,$deletequery2);
    $deletequery="DELETE FROM job WHERE jid=$jid";
    $deleteresult=mysqli_query($conn,$deletequery); 
    header("Location: yourjobs.php");
}
?>