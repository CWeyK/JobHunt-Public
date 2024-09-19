<?php
    //initialize all variables
    include_once 'conn.php';
    include_once  'accountb.php';
    
    $title="";
    $description="";
    $salary="";
    $location="";
    $type="";
    $experience="";

    $uid=$_SESSION['uid'];
    //once newjob button is clicked
    if (isset($_POST['post'])){
        $date=date("Y-m-d");
        $title=$_POST['title'];
        $description=$_POST['description'];
        $salary=$_POST['salary'];
        $location=$_POST['location'];
        $type=$_POST['type'];
        $experience=$_POST['experience'];

        //insert into database
        $sql="INSERT INTO jobhunter (uid,title,location,salary,dateposted,type,experience) VALUES ('$uid','$title','$location','$salary','$date','$type','$experience')";
        $query_run=mysqli_query($conn,$sql);
        //obtain jobhunterid
        $hid=mysqli_insert_id($conn);
        //insert into jobdetails
        $sql2="INSERT INTO jobhunterdetails (hid,description) VALUES ('$hid','$description')";
        $query_run2=mysqli_query($conn,$sql2);

        header("Location: user_jobhunter.php?hid=$hid");


    }
?>