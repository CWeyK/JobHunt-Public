<?php include 'header.php';
include 'jobsb.php';
//obtain job listings

if(isset($_GET['page-nr'])){
    $id=$_GET['page-nr'];
}else{
    $id=1;
}
        

?>

<!DOCTYPE HTML>
<html>
    <body id=<?=$id?>>
    
        
        <!--Filter section-->
        <section class="job-filter">
                <h1 class="heading">Filter Jobs</h1>
                <form action="jobs.php" method="post">
                    <div class="flex">
                        <div class="box">
                            <p>Job Title <span>*</span></p>
                            <input type="text" name="title" placeholder="Keyword, category or company" value="<?php if(isset($_GET['title'])){echo $_GET['title'];}?>" required maxlength="50" class="input">
                        </div> 
                        <div class="box">
                            <p>Job Location </p>
                            <input type="text" name="location" placeholder="City, state or country"  value="<?php if(isset($_GET['location'])){echo $_GET['location'];}?>" maxlength="50" class="input">
                        </div> 
                    </div>
                    <div class="dropdown-container">
                        <div class="dropdown">
                            <input type="text" readonly placeholder="date posted" name="date" maxlength="20" class="output">
                            <div class="lists">
                                <p class="items">Today</p>
                                <p class="items">Last 3 days</p>
                                <p class="items">Last 7 days</p>
                                <p class="items">Last 14 days</p>
                                <p class="items">Last 30 days</p>
                                <p class="items">All time</p>
                            </div>
                        </div>

                        <div class="dropdown">
                            <input type="text" readonly placeholder="Salary" name="salary" maxlength="20" class="output">
                            <div class="lists">
                                <p class="items">RM500 or less</p>
                                <p class="items">RM500 - RM1000</p>
                                <p class="items">RM1000 - RM2000</p>
                                <p class="items">RM2000 - RM5000</p>
                                <p class="items">RM5000 - RM10000</p>
                                <p class="items">RM10000 or above</p>
                            </div>
                        </div>
                        

                        <div class="dropdown">
                            <input type="text" readonly placeholder="Type" name="type" maxlength="20" class="output">
                            <div class="lists">
                                <p class="items">Full-Time</p>
                                <p class="items">Part-Time</p>
                                <p class="items">Contract</p>
                                <p class="items">Internship</p>
                                <p class="items">Temporary</p>
                            </div>
                        </div>

                        <div class="dropdown">
                            <input type="text" readonly placeholder="Work Mode" name="mode" maxlength="20" class="output">
                            <div class="lists">
                                <p class="items">Physical</p>
                                <p class="items">Remote</p>
                                <p class="items">Hybrid</p>
                            </div>
                        </div>
                    </div>
                    <div class=filter-container>
                        <input type="submit" value="Apply filter" name="filter" class="btn">
                        <a href="jobs.php?reset=1" class="reset-filter">Reset filter</a>
                    </div>
                    
                </form>
                
            </section>




        <!--Job listing section-->
        <section class="jobs-container">
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
            

        </section>

        <!--Page section-->
        <section class="page">
            <div class="page-info">
                    <?php 
                        if(!isset($_GET['page-nr'])){
                            $page=1;
                        } else{
                            $page=$_GET['page-nr'];
                        }
                    ?>
                    Showing <?=$page?> of <?=$pages?> pages
                </div>
                <div class="pagination">
                    <!--Go to First page-->
                    <a href="?page-nr=1">First</a>
                    <!--Go to previous page-->
                    <?php
                        if(isset($_GET['page-nr']) && $_GET['page-nr']>1){
                            ?>
                                <a href='?page-nr=<?=$_GET['page-nr']-1?>'>Previous</a>
                            <?php
                        } else{
                            ?>
                                <a>Previous</a>
                            <?php
                        }
                    ?>
                    <!--Show page numbers-->
                    <div class="page-numbers">
                        <?php
                            for($counter=1; $counter<=$pages; $counter++){
                                ?>
                                    <a href="?page-nr=<?=$counter?>"><?=$counter?></a>
                                <?php
                            } 
                        ?>
                        
                    </div>                
                    <!--Go to next page-->
                    <?php
                        if(!isset($_GET['page-nr'])){
                            ?>
                                <a href="?page-nr=2">Next</a>

                            <?php
                        } else{
                            if($_GET['page-nr']>=$pages){
                                ?>
                                    <a>Next</a>
                                <?php
                            }else{
                                ?>
                                    <a href="?page-nr=<?=$_GET['page-nr']+1?>">Next</a>
                                    
                                <?php
                            }
                        }
                    ?>
                    <!--Go to last page-->
                    <a href="?page-nr=<?=$pages?>">Last</a>
                </div>
            </section>



    </body>

    <script src="js/filter.js"></script>
    <script src="js/page.js"></script>
</html>

<?php include 'footer.php';?>