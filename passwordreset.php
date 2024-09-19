<?php error_reporting(E_ALL ^ E_NOTICE); 
include 'header.php';
  
?>

<!DOCTYPE HTML>
<html>
    <body>
        
        <section class="view-company">  
            <h1 class="heading">Password Reset</h1>
            <div class="details">
                <?php
                
                    if(isset($_SESSION['passwordstatus'])){
                        echo $_SESSION['passwordstatus'];
                        unset($_SESSION['passwordstatus']);
                    }
                ?>
                <form action="passwordresetb.php" method="post" class="newjob">
                
                <h3>Enter your new password</h3>    
                <input class="registertext" type="password" required name="password" maxlength="50" placeholder="Enter new password" class="input">
                <input class="registertext" type="password" required name="cpassword" maxlength="50" placeholder="Confirm your password" class="input">
                <!--Hidden input fields-->
                <input type="hidden" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>">
                <input type="hidden" name="token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
                     

                    <input type="submit" value="Reset" name="reset" class="btn">
                </form>
            </div>
        </section>
        
        
            
       
    </body>

</html>
<?php include 'footer.php';?>