<?php
include 'conn.php';
session_start();
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



//apply function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

function send_apply_message($name,$email,$uid,$jid,$companyemail,$companyname,$gmail_password){
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();                                         //Send using SMTP
    $mail->SMTPAuth   = true;    
    
    
    $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through                               //Enable SMTP authentication
    $mail->Username   = 'webdevbruv@gmail.com';              //SMTP username
    $mail->Password   = $gmail_password;                  //SMTP password
    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;     //Enable implicit TLS encryption
    $mail->Port       = 587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('webdevbruv@gmail.com', $companyname);
    $mail->addAddress($companyemail);                             //Add a recipient  
    
    $mail->isHTML(true);                                    //Set email format to HTML
    $mail->Subject = 'Someone has applied for your job listing!';

    //Email format;
    $email_template= "<h2>Hello, $companyname</h2>
    <h3>$name has applied to one of your <a href='http://localhost/jobhunt/view_job.php?jid=$jid'>job listings</a>. You may check their profile by clicking <a href='http://localhost/jobhunt/view_user.php?uid=$uid'>here</a></h3>
    <h3>You may contact them at $email</h3>
    <br>
    ";

    
    $mail->Body    = $email_template;

    $mail->send();

}






//when user click apply
if(isset($_POST['apply'])){
    if(empty($_SESSION['uid'])){
        $_SESSION['applystatus']="<div class='error'>Please login to apply</div>";
        header ("Location: view_job.php?jid=$jid");
    }else{
        $uid=$_SESSION['uid'];
        $jid=$_GET['jid'];
        //get name and email of user
        $userquery="SELECT * FROM user WHERE uid=$uid";
        $userresult=mysqli_query($conn,$userquery);
        $user=mysqli_fetch_assoc($userresult);
        $name=$user['name'];
        $email=$user['email'];
        //get email of company who posted job
        $companyquery="SELECT * FROM user INNER JOIN job ON user.uid=job.uid WHERE jid=$jid";
        $companyresult=mysqli_query($conn,$companyquery);
        $company=mysqli_fetch_assoc($companyresult);
        $companyemail=$company['email'];
        $companyname=$company['name'];
        //obtain gmail password from database
        $gmail_password_query="SELECT * FROM admininfo";
        $gmail_password_query_run=mysqli_query($conn,$gmail_password_query);
        $gmail_password_row=mysqli_fetch_array($gmail_password_query_run);
        $gmail_password=$gmail_password_row['password'];
        send_apply_message($name,$email,$uid,$jid,$companyemail,$companyname,$gmail_password);

        $_SESSION['applystatus']="<div class='success'>Applied</div>";
        
        header ("Location: view_job.php?jid=$jid&uid=$uid");
    }
}



?>