<?php
require_once 'config.php';
// Initialize the session
session_start();

//log
$userinfo = (object)$_SESSION['userinfo'];
logger($userinfo->email,"logged out","");

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index.php");
exit;
?>