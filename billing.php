<?php
		session_id('mySessionID');
		session_start();
		$con = mysqli_connect('localhost', 'smarthall', 'smarthall','smarthall');
		$email="";
		if(isset($_SESSION['email'])) {	
		$email=$_SESSION["email"] ;
		}
		date_default_timezone_set("Asia/Dhaka");
		$date = date("Y-m-d");
		$ym=substr($date,0,8);
		$sql="SELECT Cost FROM foodorder where Email='$email' AND date like '".$ym."%';";
		$result = $con->query($sql);
		
		$output=0;
		
		while($row = $result->fetch_assoc()){
		 $output=$output+$row["Cost"] ;
		}
		echo $output;
?>