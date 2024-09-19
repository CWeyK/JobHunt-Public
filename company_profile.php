<?php include 'header.php';
include 'company_profileb.php';?>
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
                    <h3>About company <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePop()"><span></i></h3>
                    
                    <p><?=$profile['aboutus']?></p> 
                    
                </div>
                
                

                <ul>
                    <li><?=$jobcount?> job(s) posted</li>
                    <li>established at <?=$profile['establisheddate']?> <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopDate()"><span></i></li>
                    <li><?=$profile['noofemployees']?> working employees <span class=edit-span><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopNo()"><span></i></li>
                </ul>
            </div>
        </section>
        <!--About us popup-->
        <div class="popup" id="popup">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_profile.php" method="post">
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
                <form class="edit-form" action="company_profile.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopLocation()"></i></span>
                    <br><br>
                    <h3>Edit Location</h3>  
                    <p>Location of your organization office/headquarters</p>
                    <input class="registertext" type="text" required name="location" maxlength="100" placeholder="Location" class="input">
                    
                    <input type="submit" value="Save" name="save-location" class="edit-form-btn">
                </form>
                
            </div>
        </div>
        <!--Established date popup-->
        <div class="popup" id="popupdate">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_profile.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopDate()"></i></span>
                    <br><br>
                    <h3>Edit Established Date</h3>  
                    <p>Date your organization was founded</p>
                    <input class="registertext" type="date" required name="date"  placeholder="Location" class="input">
                    
                    <input type="submit" value="Save" name="save-date" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--No of employees popup-->
        <div class="popup" id="popupno">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_profile.php" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopNo()"></i></span>
                    <br><br>
                    <h3>Edit Number Of Employees</h3>  
                    <p>Number of employees working for your organization</p>
                    <input class="registertext" type="number" required name="number" maxlength="100" placeholder="Number of employees" class="input">
                    
                    <input type="submit" value="Save" name="save-number" class="edit-form-btn">
                </form>
            </div>
        </div>

        

        <script src="js/editabout.js"></script>
        <script src="js/editlocation.js"></script>
        <script src="js/editdate.js"></script>
        <script src="js/editno.js"></script>
        <script src="js/editname.js"></script>
    </body>
    
    
</html>
<?php include 'footer.php';?>
