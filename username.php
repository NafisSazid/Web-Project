<?php
		session_id('mySessionID');
		session_start();
		$con = mysqli_connect('localhost', 'smarthall', 'smarthall','smarthall');
		$username=$_SESSION["username"] ;
		//echo $username;
		echo $_SESSION["username"];
?>