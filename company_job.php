<?php include 'header.php';
include 'view_jobb.php';
?>

<!DOCTYPE HTML>
<html>
    <body>
        <section class="job-details">
            <h1 class="heading">Job Details</h1>
            <div class="details">
                <div class="job-info">
                    <h3><?=$job['title']?><span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopTitle()"><span></i></h3>
                    <a href="view_company.php?uid=<?=$job['uid']?>"><?=$profile['name']?></a>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$job['location']?><span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopLocation()"><span></i></p>
                </div>
                <div class="basic-details">
                    <h3>Salary<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopSalary()"><span></i></h3>
                    <p><?=$job['salary']?></p>
                    <h3>Benefits<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopBenefits()"><span></i></h3>
                    <p><?=$job['benefits']?></p>
                    <h3>Job type<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopType()"><span></i></h3>
                    <p><?=$job['type']?></p>
                </div>
                <h3>Requirements<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopRequirements()"><span></i></h3>
                <p class="job-details"><?=$job['requirements']?></p>
                <h3>Skills<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopSkills()"><span></i></h3>
                <p class="job-details"><?=$job['skills']?></p>
                
                
                <div class="description">
                    <h3>Job Description<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopDescription()"><span></i></h3>
                    <p><?=$job['description']?></p>
                    <ul>
                        <li>Hiring <?=$job['noofcandidates']?> candidates for this role<span class=edit-span2><i class="fa-solid fa-pen-to-square" id="edit-button-pop" onclick="togglePopNumber()"><span></i></li>
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
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
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
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
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
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopSalary()"></i></span>
                    <br><br>
                    <h3>Edit Job Salary</h3>  
                    <p>Enter New Job Salary</p>
                    <input class="registertext" type="number" required name="salary" maxlength="100" placeholder="Job Salary" class="input">
                    
                    <input type="submit" value="Save" name="save-salary" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Benefits popup-->
        <div class="popup" id="popupbenefits">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopBenefits()"></i></span>
                    <br><br>
                    <h3>Edit Job Benefits</h3>  
                    <p>Enter New Job Benefits</p>
                    <textarea class="aboutustextarea" name="benefits" id="aboutustextarea" rows="5" placeholder="Job Benefits" required></textarea>
                       
                    <input type="submit" value="Save" name="save-benefits" class="edit-form-btn">  
                </form>
            </div>
        </div>
        <!--Job Type popup-->
        <div class="popup" id="popuptype">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
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
        <!--Requirements popup-->
        <div class="popup" id="popuprequirements">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopRequirements()"></i></span>
                    <br><br>
                    <h3>Edit Job Requirements</h3>  
                    <p>Enter New Job Requirements</p>
                    <textarea class="aboutustextarea" name="requirements" id="aboutustextarea" rows="5" placeholder="Job Requirements" required></textarea>
                       
                    <input type="submit" value="Save" name="save-requirements" class="edit-form-btn">  
                </form>
            </div>
        </div>
        <!--Skills popup-->
        <div class="popup" id="popupskills">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopSkills()"></i></span>
                    <br><br>
                    <h3>Edit Job Skills</h3>  
                    <p>Enter New Job Skills</p>
                    <textarea class="aboutustextarea" name="skills" id="aboutustextarea" rows="5" placeholder="Job Skills" required></textarea>
                       
                    <input type="submit" value="Save" name="save-skills" class="edit-form-btn">  
                </form>
            </div>
        </div>
        <!--Description popup-->
        <div class="popup" id="popupdescription">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopDescription()"></i></span>
                    <br><br>
                    <h3>Edit Job Description</h3>  
                    <p>Enter New Job Description</p>
                    <textarea class="aboutustextarea" name="description" id="aboutustextarea" rows="5" placeholder="Job Description" required></textarea>
                       
                    <input type="submit" value="Save" name="save-description" class="edit-form-btn">  
                </form>
            </div>
        </div>
        <!--Number popup-->
        <div class="popup" id="popupnumber">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopNumber()"></i></span>
                    <br><br>
                    <h3>Edit Number of Candidates</h3>  
                    <p>Enter New Number of Candidates</p>
                    <input class="registertext" type="number" required name="number" maxlength="100" placeholder="Number of Candidates" class="input">
                    
                    <input type="submit" value="Save" name="save-number" class="edit-form-btn">
                </form>
            </div>
        </div>
        <!--Delete confirmation popup-->
        <div class="popup" id="popupdelete">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="company_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopDelete()"></i></span>
                    <br><br>
                    <h3>Delete Job</h3>  
                    <p>Are you sure you want to delete this job?</p>
                    <input type="submit" value="Delete" name="delete" class="delete-btn" >
                </form>
            </div>
        </div>
    </body>
    <script src="js/edittitle.js"></script>
    <script src="js/editlocation.js"></script>   
    <script src="js/editsalary.js"></script> 
    <script src="js/editbenefits.js"></script>
    <script src="js/edittype.js"></script>
    <script src="js/filter2.js"></script>
    <script src="js/editrequirements.js"></script>
    <script src="js/editskills.js"></script>   
    <script src="js/editdescription.js"></script>
    <script src="js/editnumber.js"></script> 
    <script src="js/deleteconfirm.js"></script>
</html>

<?php include 'footer.php';?>