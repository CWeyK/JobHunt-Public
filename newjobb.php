<?php
    //initialize all variables
    include_once 'conn.php';
    include_once  'accountb.php';
    
    $title="";
    $description="";
    $salary="";
    $location="";
    $type="";
    $workmode="";
    $skills="";
    $benefits="";
    $requirements="";
    $number="";
    $uid=$_SESSION['uid'];
    //once newjob button is clicked
    if (isset($_POST['post'])){
        $date=date("Y-m-d");
        $title=$_POST['title'];
        $description=$_POST['description'];
        $salary=$_POST['salary'];
        $location=$_POST['location'];
        $type=$_POST['type'];
        $workmode=$_POST['workmode'];
        $skills=$_POST['skills'];
        $benefits=$_POST['benefits'];
        $requirements=$_POST['requirements'];
        $number=$_POST['number'];

        //insert into database
        $sql="INSERT INTO job (uid,title,salary,type,workmode,location,dateposted ) VALUES ('$uid','$title','$salary','$type','$workmode','$location','$date')";
        $query_run=mysqli_query($conn,$sql);
        //obtain jobid
        $jobid=mysqli_insert_id($conn);
        //insert into jobdetails
        $sql2="INSERT INTO jobdetails (jid,description,skills,benefits,requirements,noofcandidates) VALUES ('$jobid','$description','$skills','$benefits','$requirements','$number')";
        $query_run2=mysqli_query($conn,$sql2);

        header("Location: company_job.php?jid=$jobid");


    }
?>