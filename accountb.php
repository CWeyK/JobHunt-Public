<?php
error_reporting(E_ALL ^ E_NOTICE);
    session_start();
    $name="";
    $email="";
    $password="";
    $cpassword="";
    $accounttype=0;

    $errors=array();
    //connect to database
    include "conn.php";

    //password reset function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    //obtain staff email and password
    $query="SELECT * FROM admininfo";
    $query_run=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($query_run);
    $staffemail=$row['email'];
    $staffpassword=$row['password'];

    function send_password_reset($get_name,$get_email,$token,$gmail_password){
        
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                         //Send using SMTP
        $mail->SMTPAuth   = true;    
        
        
        $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through                               //Enable SMTP authentication
        $mail->Username   = 'webdevbruv@gmail.com';              //SMTP username
        $mail->Password   = $gmail_password;                  //SMTP password
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;     //Enable implicit TLS encryption
        $mail->Port       = 587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('webdevbruv@gmail.com', $get_name);
        $mail->addAddress($get_email);                             //Add a recipient  
        
        $mail->isHTML(true);                                    //Set email format to HTML
        $mail->Subject = 'Reset Password Notification';

        //Email format;
        $email_template= "<h2>Hello</h2>
        <h3>This is the password reset link for your JobHunt account.</h3>
        <br>
        <a href='http://localhost/jobhunt/passwordreset.php?token=$token&email=$get_email'>Click here to be redirected</a>";

        
        $mail->Body    = $email_template;

        $mail->send();

    }




    //once register button is clicked
    if (isset($_POST['register'])){
        $name = (!empty($_POST["name"]))?$_POST["name"]:"";
        $email = (!empty($_POST["email"]))?$_POST["email"]:"";
        $password = (!empty($_POST["password"]))?$_POST["password"]:"";
        $cpassword = (!empty($_POST["cpassword"]))?$_POST["cpassword"]:"";
        $accounttype = (!empty($_POST["accounttype"]))?$_POST["accounttype"]:"";
    


    
        //error if no account type chosen
        if($accounttype==''){
            $_SESSION['registerstatus']= "<div class=error>Please choose account type!</div>";
            header("Location: register.php");
            return 0;
        }
        //error if password and confirm password do not match
        if($password != $cpassword){
            $_SESSION['registerstatus']= "<div class=error>Passwords do not match!</div>";
            header("Location: register.php");
            return 0;
        }
        //error if email already in use
        $emailquery="SELECT * FROM user WHERE email='$email'";
        $emailresult=mysqli_query($conn,$emailquery);
        $emailcount=mysqli_num_rows($emailresult);
        if($emailcount>0){
            $_SESSION['registerstatus']= "<div class=error>Email already in use!</div>";
            header("Location: register.php");
            return 0;
        }

        //if no errors, register user
        $epassword=md5($password);
        //generate random token
        $token = md5(rand());
        $query="INSERT INTO user
                (email,name,password,accounttype,profilepicture,token)
                VALUES
                ('$email','$name','$epassword','$accounttype','profileicon.png','$token')";
        $query_run=mysqli_query($conn,$query);
        //generate default value for profile details
        $uid=mysqli_insert_id($conn);
        if($accounttype==1){
            $date=date("Y-m-d");
            $query2="INSERT INTO userprofile
                    (uid,education,skills,aboutus,location,lifeexperience,birthdate,resume)
                    VALUES
                    ('$uid','Edit your education','Edit your skills','Edit your description','Edit your location','0','$date','sample.pdf')";
            $query2_run=mysqli_query($conn,$query2);
        } 
        if($accounttype==2){
            $date=date("Y-m-d");
            $query2="INSERT INTO companyprofile
                    (uid,aboutus,establisheddate,noofemployees,location)
                    VALUES
                    ('$uid','Edit your description','$date','0','Edit your location')";
            $query2_run=mysqli_query($conn,$query2);
        }
        
        if($query_run){
            $_SESSION['registerstatus']= "<div class=success>Registration successful!</div>";
            header("Location: register.php");
        }
        else{
            $_SESSION['registerstatus']= "<div class=error>Registration failed!</div>";
            header("Location: register.php");
        }
    
    }
    

    //once signin button is clicked
    if (isset($_POST['login'])){
        $email = (!empty($_POST["email"]))?$_POST["email"]:"";
        $password = (!empty($_POST["password"]))?$_POST["password"]:"";
        //encrypt password
        $epassword=md5($password);
    

        //check for account in database
        $query="select * from user where '$email'=email AND '$epassword'=password";
        $query_run=mysqli_query($conn, $query);

        //log in part
        if(mysqli_num_rows($query_run)==1){
            //save data for use across sessions
            $udata=mysqli_fetch_array($query_run);
            $uid=$udata['uid'];
            $name=$udata['name'];
            $accounttype=$udata['accounttype'];
            $profilepicture=$udata['profilepicture'];
            $_SESSION['accounttype']=$accounttype;
            $_SESSION['name']=$name;
            $_SESSION['uid']=$uid;
            $_SESSION['profilepicture']=$profilepicture;
            //debug part
            //$_SESSION['login']= "Log in successful";
            //redirect to home page
            header('location: home.php');
        }else{
            $_SESSION['loginstatus']= "<div class=error>Email or password invalid.</div>";
            header('location: login.php');
        }
    }

    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['name']);
        unset($_SESSION['uid']);
        header('location: login.php');

    }

    //send password reset
    if(isset($_POST['send'])){
        //obtain email
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $token=md5(rand());
        $check_email="SELECT * FROM user WHERE email='$email'";
        $check_email_run=mysqli_query($conn,$check_email);
        if(mysqli_num_rows($check_email_run)>0){
            $row=mysqli_fetch_array($check_email_run);
            $get_name=$row['name'];
            $get_email=$row['email'];

            $update_token="UPDATE user SET token='$token' WHERE email='$get_email'";
            $update_token_run=mysqli_query($conn,$update_token);
            //obtain gmail password from database
            $gmail_password_query="SELECT * FROM admininfo";
            $gmail_password_query_run=mysqli_query($conn,$gmail_password_query);
            $gmail_password_row=mysqli_fetch_array($gmail_password_query_run);
            $gmail_password=$gmail_password_row['password'];
            
           


            if($update_token_run){
                send_password_reset($get_name,$get_email,$token,$gmail_password);
                $_SESSION['loginstatus']= "<div class=success>A password reset link has been sent</div>";
                header("Location: login.php");
                return 0;
            }else{
                $_SESSION['loginstatus']= "<div class=error>Something went wrong!</div>";
                header("Location: login.php");
                return 0;
            }
        }else{
            $_SESSION['loginstatus']= "<div class=error>Email not found!</div>";
            header("Location: login.php");
            return 0;
        }

    }
?>

