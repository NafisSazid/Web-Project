<?php

		$con = mysqli_connect('localhost', 'root', '','smarthall');
		//$value = $_GET['name'];
		//echo $value;
		
		$sql ="select set1 from menu;";
										
		//$sql="select * from userpassword;";
		$result = $con->query($sql);
		
		$output="";
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$row["set1"] ; 
		}
		
		$sql ="select price1 from menu;";
										
		$result = $con->query($sql);
		
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$output."-".$row["price1"] ; 
		}
		
		$sql ="select set2 from menu;";
										
		$result = $con->query($sql);
		
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$output."-".$row["set2"] ; 
		}
		
		$sql ="select price2 from menu;";
										
		$result = $con->query($sql);
		
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$output."-".$row["price2"] ; 
		}
		
		$sql ="select set3 from menu;";
										
		$result = $con->query($sql);
		
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$output."-".$row["set3"] ; 
		}
		
		$sql ="select price3 from menu;";
										
		$result = $con->query($sql);
		
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$output."-".$row["price3"] ; 
		}
		echo $output;
		

?>