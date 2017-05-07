<?php
		session_id('mySessionID');
		session_start();
		//$conn = mysql_connect('localhost', 'root', '');
		//$db   = mysql_select_db('smarthall');
		$con = mysqli_connect('localhost', 'smarthall', 'smarthall','smarthall');
		$item = $_POST['food'];
		$quantity = $_POST['quantity'];
		$cost = $_POST['cost'];
		$regNumber="";
		$email="";
		if(isset($_SESSION['email'])) {	
		$email=$_SESSION["email"] ;
		}
		if(isset($_SESSION['regNumber'])) {
		$regNumber=$_SESSION["regNumber"] ;}
		$date = date("Y-m-d");
		//$sqlreg="SELECT RegistrationNumber FROM student_account";
		$sqlreg="SELECT RegistrationNumber FROM student_account where Email='$email'";
		$result = mysqli_query($con, $sqlreg);
		$row = $result->fetch_assoc();
		$reg=$row["RegistrationNumber"];
		//if (mysqli_query($con, $sqlreg)) {
			
			$sql = "INSERT INTO foodorder VALUES('$reg','$email','$item','$quantity','$cost','$date')";
			//$result = mysqli_query($con, $sql);
			//$result = con_query($sql);
			if(mysqli_query($con, $sql))
				echo "ordered"+$cost;
			//mysqli_query($con, $sql);
			//echo "succesfully ordered";
		//}
		//$sql = "INSERT INTO foodorder VALUES('$sqlreg','$email','$item','$quantity',0,'$date');";
		//echo $sqlreg;
		/*if(mysql_query($sql)===TRUE){
			echo "succesfully ordered";
		}
		else{
			
		}*/
?>