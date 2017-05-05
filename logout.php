<?php


session_id('mySessionID');
session_start();
$_SESSION["email"]="";
$_SESSION["username"]="";
session_destroy(); // Destroying All Sessions	
header("Location: index.html"); // Redirecting To Home Page

?>