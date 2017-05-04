<?php
		session_id('mySessionID');
		session_start();
		$con = mysqli_connect('localhost', 'root', '','meal_management');
		$username=$_SESSION["username"] ;
		//echo $username;
		echo $_SESSION["username"];
?>