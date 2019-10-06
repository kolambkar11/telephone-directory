<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
echo "<script>alert('Logout successful!');window.open('index.php','_self');</script>";
?>