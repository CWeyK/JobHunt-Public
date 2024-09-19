<?php include 'header.php'; 
error_reporting(E_ALL ^ E_NOTICE);
include 'settingsb.php';

   
    
?>

<!DOCTYPE HTML>
<html>
    <body>
        
        <section class="view-company">  
            <h1 class="heading">Account Details</h1>
            <div class="details">
            <?php 
                if(isset($_SESSION['passworderror'])){
                    echo $_SESSION['passworderror'];
                    unset($_SESSION['passworderror']);
                }
            ?>
                <h3>Email<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopEmail()"><span></i></h3>
                <p class="job-details"><?=$account['email']?></p>
                <h3>Name<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopName()"><span></i></h3>
                <p class="job-details"><?=$account['name']?></p>
                <h3>Account Type</h3>
                <p class="job-details">
                <?php
                if($account['accounttype']==1){
                    echo "Personal";
                }else{
                    echo "Business/Organization";
                }
                ?></p>
                <form action="" method="post" class="flex-btn">
                    <btn value="Change Profifle Picture" class="btn" onclick="togglePopProfilePicture()">Change Profile Picture</btn>
                </form>
                





                <form action="" method="post" class="flex-btn">
                    <btn value="Change Password" class="btn" onclick="togglePopPassword()">Change Password</btn>
                </form>

            </div>
        </section>
        <!--Title popup-->
        <div class="popup" id="popupemail">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="settingsb.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopEmail()"></i></span>
                    <br><br>
                    <h3>Edit Email</h3>  
                    <p>Enter New Email</p>
                    <input class="registertext" type="email" required name="email" maxlength="100" placeholder="New Email" class="input">
                    <p>Confirm Password</p>
                    <input class="registertext" type="password" required name="password" maxlength="100" placeholder="Password" class="input">
                    <input type="submit" value="Save" name="save-email" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Name popup-->
        <div class="popup" id="popupname">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="settingsb.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopName()"></i></span>
                    <br><br>
                    <h3>Edit Name</h3>  
                    <p>Enter New Name</p>
                    <input class="registertext" type="text" required name="name" maxlength="100" placeholder="New Name" class="input">
                    <p>Confirm Password</p>
                    <input class="registertext" type="password" required name="password" maxlength="100" placeholder="Password" class="input">
                    <input type="submit" value="Save" name="save-name" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Password Popup-->
        <div class="popup" id="popuppassword">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="settingsb.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopPassword()"></i></span>
                    <br><br>
                    <h3>Change Password</h3>  
                    <p>Enter New Password</p>
                    <input class="registertext" type="password" required name="password" maxlength="100" placeholder="New Password" class="input">
                    <p>Confirm Old Password</p>
                    <input class="registertext" type="password" required name="password2" maxlength="100" placeholder="Confirm Password" class="input">
                    <input type="submit" value="Save" name="save-password" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Profile Picture Popup-->
        <div class="popup" id="popupprofilepicture">
            <div class="pop-up-content" id="pop-up-content">
                <form class ="edit-form" action="upload.php" method="post" enctype="multipart/form-data" id="profileform">
                <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopProfilePicture()"></i></span>
                <br><br>
                <h3>Change Profile Picture</h3>     
                <p>Upload New Profile Picture</p>
                <input type="file" required name="my_image" class="custom-file-input">
                <p>Confirm Password</p>
                <input class="passwordinput" type="password" required name="password" maxlength="100" placeholder="Password" class="input">
                <input type="submit" name="submit" value="Change" class="edit-form-btn">
     </form>
            </div>
        </div>
        
            
       
    </body>
    
    <script src="js/editemail.js"></script>
    <script src="js/editname.js"></script>
    <script src="js/editprofilepicture.js"></script>
    <script src="js/editpassword.js"></script>


</html>
<?php include 'footer.php';?>
