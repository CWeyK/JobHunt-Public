<?php include 'header.php';
include 'view_userb.php';?>
<!DOCTYPE HTML>
<html>
    <body>
        <!--Company details-->
        <section class="view-company">  
            <h1 class="heading">My profile</h1>
            <div class="details">
                <div class="info">
                    <img src="images/<?=$profile['profilepicture']?>" alt="">
                    <h3><?=$profile['name']?></h3>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$profile['location']?></p>
                </div>
                <div class="description">
                <?php 
                if(isset($_SESSION['resumeerror'])){
                    echo $_SESSION['resumeerror'];
                    unset($_SESSION['resumeerror']);
                }
                ?>
                    <h3>About Me </h3>
                    
                    <p><?=$profile['aboutus']?></p> 

                    <h3>My Education </h3>
                    
                    <p><?=$profile['education']?></p>

                    <h3>My Skills </h3>
                    
                    <p><?=$profile['skills']?></p>
                    
                </div>
                
                

                <ul>
                    <li>Looking for <?=$jobcount?> job(s)</li>
                    <li>Born in <?=$profile['birthdate']?> </li>
                    <li><?=$profile['lifeexperience']?> year(s) of working experience </li>
                </ul>
                <div class="description">
                    <h3>My resume </h3>
                    
                    <embed type="application/pdf" src="resume/<?=$profile['resume']?>" width="600" height="1000" />
                    
                </div>
            </div>
        </section>

        <!--Job listing section-->
        <section class="jobs-container">
        <h1 class="heading">Some Of This JobHunter's Posts</h1>
            <div class="box-container">
                <?php foreach($jobs as $job){ ?>
                    <div class="box">
                    <div class="company">
                        <img src="images/<?=$profile['profilepicture']?>" alt="">
                        <div>
                            <h3><?=$profile['name']?></h3>
                            <!--Calculate how many days ago-->
                            <p><?php
                            $today=date("Y-m-d");
                            $date=date_create($job['dateposted']);
                            $date=date_format($date,"Y-m-d");
                            $diff=date_diff(date_create($date),date_create($today));
                            $diff=$diff->format("%a");
                            if($diff==0){
                                echo "Today";
                            }else if($diff==1){
                                echo "Yesterday";
                            }else{
                                echo $diff." days ago";
                            }
                            ?><p>
                        </div>
                    </div>
                    <h3 class="job-title"><?=$job['title']?></h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i>
                    <span><?=$job['location']?></span></p>
                    <div class="tags">
                        <p><i class="fas fa-money-bill"></i><span>RM<?=$job['salary']?></span></p>
                        <p><i class="fas fa-briefcase"></i><span><?=$job['type']?></span></p>
                        <p><i class="fas fa-regular fa-clock"></i><span><?=$job['experience']?> Year(s)</span></p>
                    </div>
                    <div class="flex-btn">
                        <a href="view_jobhunter.php?hid=<?=$job['hid']?>" class="btn">View Job</a>
                    </div>
                </div>
                <?php }?>
            

            </div>

        </section>
        


    </body>
    
    
</html>
<?php include 'footer.php';?>
