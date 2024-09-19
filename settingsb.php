<?php 
include 'conn.php';
session_start();
//obtain user account details
$uid=$_SESSION['uid'];
$accountquery="SELECT * FROM user WHERE uid=$uid";
$accountresult=mysqli_query($conn,$accountquery);
$account=mysqli_fetch_assoc($accountresult);


//if save button is pressed(email)
if (isset($_POST['save-email'])){
    $email= $_POST['email'];
    $inputpassword=$_POST['password'];
    $epassword=md5($inputpassword);
    //obtain original password from database and compare
    $passwordquery="SELECT * FROM user WHERE uid=$uid";
    $passwordresult=mysqli_query($conn,$passwordquery);
    $password=mysqli_fetch_assoc($passwordresult);
    $originalpassword=$password['password'];
    if ($epassword==$originalpassword){
        //error if email already in use
        $emailquery="SELECT * FROM user WHERE email='$email'";
        $emailresult=mysqli_query($conn,$emailquery);
        $emailcount=mysqli_num_rows($emailresult);
        if($emailcount>0){
            $_SESSION['passworderror']= "<div class=error>Email already in use!</div>";
            header("Location: settings.php");
            return 0;
        }
        $email2query="UPDATE user SET email='$email' WHERE uid=$uid";
        $email2result=mysqli_query($conn,$email2query);
        header("Location: settings.php");
    }
    else{
        $_SESSION['passworderror']="<div class='error'>Incorrect password</div>";
        header("Location: settings.php");
    }
}
//if save button is pressed(name)
if (isset($_POST['save-name'])){
    $name= $_POST['name'];
    $inputpassword=$_POST['password'];
    $epassword=md5($inputpassword);
    //obtain original password from database and compare
    $passwordquery="SELECT * FROM user WHERE uid=$uid";
    $passwordresult=mysqli_query($conn,$passwordquery);
    $password=mysqli_fetch_assoc($passwordresult);
    $originalpassword=$password['password'];
    if ($epassword==$originalpassword){
        $namequery="UPDATE user SET name='$name' WHERE uid=$uid";
        $nameresult=mysqli_query($conn,$namequery);
        header("Location: settings.php");
    }
    else{
        $_SESSION['passworderror']="<div class='error'>Incorrect password</div>";
        header("Location: settings.php");
    }
}
//if save button is pressed(password)
if (isset($_POST['save-password'])){
    $newpassword= $_POST['password'];
    $oldpassword=$_POST['password2'];
    $enewpassword=md5($newpassword);
    $eoldpassword=md5($oldpassword);
    //obtain original password from database and compare
    $passwordquery="SELECT * FROM user WHERE uid=$uid";
    $passwordresult=mysqli_query($conn,$passwordquery);
    $password=mysqli_fetch_assoc($passwordresult);
    $originalpassword=$password['password'];
    if ($eoldpassword==$originalpassword){
        $namequery="UPDATE user SET password='$enewpassword' WHERE uid=$uid";
        $nameresult=mysqli_query($conn,$namequery);
        $_SESSION['passworderror']="<div class='success'>Password has been updated</div>";
        header("Location: settings.php");
    }
    else{
        $_SESSION['passworderror']="<div class='error'>Incorrect password</div>";
        header("Location: settings.php");
    }
}
//if save button is prssed(profile picture)
if (isset($_POST['save-profilepicture'])){
    $profilepicture=$_POST['profilepicture'];
}
?>