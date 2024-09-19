<?php include 'header.php';
include 'user_profileb.php';?>
<!DOCTYPE HTML>
<html>
    <body>
        <!--Company details-->
        <section class="view-company">  
            <h1 class="heading">Your profile</h1>
            <div class="details">
                <div class="info">
                    <img src="images/<?=$profile['profilepicture']?>" alt="">
                    <h3><?=$profile['name']?></h3>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$profile['location']?><span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopLocation()"><span></i></p>
                </div>
                <div class="description">
                <?php 
                if(isset($_SESSION['resumeerror'])){
                    echo $_SESSION['resumeerror'];
                    unset($_SESSION['resumeerror']);
                }
                ?>
                    <h3>About Me <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePop()"><span></i></h3>
                    
                    <p><?=$profile['aboutus']?></p>
                    
                    <h3>My Education <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopEducation()"><span></i></h3>
                    
                    <p><?=$profile['education']?></p>

                    <h3>My Skills <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopSkills()"><span></i></h3>
                    
                    <p><?=$profile['skills']?></p>
                    
                </div>
                
                

                <ul>
                    <li>Looking for <?=$jobcount?> job(s)</li>
                    <li>Born in <?=$profile['birthdate']?> <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopDate()"><span></i></li>
                    <li><?=$profile['lifeexperience']?> year(s) of working experience <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopNo()"><span></i></li>
                </ul>
                <div class="description">
                    <h3>My resume <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopResume()"><span></i></h3>
                    
                    <embed type="application/pdf" src="resume/<?=$profile['resume']?>" width="600" height="1000" />
                    
                </div>
            </div>
        </section>
        <!--About us popup-->
        <div class="popup" id="popup">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_profile.php" method="post">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePop()"></i></span>
                    <br><br>
                    <h3>Edit About Company</h3>
                    <p>You can write a brief introduction about your organization and what it does.</p>
                    <label for="aboutustextarea">Describe your organization</label>
                    <textarea class="aboutustextarea" name="aboutus" id="aboutustextarea" rows="10" placeholder="Description here..." required></textarea>
                            
                     <input type="submit" value="Save" name="save-about" class="edit-form-btn">
                </form>
                
            </div>
        </div>
        <!--Location popup-->
        <div class="popup" id="popuplocation">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_profile.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopLocation()"></i></span>
                    <br><br>
                    <h3>Edit Location</h3>  
                    <p>Location of your residence/preferred workplace</p>
                    <input class="registertext" type="text" required name="location" maxlength="100" placeholder="Location" class="input">
                    
                    <input type="submit" value="Save" name="save-location" class="edit-form-btn">
                </form>
                
            </div>
        </div>
        <!--Birth date popup-->
        <div class="popup" id="popupdate">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_profile.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopDate()"></i></span>
                    <br><br>
                    <h3>Edit Birth Date</h3>  
                    <p>Your Birth Date</p>
                    <input class="registertext" type="date" required name="date"  placeholder="Location" class="input">
                    
                    <input type="submit" value="Save" name="save-date" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--No of employees popup-->
        <div class="popup" id="popupno">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_profile.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopNo()"></i></span>
                    <br><br>
                    <h3>Edit Years Of Experience</h3>  
                    <p>Years Of Working Experience You Had</p>
                    <input class="registertext" type="number" required name="number" maxlength="100" placeholder="Years Of Experience" class="input">
                    
                    <input type="submit" value="Save" name="save-number" class="edit-form-btn">
                </form>
            </div>
        </div>

        
        <!--Resume popup-->
        <div class="popup" id="popupresume">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="resumeupload.php" method="post" enctype="multipart/form-data" id="resume-form">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopResume()"></i></span>
                    <br><br>
                    <h3>Upload your resume</h3>  
                    <p>Your resume (PDF only)</p>
                    <input id="pdf" type="file" name="pdf" value="" required><br><br><br><br>
                    <input id="upload" type="submit" name="submit" value="Upload" class="edit-form-btn">
                </form>
            </div>
        </div>

        <!--Education popup-->
        <div class="popup" id="popupeducation">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_profile.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopEducation()"></i></span>
                    <br><br>
                    <h3>Edit Education</h3>
                    <label for="aboutustextarea">Elaborate on your education history</label>
                    <textarea class="aboutustextarea" name="education" id="aboutustextarea" rows="10" placeholder="Education here..." required></textarea>
                    
                    
                    <input type="submit" value="Save" name="save-education" class="edit-form-btn">
                </form>
                
            </div>
        </div>

        <!--Skills popup-->
        <div class="popup" id="popupskills">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_profile.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopSkills()"></i></span>
                    <br><br>
                    <h3>Edit Skills</h3>
                    <label for="aboutustextarea">Elaborate on your skills</label>
                    <textarea class="aboutustextarea" name="skills" id="aboutustextarea" rows="10" placeholder="Skills here..." required></textarea>
                    
                    
                    <input type="submit" value="Save" name="save-skills" class="edit-form-btn">
                </form>
                
            </div>
        </div>

        <script src="js/editabout.js"></script>
        <script src="js/editlocation.js"></script>
        <script src="js/editdate.js"></script>
        <script src="js/editno.js"></script>
        <script src="js/editresume.js"></script>
        <script src="js/editskills.js"></script>
        <script src="js/editeducation.js"></script>
    </body>
    
    
</html>
<?php include 'footer.php';?>
