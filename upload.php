


<?php 
include 'conn.php';
session_start();
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
			$_SESSION['passworderror']="<div class='error'>File too large</div>";
		    header("Location: settings.php?");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                //Check password
                //obtain original password from database and compare
                $uid=$_SESSION['uid'];
                $inputpassword=$_POST['password'];
                $epassword=md5($inputpassword);
                $passwordquery="SELECT * FROM user WHERE uid=$uid";
                $passwordresult=mysqli_query($conn,$passwordquery);
                $password=mysqli_fetch_assoc($passwordresult);
                $originalpassword=$password['password'];
                if ($epassword==$originalpassword){
                    // Insert into Database
                    $sql = "UPDATE user SET profilepicture='$new_img_name' WHERE uid='$uid'";
                    mysqli_query($conn, $sql);
                    $_SESSION['profilepicture']=$new_img_name;
                    $_SESSION['passworderror']="<div class='success'>Profile picture has been updated</div>";
                    header("Location: settings.php");
                }
                else{
                    $_SESSION['passworderror']="<div class='error'>Incorrect password</div>";
                    header("Location: settings.php");
                }
				
			}else {
				$_SESSION['passworderror']="<div class='error'>You can't upload files of this type</div>";
		header("Location: settings.php?");
			}
		}
	}else {
		$_SESSION['passworderror']="<div class='error'>Uknown error occured</div>";
		header("Location: settings.php?");
	}
}
?>