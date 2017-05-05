<?php
		session_id('mySessionID');
		session_start();
		$con = mysqli_connect('localhost', 'root', '','meal_management');
		$email="";
		$m="00";
		$regNumber=$_POST['regNumber'];
		$month = $_POST['month'];
		
		if(strcasecmp($month,'January')==0)
		{
			$m="01";
		}
		else if(strcasecmp($month,'February')==0)
		{
			$m="02";
		}
		else if(strcasecmp($month,'March')==0)
		{
			$m="03";
		}
		else if(strcasecmp($month,'April')==0)
		{
			$m="04";
		}
		else if(strcasecmp($month,'May')==0)
		{
			$m="05";
		}
		else if(strcasecmp($month,'June')==0)
		{
			$m="06";
		}
		else if(strcasecmp($month,'July')==0)
		{
			$m="07";
		}
		else if(strcasecmp($month,'August')==0)
		{
			$m="08";
		}
		else if(strcasecmp($month,'September')==0)
		{
			$m="09";
		}
		else if(strcasecmp($month,'October')==0)
		{
			$m="10";
		}
		else if(strcasecmp($month,'November')==0)
		{
			$m="11";
		}
		else if(strcasecmp($month,'December')==0)
		{
			$m="12";
		}
		$date = date("Y-m-d");
		$ym=substr($date,0,5);
		
		$ym.=$m;
		    $sqlemail="SELECT Email FROM student_account where RegistrationNumber='$regNumber';";
			$result =$con->query($sqlemail);
		     $row = $result->fetch_assoc();
			//if($result)
		//	{
		   // $row = $result->fetch_assoc();
			$email=$row["Email"] ; 
			//}
			$sql="SELECT Cost FROM foodorder where Email='$email' AND date like '".$ym."%';";
			
		$result = $con->query($sql);
		
		$output=0;
		
		while($row = $result->fetch_assoc()){
		 $output=$output+$row["Cost"] ;
		}
		 $sqlname="SELECT Name FROM student_account where RegistrationNumber='$regNumber';";
			$result =$con->query($sqlname);
		     $row = $result->fetch_assoc();
			 $name=$row["Name"] ; 
			 class info {
			  public $name = "";
			  public $cost  = "";
		}
			 $bill = new info();
			 $bill->name = $name;
			 $bill->cost = $output;
			 $billjson = json_encode($bill);
			 
		echo $billjson;
?>