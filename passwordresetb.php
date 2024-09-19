<?php
session_start();
include 'conn.php';
if (isset($_POST['reset'])){
        $email=$_POST['email'];
        $token=$_POST['token'];
        $password =$_POST["password"];
        $cpassword=$_POST['cpassword'];
        
        if($cpassword==$password){
            //checktoken
            if(!empty($token)){
                if(!empty($email)){
                    //checking token validity
                    $check_token="SELECT token FROM user WHERE token='$token' AND email='$email'";
                    $check_token_run=mysqli_query($conn,$check_token);
                    if(mysqli_num_rows($check_token_run)){
                        //encrypt password
                        $epassword=md5($password);
                        $update_password="UPDATE user SET password='$epassword' WHERE email='$email'";
                        $update_password_run=mysqli_query($conn,$update_password);
                        if($update_password_run){
                            //generate and update token
                            $new_token=md5(rand());
                            $update_token="UPDATE user SET token='$new_token' WHERE email='$email'";
                            $update_token_run=mysqli_query($conn,$update_token);
                            $_SESSION['passwordstatus']= "<div class=success>Password reset successful!</div>";
                            header("Location: passwordreset.php?token=$token&email=$email");
                            return 0;
                        }else{
                            $_SESSION['passwordstatus']= "<div class=success>Password reset failed!</div>";
                            header("Location: passwordreset.php?token=$token&email=$email");
                            return 0;
                        }
                    }else{
                        $_SESSION['passwordstatus']= "<div class=error>Invalid Token!</div>";
                        header("Location: passwordreset.php?token=$token&email=$email");
                        return 0;
                    }

                }else{
                    $_SESSION['passwordstatus']= "<div class=error>Missing email!</div>";
                    header("Location: passwordreset.php?token=$token&email=$email");
                    return 0;
                }
            }else{
                $_SESSION['passwordstatus']= "<div class=error>Missing token!</div>";
                header("Location: passwordreset.php?token=$token&email=$email");
                return 0;
            }
            
        }else{
            $_SESSION['passwordstatus']= "<div class=error>Passwords do not match!</div>";
            header("Location: passwordreset.php?token=$token&email=$email");
            return 0;
        }
        


        
    }
?>