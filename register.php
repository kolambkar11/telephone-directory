<?php
require 'db.php';
/* Registration process, inserts user info into the database and sends account confirmation email message */
// Set session variables to be used on profile.php page
// Escape all $_POST variables to protect against SQL injections
if(isset($_POST['register_btn']))
{
$fullname = $mysqli->escape_string($_POST['fullname']);
$email = $mysqli->escape_string($_POST['email']);
$contact = $mysqli->escape_string($_POST['cnum']);
$password = $mysqli->escape_string(password_hash($_POST['pass'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
$ipaddress=$_SERVER['REMOTE_ADDR'];
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['fname'] = $_POST['fullname'];
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
$result1 = $mysqli->query("SELECT * FROM users WHERE contact='$contact'") or die($mysqli->error());
// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    echo "<script type='text/javascript'>alert('Email Id Already Exits');window.open('index.php','_self');</script>";
}
else if ( $result1->num_rows > 0 ) {
    echo "<script type='text/javascript'>alert('Contact Number Already Exits');window.open('index.php','_self');</script>";
}
else { // Email doesn't already exist in a database, proceed...    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (name, email, contact, password, hash, ipaddress, createddate, status) " 
            . "VALUES ('$fullname', '$email', '$contact', '$password', '$hash', '$ipaddress', NOW(),0)";
	//print_r($sql);die;		
    // Add user to the database
    if ( $mysqli->query($sql) ){
		echo "<script type='text/javascript'>alert('Confirmation link has been sent to $email, please verify your account by clicking on the link in the message!');window.open('profile.php','_self');</script>";
        $to      = $email;
        $subject = 'Telephone Directory - Activation Link';
        $message_body = 'Dear '.$fullname.',
	Thank you for signing up for Telephone Directory

	To get started, please activate your account by clicking on the link below
	http://localhost/telephone/verify.php?email='.$email.'&hash='.$hash.'

Thanks & Regards,
VCMT - 2019';  
        mail($to, $subject, $message_body);
    }
    else {
		echo "<script type='text/javascript'>alert('Registration failed!');window.open('index.php','_self');</script>";
    }
}
}
?>