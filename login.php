<?php include 'header.php';
?>
<!DOCTYPE HTML>
<html>
    <body>
        <div class="account-form-container">
        <section class="account-form">
            <form action="accountb.php" method="post">
                <h3>Welcome back!</h3>
                <!--Display if login successful-->
                <?php
                    if(isset($_SESSION['loginstatus'])){
                        echo $_SESSION['loginstatus'];
                        unset($_SESSION['loginstatus']);
                    }
                ?>
                <input class="registertext" type="email" required name="email" maxlength="50" placeholder="Enter your email" class="input">
                <input class="registertext" type="password" required name="password" maxlength="20" placeholder="Enter your password" class="input">
                <p>Don't have an account? Register <a href="register.php">here</a></p>
                <p>Forgot your password? Click <a class="forget" onclick=togglePop()>here</a></p>

                <input type="submit" value="login" name="login" class="btn">
            </form>
        </section>
        </div>
        <!--Forget password popup-->
        <div class="popup" id="popup">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="accountb.php" method="post" id="forget-form">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePop()"></i></span>
                    <br><br>
                    <h3>Forgot your password?</h3>
                    <p>Enter your email and we will send you a password reset link</p>
                    <input class="registertext" type="email" required name="email" maxlength="50" placeholder="Enter your email" class="input">
                            
                     <input type="submit" value="Send" name="send" class="edit-form-btn">
                </form>
                
            </div>
        </div>
        <script src="js/editabout.js"></script>
    </body>
</html>
<?php include 'footer.php';?>