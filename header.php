<?php include 'conn.php';
include 'accountb.php'; 
include 'passwordresetb.php';
?>    

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JobHunt</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--Header-->
        <!--If you are not logged in-->
        <?php
            if(empty($_SESSION['accounttype'])){
                $_SESSION['accounttype']=0;
            }
            if($_SESSION['accounttype']==0){
        ?>
        <header class="header">
            <section class="flex">

                <div id="menu-btn" class="fas fa-bars-staggered"></div>               
                <a href="home.php" class="logo"><i class="fas fa-briefcase"></i>JobHunt.</a>

                <nav class="navbar" >
                    <a href="home.php">Home</a>
                    <a href="jobs.php">View Jobs</a>
                    <a href="jobhunters.php">View JobHunters</a>
                </nav>

                
                
                <a href="login.php" class="btn" style="margin-top: 0;">Log in</a> 
             </section>
        </header>
        <!--If personal account-->
        <?php
            }
            if($_SESSION['accounttype']==1){
        ?>
        <header class="header">
            <section class="flex">

                <div id="menu-btn" class="fas fa-bars-staggered"></div>               
                <a href="home.php" class="logo"><i class="fas fa-briefcase"></i>JobHunt.</a>

                <nav class="navbar" style="margin-right: 9rem;">
                    <a href="home.php">Home</a>
                    <a href="yourposts.php">Your Posts</a>
                    <a href="jobs.php">View Jobs</a>
                    
                </nav>

                
                <!--Dropdown-->
                <img src="images/<?=$_SESSION['profilepicture']?>" class="user-pic" onclick="toggleMenu()">
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="images/<?=$_SESSION['profilepicture']?>">
                            <h3><?php echo  $_SESSION['name'];?></h3>
                        </div>
                        <hr>
                        <a href="user_profile.php" class="sub-menu-link">
                            <img src="images/profile.png">
                            <p> Edit Profile</p> 
                        </a>
                        <a href="settings.php" class="sub-menu-link">
                            <img src="images/setting.png">
                            <p> Account Settings</p> 
                        </a>
                        <a href="login.php?logout='1'" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p> Log-out</p> 
                        </a>
                    </div>
                </div>
             </section>
        </header>
        <!--If business account-->
        <?php
            }
            if($_SESSION['accounttype']==2){
        ?>    
        <header class="header">
            <section class="flex">

                <div id="menu-btn" class="fas fa-bars-staggered"></div>               
                <a href="home.php" class="logo"><i class="fas fa-briefcase"></i>JobHunt.</a>

                <nav class="navbar" style="margin-right: 9rem;">
                    <a href="home.php">Home</a>
                    <a href="yourjobs.php">Your Jobs</a>
                    <a href="jobhunters.php">View JobHunters</a>
                </nav>

                
                <!--Dropdown-->
                <img src="images/<?=$_SESSION['profilepicture']?>" class="user-pic" onclick="toggleMenu()">
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="images/<?=$_SESSION['profilepicture']?>">
                            <h3><?php echo  $_SESSION['name'];?></h3>
                        </div>
                        <hr>
                        <a href="company_profile.php" class="sub-menu-link">
                            <img src="images/profile.png">
                            <p> Public Profile</p> 
                        </a>
                        <a href="settings.php" class="sub-menu-link">
                            <img src="images/setting.png">
                            <p> Account Settings</p> 
                        </a>
                        <a href="login.php?logout='1'" class="sub-menu-link">
                            <img src="images/logout.png">
                            <p> Log-out</p> 
                        </a>
                    </div>
                </div>
             </section>
        </header>
        <?php } ?>



        <script src="js/script.js"></script>
        <script src="js/header.js"></script>
        
    </body>
    
</html>