<?php
/* User login process, checks if user exists and password is correct */
require 'db.php';
if(isset($_POST['login_btn']))
{
// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
if ( $result->num_rows == 0 ){ // User doesn't exist
    echo "<script type='text/javascript'>alert('User with that email doesnt exist!');window.open('index.php','_self');</script>";
}
else { // User exists
    $user = $result->fetch_assoc();
    if ( password_verify($_POST['password'], $user['password']) ) {
		$email1=$user['email'];
		$fname1=$user['name'];
        session_start();
		$_SESSION['email'] = $email;
        // This is how we'll know the user is logged in
        //$_SESSION['logged_in'] = true;
		echo "<script type='text/javascript'>alert('Login Successful!');window.open('profile.php','_self');</script>";
    }
    else {
		echo "<script>alert('Invalid parameters provided for account verification! Login failed!');window.open('index.php','_self');</script>";
    }
	//window.open('login_page.php','_self');
}
}
?>