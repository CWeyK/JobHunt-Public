<?php include 'header.php';
include 'view_jobb.php';?>

<!DOCTYPE HTML>
<html>
    <body>
        <section class="job-details">
            <h1 class="heading">Job Details</h1>
            <div class="details">
                <div class="job-info">
                    <h3><?=$job['title']?></h3>
                    <a href="view_company.php?uid=<?=$job['uid']?>"><?=$profile['name']?></a>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$job['location']?></p>
                </div>
                <div class="basic-details">
                    <h3>Salary</h3>
                    <p>RM <?=$job['salary']?></p>
                    <h3>Benefits</h3>
                    <p><?=$job['benefits']?></p>
                    <h3>Job type</h3>
                    <p><?=$job['type']?></p>
                </div>
                <h3>Requirements</h3>
                <p class="job-details"><?=$job['requirements']?></p>
                <h3>Skills</h3>
                <p class="job-details"><?=$job['skills']?></p>
                <!--
                <ul>
                    <h3>requirements</h3>
                    <li>Education: <span>graduate</span></li>
                    <li>Age: <span>25+</span></li>
                    <li>Language: <span>English, Malay</span></li>
                    <li>Experience: <span>3+ years</span></li>
                </ul>
                <ul>
                    c
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JavaScript</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                </ul>
                -->
                
                <div class="description">
                    <h3>Job Description</h3>
                    <p><?=$job['description']?></p>
                    <ul>
                        <li>Hiring <?=$job['noofcandidates']?> candidates for this role</li>
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
                <?php
                
                    if(isset($_SESSION['applystatus'])){
                        echo $_SESSION['applystatus'];
                        unset($_SESSION['applystatus']);
                    }
                ?>
                    <input type="submit" value="apply" onclick="togglePopApply()" class="btn">
                
            </div>
        </section>
        <!--confirmation popup-->
        <div class="popup" id="popupapply">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="view_jobb.php?jid=<?=$jid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopApply()"></i></span>
                    <br><br>
                    <h3>Apply Confirmation</h3>  
                    <p>Are you sure you want to apply for this job listing?</p>
                    <p>Applying will send your details to the company who posted the job listing.</p>
                    <input type="submit" value="Apply" name="apply" class="delete-btn" >
                </form>
            </div>
        </div>

    </body>
    <script src="js/apply.js"></script>

</html>

<?php include 'footer.php';?>