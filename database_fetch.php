<?php
		session_id('mySessionID');
		session_start();
		$con = mysqli_connect('localhost', 'root', '','meal_management');
		$email="";
		if(isset($_SESSION['email'])) {	
		$email=$_SESSION["email"] ;
		}
		$sql="SELECT Name, Department, RegistrationNumber FROM student_account where category='student';";
		$result = $con->query($sql);
		$output="<table>"."<tr><th>Name</th><th>Department</th><th>RegistrationNumber</th></tr>";
		while($row = $result->fetch_assoc()){
		 //$output=$output." ".$row["Name"]." ".$row["Department"]." ".$row["RegistrationNumber"]."\n";
		 $output=$output."<tr><td>".$row["Name"]."</td>"."<td>".$row["Department"]."</td>"."<td>".$row["RegistrationNumber"]."</td>"."</tr>";
		}
		$output=$output."</table>";
		echo $output;
?>