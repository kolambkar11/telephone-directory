<?php
require 'db.php';
/* Registration process, inserts user info into the database and sends account confirmation email message */
// Set session variables to be used on profile.php page
// Escape all $_POST variables to protect against SQL injections
session_start();
if(isset($_POST['create_contact'])){
	$first_name = $mysqli->escape_string($_POST['first_name']);
	$middle_name = $mysqli->escape_string($_POST['middle_name']);
	$last_name = $mysqli->escape_string($_POST['last_name']);
	$email = $mysqli->escape_string($_POST['email']);
	$mobile_number = $mysqli->escape_string($_POST['mobile_number']);
	$landline_number = $mysqli->escape_string($_POST['landline_number']);
	$notes = $mysqli->escape_string($_POST['notes']);
	$photo = $_FILES["photo"]["name"];
	$photo_tmp = $_FILES["photo"]["tmp_name"];
	//print_r($_FILES['photo']);die;
	
		$folder="dp/";
	
	
    $errors     = array();
    $maxsize    = 500000;
    $acceptable = array(
        'image/jpeg',
        'image/jpg',
        'image/png'
    );

    if(($_FILES['photo']['size'] >= $maxsize) || ($_FILES["photo"]["size"] == 0)) {
        $errors[] = 'File too large. File must be less than 500kb.';
    }

    if((!in_array($_FILES['photo']['type'], $acceptable)) && (!empty($_FILES["photo"]["type"]))) {
        $errors[] = 'Invalid file type. Only JPG, GIF and PNG types are accepted.';
    }

    if(count($errors) === 0) {
        move_uploaded_file($photo_tmp, $folder.$photo);
		
		$email = $_SESSION['email'];
		$ipaddress=$_SERVER['REMOTE_ADDR'];
		$sql = "INSERT INTO contact (firstname, middlename, lastname, email, mobilenumber, landlinenumber, notes, photo, ipaddress, createddate, user_email_address) " 
            . "VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$mobile_number', '$landline_number', '$notes', '$photo', '$ipaddress', NOW(), '$email')";
			//print_r($sql);die;
		if($mysqli->query($sql)){
			echo "<script type='text/javascript'>alert('Contact Added Successfully');window.open('profile.php','_self');</script>";
		}
    } else {
        foreach($errors as $error) {
            echo '<script>alert("'.$error.'");window.open("profile.php","_self");</script>';
        }

        die(); //Ensure no more processing is done
    }
}
//window.open('profile.php','_self'); window.open('profile.php','_self');
?>