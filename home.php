<?php include 'header.php';
include 'homeb.php'?>

<!DOCTYPE HTML>
<html>
    <body>
        <div class="home-container">
            <section class="home">
                <!--Change picture in style.css .home-container -->
                <?php if ($_SESSION['accounttype']==2){?>
                <form action="jobhuntersb.php" method="post">
                    <h3>Find your future employees</h3>
                    <p>Job Title</p>
                    <input type="text" name="title" placeholder="Keyword, category or company" required maxlength="20" class="input">
                    <p>Job Location</p>
                    <input type="text" name="location" placeholder="City, state or country" required maxlength="50" class="input">
                    <input type="submit" value="search JobHunter" name="search" class="btn">
                </form>
                <?php }else if($_SESSION['accounttype']==1){?>
                    <form action="jobsb.php" method="post">
                    <h3>Find your dream job</h3>
                    <p>Job Title</p> 
                    <input type="text" name="title" placeholder="Keyword, category or company" required maxlength="20" class="input">
                    <p>Job Location</p>
                    <input type="text" name="location" placeholder="City, state or country" required maxlength="50" class="input">
                    <input type="submit" value="search job" name="search" class="btn">
                </form>
                <?php }else if($_SESSION['accounttype']==0){?>
                    <form action="register.php" method="post" id="guest-form">
                    <br><br>
                    <h3>Find your dream job or your future employee</h3>
                    <br><br><br><br><br>
                    <h3>Register an account now for free to start your job hunting journey</h3>
                    <br><br>
                    <input type="submit" value="Register" name="search" class="btn">
                </form>
                <?php }?>
            </section>
        </div>
        
        <?php if($_SESSION['accounttype']==1){?>
        <!--Job listing section-->
        <section class="jobs-container">
        <h1 class="heading">Latest Jobs</h1>
            <div class="box-container">
                <?php foreach($jobs as $job){ ?>
                    <div class="box">
                    <div class="company">
                        <img src="images/<?=$job['profilepicture']?>" alt="">
                        <div>
                            <h3><?=$job['name']?></h3>
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
                        <p><i class="fas fa-building"></i><span><?=$job['workmode']?></span></p>
                    </div>
                    <div class="flex-btn">
                        <a href="view_job.php?jid=<?=$job['jid']?>" class="btn">View Job</a>
                    </div>
                </div>
                <?php }?>
            

            </div>
            

        
        <div style="text-align: center; margin-top:1.5rem;">
            <a href="jobs.php" class="btn">View All Jobs</a>
        </section>
        <?php }else if($_SESSION['accounttype']==2){?>
        <!--Job hunter section-->
        <section class="jobs-container">
        <h1 class="heading">Latest JobHunter Posts</h1>
            <div class="box-container">
                <?php foreach($jobhunters as $jobhunter){ ?>
                    <div class="box">
                    <div class="company">
                        <img src="images/<?=$jobhunter['profilepicture']?>" alt="">
                        <div>
                            <h3><?=$jobhunter['name']?></h3>
                            <!--Calculate how many days ago-->
                            <p><?php
                            $today=date("Y-m-d");
                            $date=date_create($jobhunter['dateposted']);
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
                    <h3 class="job-title"><?=$jobhunter['title']?></h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i>
                    <span><?=$jobhunter['location']?></span></p>
                    <div class="tags">
                        <p><i class="fas fa-money-bill"></i><span>RM<?=$jobhunter['salary']?></span></p>
                        <p><i class="fas fa-briefcase"></i><span><?=$jobhunter['type']?></span></p>
                        <p><i class="fas fa-regular fa-clock"></i><span><?=$jobhunter['experience']?></span> Year(s)</p>
                    </div>
                    <div class="flex-btn">
                        <a href="view_jobhunter.php?hid=<?=$jobhunter['hid']?>" class="btn">View JobHunter</a>
                    </div>
                </div>
                <?php }?>
            

            </div>
            

        
        <div style="text-align: center; margin-top:1.5rem;">
            <a href="jobhunters.php" class="btn">View All JobHunters</a>
        </section>
        <?php }?>





    </body>


</html>

<?php include 'footer.php';?>