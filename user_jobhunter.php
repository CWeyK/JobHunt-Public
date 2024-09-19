<?php include 'header.php';
include 'user_jobhunterb.php';?>

<!DOCTYPE HTML>
<html>
    <body>
        <section class="job-details">
            <h1 class="heading">JobHunter Details</h1>
            <div class="details">
                <div class="job-info">
                    <h3><?=$job['title']?><span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopTitle()"><span></i></h3>
                    <a href="view_user.php?uid=<?=$profile['uid']?>"><?=$profile['name']?></a>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$job['location']?><span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopLocation()"><span></i></p>
                </div>
                <div class="basic-details">
                    <h3>Expected Salary<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopSalary()"><span></i></h3>
                    <p>RM <?=$job['salary']?></p>
                    <h3>Years of experience<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopNo()"><span></i></h3>
                    <p><?=$job['experience']?> Years</p>
                    <h3>Job type<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopType()"><span></i></h3>
                    <p><?=$job['type']?></p>
                </div>
    
                
                <div class="description">
                    <h3>Brief Description<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePop()"><span></i></h3>
                    <p><?=$job['description']?></p>
                    <ul>
                        
                        <li>
                            <!--Calculate how many days ago-->
                            <?php
                            $today=date("Y-m-d");
                            $date=date_create($job['dateposted']);
                            $date=date_format($date,"Y-m-d");
                            $diff=date_diff(date_create($date),date_create($today));
                            $diff=$diff->format("%a");
                            if($diff==0){
                                echo "Posted today";
                            }else if($diff==1){
                                echo "Posted yesterday";
                            }else{
                                echo "Posted ".$diff." days ago";
                            }
                            ?>
                        </li>
                    </ul>
                </div>
                <form action="" method="post" class="flex-btn">
                    <btn value="Delete" class="btn" onclick="togglePopDelete()">Delete</btn>
                </form>
            </div>
        </section>
        <!--Title popup-->
        <div class="popup" id="popuptitle">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_jobhunter.php?hid=<?=$hid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopTitle()"></i></span>
                    <br><br>
                    <h3>Edit Job Title</h3>  
                    <p>Enter New Job Title</p>
                    <input class="registertext" type="text" required name="title" maxlength="100" placeholder="Job Title" class="input">
                    
                    <input type="submit" value="Save" name="save-title" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Location popup-->
        <div class="popup" id="popuplocation">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_jobhunter.php?hid=<?=$hid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopLocation()"></i></span>
                    <br><br>
                    <h3>Edit Job Location</h3>  
                    <p>Enter New Job Location</p>
                    <input class="registertext" type="text" required name="location" maxlength="100" placeholder="Job Location" class="input">
                    
                    <input type="submit" value="Save" name="save-location" class="edit-form-btn">
                </form>
            </div>
        </div>  
        <!--Salary popup-->
        <div class="popup" id="popupsalary">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_jobhunter.php?hid=<?=$hid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopSalary()"></i></span>
                    <br><br>
                    <h3>Edit Expected Salary</h3>  
                    <p>Enter New Expected Salary</p>
                    <input class="registertext" type="number" required name="salary" maxlength="100" placeholder="Job Salary" class="input">
                    
                    <input type="submit" value="Save" name="save-salary" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Experience popup-->
        <div class="popup" id="popupno">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_jobhunter.php?hid=<?=$hid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopNo()"></i></span>
                    <br><br>
                    <h3>Edit Years Of Experience</h3>  
                    <p>Years Of Working Experience You Had In This Field</p>
                    <input class="registertext" type="number" required name="number" maxlength="100" placeholder="Years Of Experience" class="input">
                    
                    <input type="submit" value="Save" name="save-number" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Job Type popup-->
        <div class="popup" id="popuptype">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_jobhunter.php?hid=<?=$hid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopType()"></i></span>
                    <br><br>
                    <h3>Edit Job Type</h3>  
                    <p>Enter New Job Type</p>
                    <div class="dropdown">
                        <input type="text" readonly placeholder="Job Type" name="type" maxlength="20" class="output" required>
                        <div class="lists">
                            <p class="items">Full-Time</p>
                            <p class="items">Part-Time</p>
                            <p class="items">Contract</p>
                            <p class="items">Internship</p>
                            <p class="items">Temporary</p>  
                        </div>
                    </div>
                    
                    <input type="submit" value="Save" name="save-type" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Description popup-->
        <div class="popup" id="popup">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_jobhunter.php?hid=<?=$hid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePop()"></i></span>
                    <br><br>
                    <h3>Edit Job Requirements</h3>  
                    <p>Enter New Job Requirements</p>
                    <textarea class="aboutustextarea" name="about" id="aboutustextarea" rows="5" placeholder="Job Requirements" required></textarea>
                       
                    <input type="submit" value="Save" name="save-about" class="edit-form-btn">  
                </form>
            </div>
        </div>
        <!--Delete confirmation popup-->
        <div class="popup" id="popupdelete">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="user_jobhunter.php?hid=<?=$hid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopDelete()"></i></span>
                    <br><br>
                    <h3>Delete Post</h3>  
                    <p>Are you sure you want to delete this post?</p>
                    <input type="submit" value="Delete" name="delete" class="delete-btn" >
                </form>
            </div>
        </div>

        <script src="js/edittitle.js"></script>
        <script src="js/editlocation.js"></script>
        <script src="js/editsalary.js"></script>
        <script src="js/editno.js"></script>
        <script src="js/edittype.js"></script>
        <script src="js/editabout.js"></script> 
        <script src="js/filter2.js"></script>
        <script src="js/deleteconfirm.js"></script>
    </body>
                           
</html>

<?php include 'footer.php';?>