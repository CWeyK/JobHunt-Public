<?php
    include 'conn.php';
session_start();
if (isset($_POST['submit'])) {
    $pdf=$_FILES['pdf']['name'];
    $pdf_type=$_FILES['pdf']['type'];
    $pdf_size=$_FILES['pdf']['size'];
    $pdf_tem_loc=$_FILES['pdf']['tmp_name'];

    $pdf_ex=pathinfo($pdf,PATHINFO_EXTENSION);
    $pdf_ex_lc=strtolower($pdf_ex);

    $allowed_exs=array("pdf");

    if(in_array($pdf_ex_lc,$allowed_exs)){
        $new_pdf_name=uniqid("PDF-",true).'.'.$pdf_ex_lc;
        $pdf_upload_path="resume/".$new_pdf_name;
        move_uploaded_file($pdf_tem_loc,$pdf_upload_path);
        $uid=$_SESSION['uid'];
        $sql="UPDATE userprofile SET resume='$new_pdf_name' WHERE uid='$uid'";
        mysqli_query($conn,$sql);
        $_SESSION['resumeerror']='<div class="success">Resume has been uploaded</div>';
        header ("Location: user_profile.php");
    }else{
        $_SESSION['resumeerror']='<div class="error">You can\'t upload files of this type</div>';
        header ("Location: user_profile.php");
    }



}

?>
