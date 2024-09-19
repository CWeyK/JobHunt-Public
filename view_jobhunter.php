<?php include 'header.php';
include 'view_jobhunterb.php';?>

<!DOCTYPE HTML>
<html>
    <body>
        <section class="job-details">
            <h1 class="heading">JobHunter Details</h1>
            <div class="details">
                <div class="job-info">
                    <h3><?=$job['title']?></h3>
                    <a href="view_user.php?uid=<?=$profile['uid']?>"><?=$profile['name']?></a>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$job['location']?></p>
                </div>
                <div class="basic-details">
                    <h3>Expected Salary</h3>
                    <p>RM <?=$job['salary']?></p>
                    <h3>Years of experience</h3>
                    <p><?=$job['experience']?> Years</p>
                    <h3>Job type</h3>
                    <p><?=$job['type']?></p>
                </div>
    
                
                <div class="description">
                    <h3>Brief Description</h3>
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
                <?php
                
                    if(isset($_SESSION['applystatus'])){
                        echo $_SESSION['applystatus'];
                        unset($_SESSION['applystatus']);
                    }
                ?>
                    <input type="submit" value="hire" class="btn" onclick="togglePopApply()">
            </div>
        </section>
        <!--confirmation popup-->
        <div class="popup" id="popupapply">
            <div class="pop-up-content" id="pop-up-content">
                <form class="edit-form" action="view_jobhunterb.php?hid=<?=$hid?>" method="post" id="edit-form-location">
                    <span><i class="fa-sharp fa-regular fa-circle-xmark" id="edit-close" onclick="togglePopApply()"></i></span>
                    <br><br>
                    <h3>Hire Confirmation</h3>  
                    <p>Are you sure you want to approach this JobHunter with an offer?</p>
                    <p>Confirming will send your details to the JobHunter who posted this post.</p>
                    <input type="submit" value="Hire" name="hire" class="delete-btn" >
                </form>
            </div>
        </div>
    </body>
    <script src="js/apply.js"></script>

</html>

<?php include 'footer.php';?>