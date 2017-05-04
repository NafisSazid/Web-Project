<?php

session_id('mySessionID');
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: registration.html"); // Redirecting To Home Page
}
?>