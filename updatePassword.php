<?php
		session_id('mySessionID');
		session_start();
		//if(isset($_POST['order'])){
		//$conn = mysql_connect('localhost', 'root', '');
		//$db   = mysql_select_db('smarthall');
	//	$conn = mysql_connect('localhost', 'root', '');
	//	$db   = mysql_select_db('smarthall');
		$con = mysqli_connect('localhost', 'root', '','smarthall');
		$email="";
		if(isset($_SESSION['email'])) {	
		$email=$_SESSION["email"] ;
		}
		$password = $_POST["password"];
		$repassword = $_POST["repassword"];
		if($password==$repassword)
		{	
		$sql = "UPDATE student_account SET password='$password' WHERE Email='$email';";
		$result = $con->query($sql);
		echo "updated password";
		//echo "updated";
			//if(mysql_query($sql)==TRUE){
					//header("Location: manager.php"); 
					
		//	}
		}
		else
		{
			echo "failed to update password";
		}
		//}
		//}
?>