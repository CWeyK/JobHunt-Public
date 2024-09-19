<?php
include 'conn.php';
$noperpage=6;
//reset filter
if(isset($_GET['reset'])){
    unset($_SESSION['testquery']);
    header('location: jobs.php');

}
//home page redirect
if(isset($_POST['search'])){
    $title=$_POST['title'];
    $location=$_POST['location'];

    header('location: jobs.php?title='.$title.'&location='.$location);
    
    
}







if(!empty($_SESSION['testquery'])){
    //once filter button is clicked
    if (isset($_POST['filter'])){
        $salary="";
        $type="";
        $mode="";   
        $date="";
        $title="";
        $location="";

        $salary = $_POST["salary"];
        $type = $_POST["type"];
        $mode = $_POST["mode"];
        $date = $_POST["date"];
        $title = $_POST["title"];
        $location = $_POST["location"];

        $typequery="";
        $workmodequery="";
        $salaryquery="";
        $datequery="";
        $locationquery="";

        $titlequery="(title LIKE '%$title%' OR name LIKE '%$title%')";

        if(!empty($salary)){
            //Determine how much salary is
            switch($salary){
                case "RM 500 or less":
                    $salaryquery="AND salary<=500";
                    break;
                case "RM500 - RM1000":
                    $salaryquery="AND salary>=500 AND salary<=1000";
                    break;
                case "RM1000 - RM2000":
                    $salaryquery="AND salary>=1000 AND salary<=2000";
                    break;
                case "RM2000 - RM5000":
                    $salaryquery="AND salary>=2000 AND salary<=5000";
                    break;
                case "RM5000 - RM10000":
                    $salaryquery="AND salary>=5000 AND salary<=10000";
                    break;
                case "RM 10000 or above":
                    $salaryquery="AND salary>=10000";
                    break;
            }
        }
        if(!empty($type)){
            $typequery="AND type='$type'";
        }
        if(!empty($mode)){
            $workmodequery="AND workmode='$mode'";
        }
        if(!empty($location)){
            $locationquery="AND location='$location'";
        }
        if(!empty($date)){
            //Determine how long ago the job was posted
            switch($date){
                case "Today":
                    $datequery="AND dateposted=CURDATE()";
                    break;
                case "Last 3 days":
                    $datequery="AND dateposted>=DATE_SUB(CURDATE(), INTERVAL 3 DAY)";
                    break;
                case "Last 7 days":
                    $datequery="AND dateposted>=DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
                    break;
                case "Last 14 days":
                    $datequery="AND dateposted>=DATE_SUB(CURDATE(), INTERVAL 14 DAY)";
                    break;
                case "Last 30 days":
                    $datequery="AND dateposted>=DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
                    break;
                case "All time":
                    $datequery="";
                    break;
            }
        }

        $start=0;

        //get number of rows
        $pagequery="SELECT * FROM job inner join user on job.uid=user.uid  WHERE $titlequery $typequery $salaryquery $workmodequery $datequery $locationquery";
        $pageresult=mysqli_query($conn,$pagequery);
        $numrows=mysqli_num_rows($pageresult);
        //get number of pages
        $pages=ceil($numrows/$noperpage);

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr']-1;
            $start=$page*$noperpage;
            
        }

        $jobquery="SELECT * FROM job inner join user on job.uid=user.uid WHERE $titlequery $typequery $salaryquery $workmodequery $datequery $locationquery LIMIT $start,$noperpage";
        $jobresult=mysqli_query($conn,$jobquery);
        $jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);
        $testquery="WHERE $titlequery $typequery $salaryquery $workmodequery $datequery $locationquery";
        $_SESSION['testquery']=$testquery;

    }
        //testquery
        $testquery=$_SESSION['testquery'];
        $start=0;
        //get number of rows
        $pagequery="SELECT * FROM job inner join user on job.uid=user.uid $testquery";
        $pageresult=mysqli_query($conn,$pagequery);
        $numrows=mysqli_num_rows($pageresult);
        //get number of pages
        $pages=ceil($numrows/$noperpage);

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr']-1;
            $start=$page*$noperpage;
            
        }

        
        $jobquery="SELECT * FROM job inner join user on job.uid=user.uid $testquery LIMIT $start,$noperpage";
        $jobresult=mysqli_query($conn,$jobquery);
        $jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);

}else{

    //once filter button is clicked
    if (isset($_POST['filter'])){
        $salary="";
        $type="";
        $mode="";   
        $date="";
        $title="";
        $location="";

        $salary = $_POST["salary"];
        $type = $_POST["type"];
        $mode = $_POST["mode"];
        $date = $_POST["date"];
        $title = $_POST["title"];
        $location = $_POST["location"];

        $typequery="";
        $workmodequery="";
        $salaryquery="";
        $datequery="";
        $locationquery="";

        $titlequery="(title LIKE '%$title%' OR name LIKE '%$title%')";

        if(!empty($salary)){
            //Determine how much salary is
            switch($salary){
                case "RM 500 or less":
                    $salaryquery="AND salary<=500";
                    break;
                case "RM500 - RM1000":
                    $salaryquery="AND salary>=500 AND salary<=1000";
                    break;
                case "RM1000 - RM2000":
                    $salaryquery="AND salary>=1000 AND salary<=2000";
                    break;
                case "RM2000 - RM5000":
                    $salaryquery="AND salary>=2000 AND salary<=5000";
                    break;
                case "RM5000 - RM10000":
                    $salaryquery="AND salary>=5000 AND salary<=10000";
                    break;
                case "RM 10000 or above":
                    $salaryquery="AND salary>=10000";
                    break;
            }
        }
        if(!empty($type)){
            $typequery="AND type='$type'";
        }
        if(!empty($mode)){
            $workmodequery="AND workmode='$mode'";
        }
        if(!empty($location)){
            $locationquery="AND location='$location'";
        }
        if(!empty($date)){
            //Determine how long ago the job was posted
            switch($date){
                case "Today":
                    $datequery="AND dateposted=CURDATE()";
                    break;
                case "Last 3 days":
                    $datequery="AND dateposted>=DATE_SUB(CURDATE(), INTERVAL 3 DAY)";
                    break;
                case "Last 7 days":
                    $datequery="AND dateposted>=DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
                    break;
                case "Last 14 days":
                    $datequery="AND dateposted>=DATE_SUB(CURDATE(), INTERVAL 14 DAY)";
                    break;
                case "Last 30 days":
                    $datequery="AND dateposted>=DATE_SUB(CURDATE(), INTERVAL 30 DAY)";
                    break;
                case "All time":
                    $datequery="";
                    break;
            }
        }

        $start=0;
        //get number of rows
        $pagequery="SELECT * FROM job inner join user on job.uid=user.uid  WHERE $titlequery $typequery $salaryquery $workmodequery $datequery $locationquery";
        $pageresult=mysqli_query($conn,$pagequery);
        $numrows=mysqli_num_rows($pageresult);
        //get number of pages
        $pages=ceil($numrows/$noperpage);

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr']-1;
            $start=$page*$noperpage;
            
        }

        $jobquery="SELECT * FROM job inner join user on job.uid=user.uid WHERE $titlequery $typequery $salaryquery $workmodequery $datequery $locationquery LIMIT $start,$noperpage";
        $jobresult=mysqli_query($conn,$jobquery);
        $jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);
        $testquery="WHERE $titlequery $typequery $salaryquery $workmodequery $datequery $locationquery";
        $_SESSION['testquery']=$testquery;

    }else{
        $start=0;
        //get number of rows
        $pagequery="SELECT * FROM job inner join user on job.uid=user.uid ";
        $pageresult=mysqli_query($conn,$pagequery);
        $numrows=mysqli_num_rows($pageresult);
        //get number of pages
        $pages=ceil($numrows/$noperpage);

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr']-1;
            $start=$page*$noperpage;
            
        }

        $testquery="";
        $jobquery="SELECT * FROM job inner join user on job.uid=user.uid LIMIT $start,$noperpage";
        $jobresult=mysqli_query($conn,$jobquery);
        $jobs=mysqli_fetch_all($jobresult,MYSQLI_ASSOC);


    }



}

?>