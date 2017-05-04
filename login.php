
<?php
		session_id('mySessionID');
		session_start();
		//$conn = mysql_connect('localhost', 'root', '');
		//$db   = mysql_select_db('meal_management');
		$con = mysqli_connect('localhost', 'root', '','meal_management');
		$email = $_POST["email"];
		$password = $_POST["password"];
		
		$sql="SELECT * FROM student_account where Email='$email' and Password='$password'";
		
		$result=mysqli_query($con, $sql);
		
		$count=mysqli_num_rows($result);
		if($count>=1){
			echo "<h1>Succesfully Loged In</h1>";
			$_SESSION["email"] = $email;
			$sql_category="SELECT Category FROM student_account where Email='$email' and Password='$password'";
			//$sql="SELECT RegistrationNumber FROM student_account where Email='$email';";
			$result = mysqli_query($con, $sql_category);
			
		//	header("Location: student.html"); 
		    $count=mysqli_num_rows($result);
			echo $count;
			while($row = $result->fetch_assoc())
			{
				$category=$row["Category"];
			}
			$sql_name="SELECT Name FROM student_account where Email='$email' and Password='$password'";
			$result = mysqli_query($con, $sql_name);
			$row = $result->fetch_assoc();
			$name=$row["Name"];
			$_SESSION["username"] = $name;
			echo $category;
			$check=strcmp($category,'student');
		//	echo $sql;
			//$_SESSION["regNumber"]=$sql;
			if($check==0)
			{
				$_SESSION["category"] = 'student';
				//echo $_SESSION["username"];
			header("Location: student.php"); 
			}
			$check=strcmp($category,'manager');
			if($check==0)
			{	
			$_SESSION["category"] = 'manager';
			header("Location: manager.php"); 
			}
			//echo $email;
           // echo $sql;
		}
		else{
			echo "<h1>Please Sign Up</h1>";
			header("Location: registration.html"); 
		}
	  
?>