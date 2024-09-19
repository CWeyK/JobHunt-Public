<?php include 'header.php';
;?>
<!DOCTYPE HTML>
<html>
    <body>
        <div class="account-form-container">
        <section class="account-form">
            <form action="accountb.php" method="post">
                <h3>Create new account!</h3>
                <!--Display if register successful-->
                <?php
                //$_SESSION['registerstatus']='<div class=error>Email already in use!</div>';
                    if(isset($_SESSION['registerstatus'])){
                        echo $_SESSION['registerstatus'];
                        unset($_SESSION['registerstatus']);
                    }
                    ?>
                <input class="registertext" type="email" required name="email" maxlength="50" placeholder="Enter your email" class="input">
                <input class="registertext" type="text" required name="name" maxlength="50" placeholder="Enter your name" class="input">
                <input class="registertext" type="password" required name="password" maxlength="50" placeholder="Enter your password" class="input">
                <input class="registertext" type="password" required name="cpassword" maxlength="50" placeholder="Confirm your password" class="input">
                <span class="accounttypelabel">Choose account type: </span><br>
                
                <input type="radio" class="registerradio" name="accounttype" value=1><label class="radiolabel">Personal</label> 
                <input type="radio" class="registerradio" name="accounttype" value=2><label class="radiolabel">Business/Corporate</label><br><br>
                <p>Already have an account? Log-in <a href="login.php">here</a></p>
                <input type="submit" value="register" name="register" class="btn">
            </form>
        </section>
        </div>
        
    </body>
</html>
<?php include 'footer.php';?>