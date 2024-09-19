<?php 
error_reporting(E_ALL ^ E_NOTICE);
include_once 'header.php';

include_once 'newpostb.php';?>

<!DOCTYPE HTML>
<html>
    <body>
        
        <section class="view-company">  
            <h1 class="heading">New JobHunter Post</h1>
            <div class="details">
                <form action="newpostb.php" method="post" class="newjob">
                    <h4>Basic Post Details</h4>
                    <h3>Job Title</h3>
                    <input class="registertext" type="text" required name="title" maxlength="50" placeholder="Enter Job Title" class="input">
                    
                    <h3>Expected Salary</h3>
                    <input class="registertext" type="number" required name="salary" maxlength="20" placeholder="Enter Job Salary (RM)" class="input">
                    
                    <h3>Job Location</h3>
                    <input class="registertext" type="text" required name="location" maxlength="100" placeholder="Enter Job Location" class="input">
                    
                    <h3>Job Type</h3>
                    <div class="dropdown">
                            <input type="text" readonly placeholder="Enter Job Type" name="type" maxlength="20" class="output" required>
                            <div class="lists">
                                <p class="items">Full-Time</p>
                                <p class="items">Part-Time</p>
                                <p class="items">Contract</p>
                                <p class="items">Internship</p>
                                <p class="items">Temporary</p>
                            </div>
                    </div>
                    
                    <h3>Years Of Experience</h3>
                    <input class="registertext" type="number" required name="experience" maxlength="20" placeholder="Enter Years Of Experience" class="input">
                    <br>
                    <br>
                    <br>
                    <br>
                    <h4>Advanced Post Details</h4>

                    <h3>Post Description</h3>
                    <textarea class="newjobtextarea" name="description" id="aboutustextarea" rows="10" placeholder="Enter Job Description" required></textarea>

                     

                    <input type="submit" value="Post" name="post" class="btn">
                </form>
            </div>
        </section>
        
        
            
       
    </body>
    
    <script src="js/newjob.js"></script>
</html>
<?php include 'footer.php';?>