<?php
require 'db.php';
session_start();
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");
    if ( $result->num_rows == 0 )
    { 
		echo "<script type='text/javascript'>alert('Account has already been activated or the URL is invalid!');window.open('index.php','_self');</script>";
    }
    else {
        $mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
        echo "<script type='text/javascript'>alert('Your account has been activated!');window.open('index.php','_self');</script>";
    }
}
else {
	echo "<script>alert('Invalid parameters provided for account verification!');</script>";
    header("location: login_page.php");
}
?>