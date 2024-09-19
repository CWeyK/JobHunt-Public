<?php
include 'conn.php';
session_start();
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

//hire function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function send_hire_message($name,$email,$uid,$hid,$companyemail,$companyname,$gmail_password){
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                         //Send using SMTP
    $mail->SMTPAuth   = true;    
    
    
    $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through                               //Enable SMTP authentication
    $mail->Username   = 'webdevbruv@gmail.com';              //SMTP username
    $mail->Password   = $gmail_password;                  //SMTP password
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;     //Enable implicit TLS encryption
    $mail->Port       = 587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('webdevbruv@gmail.com', $name);
    $mail->addAddress($email);                             //Add a recipient  
    
    $mail->isHTML(true);                                    //Set email format to HTML
    $mail->Subject = 'A company is interested in hiring you!';

    //Email format;
    $email_template= "<h2>Hello, $name</h2>
    <h3>$companyname has expressed interest in hiring you from one of your <a href='http://localhost/jobhunt/view_jobhunter.php?hid=$hid'>jobhunting posts</a>. You may check their company profile by clicking <a href='http://localhost/jobhunt/view_company.php?uid=$uid'>here</a></h3>
    <h3>You may contact them at $companyemail</h3>
    <br>
    ";

    
    $mail->Body    = $email_template;

    $mail->send();

}






//when user click apply
if(isset($_POST['hire'])){
    if(empty($_SESSION['uid'])){
        $_SESSION['applystatus']="<div class='error'>Please login to hire</div>";
        header ("Location: view_jobhunter.php?hid=$hid");
    }else{
        $uid=$_SESSION['uid'];
        $hid=$_GET['hid'];
        //get name and email of company
        $userquery="SELECT * FROM user WHERE uid=$uid";
        $userresult=mysqli_query($conn,$userquery);
        $user=mysqli_fetch_assoc($userresult);
        $companyname=$user['name'];
        $companyemail=$user['email'];
        //get email of user who posted job
        $jobquery="SELECT * FROM jobhunter INNER JOIN user on user.uid=jobhunter.uid WHERE jobhunter.hid=$hid";
        $jobresult=mysqli_query($conn,$jobquery);
        $job=mysqli_fetch_assoc($jobresult);
        $name=$job['name'];
        $email=$job['email'];
        
        //obtain gmail password from database
        $gmail_password_query="SELECT * FROM admininfo";
        $gmail_password_query_run=mysqli_query($conn,$gmail_password_query);
        $gmail_password_row=mysqli_fetch_array($gmail_password_query_run);
        $gmail_password=$gmail_password_row['password'];
        send_hire_message($name,$email,$uid,$hid,$companyemail,$companyname,$gmail_password);

        $_SESSION['applystatus']="<div class='success'>Email sent</div>";
        
        header ("Location: view_jobhunter.php?hid=$hid&uid=$uid");
    }
}


?>