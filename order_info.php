<?php
		session_id('mySessionID');
		session_start();
		$con = mysqli_connect('localhost', 'root', '','meal_management');
	//	$set1 = $_POST['set1'];
	//	$set2 = $_POST['set2'];
		//$set3 = $_POST['set3'];
		$date = date("Y-m-d");
		
		$sql ="select set1 from menu;";
		$result = $con->query($sql);
		$output="";
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$row["set1"] ; 
		}
		$set1=$output;
		
		$sql ="select set2 from menu;";
		$result = $con->query($sql);
		$output="";
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$row["set2"] ; 
		}
		$set2=$output;
		
		$sql ="select set3 from menu;";
		$result = $con->query($sql);
		$output="";
		if($result)
		{
			$row = $result->fetch_assoc();
			$output=$row["set3"] ; 
		}
		$set3=$output;
		
		$sql="SELECT Quantity FROM foodorder WHERE FoodItem='$set1' AND date='$date' ";
		$result = $con->query($sql);
		$output1=0;
		$count=0;
		if($result)
		{
			while($row = $result->fetch_assoc()){
			//$row = $result->fetch_assoc();
			$count++;
			$output1=$output1+$row["Quantity"] ;
		    }
		}
		$sql="SELECT Quantity FROM foodorder WHERE FoodItem='$set2' AND date='$date' ";
		$result = $con->query($sql);
		$output2=0;
		if($result)
		{
			while($row = $result->fetch_assoc()){
			//$row = $result->fetch_assoc();
			$count++;
			$output2=$output2+$row["Quantity"] ;
		    }
		}
		$sql="SELECT Quantity FROM foodorder WHERE FoodItem='$set3' AND date='$date' ";
		$result = $con->query($sql);
		$output3=0;
		if($result)
		{
			while($row = $result->fetch_assoc()){
			//$row = $result->fetch_assoc();
			$count++;
			$output3=$output3+$row["Quantity"] ;
		    }
		}
		echo $set1."-".$output1."-".$set2."-".$output2."-".$set3."-".$output3 ; 
		//echo $output;
?>