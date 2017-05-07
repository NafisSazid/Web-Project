<?php
		session_id('mySessionID');
		session_start();
		//if(isset($_POST['order'])){
		//$conn = mysql_connect('localhost', 'root', '');
		//$db   = mysql_select_db('smarthall');
		$conn = mysql_connect('localhost', 'smarthall', 'smarthall');
		$db   = mysql_select_db('smarthall');
		$email="";
		if(isset($_SESSION['email'])) {	
		$email=$_SESSION["email"] ;
		}
		$set1 = $_POST["set1"];
		$price1 = $_POST["price1"];
		$set2 = $_POST["set2"];
		$price2 = $_POST["price2"];
		$set3 = $_POST["set3"];
		$price3 = $_POST["price3"];
		//if(isset($set1)&&isset($price1)&&isset($set2)&&isset($price2)&&isset($set3)&&isset($price3)){
		$sql = "UPDATE menu SET set1='$set1', price1=$price1, set2='$set2', price2=$price2, set3='$set3', price3=$price3 WHERE id=1";
		//echo "updated";
			if(mysql_query($sql)==TRUE){
					header("Location: manager.php"); 
					echo "updated";
			}
		//}
		//}
?>