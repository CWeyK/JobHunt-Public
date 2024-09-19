<?php include 'header.php';
include 'yourpostsb.php';
//obtain job listings



?>

<!DOCTYPE HTML>
<html>
    <body>
        
        <!--Job listing section-->
        <section class="jobs-container">
        <h1 class="heading">Your Posts</h1>
        <div class="button-container">
            <a href="newpost.php" class="newjob-btn">New Job</a>
        </div>
        <br> <br> <br>
            <div class="box-container">
                <?php foreach($jobs as $job){ 
                    $hid=$job['hid'];?>
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
                        <p><i class="fas fa-regular fa-clock"></i><span><?=$job['experience']?></span> Year(s)</p>
                    </div>
                    <div class="flex-btn">
                        <a href="user_jobhunter.php?hid=<?=$job['hid']?>" class="btn">Edit/Delete Post</a>
                        
                    </div>
                    
                </div>
                
                <?php }?>
            

            </div>

        </section>
        


    </body>

    <script src="js/filter.js"></script>
    

</html>

<?php include 'footer.php';?>