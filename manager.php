<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','meal_management');
$category;
if(!isset($_SESSION["email"])){
header("Location: registration.html");
exit(); }
/*else{
	$category=$_SESSION["category"];
			$check=strcmp($category,'student');
			if($category==0)
			{
			header("Location: student.php");	
			exit(); 
			}
}*/
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
	var signdisp='none',logindisp='none';
var myIndex = 0,str,res;
//window.onload = getName();
function orderInfo(){
	        document.getElementById("order_info_button").classList.add('active');
            //document.getElementById("order_button").classList.remove('active');
		    document.getElementById("logout_button").classList.remove('active');
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					str=xhttp.responseText;
					res=str.split("-");		
                    					
					document.getElementById("showMessage").innerHTML=res[0].concat(" is ordered ").concat(res[1]).concat(" times").concat("<br>").
					concat(res[2]).concat(" is ordered ").concat(res[3]).concat(" times").concat("<br>").
					concat(res[4]).concat(" is ordered ").concat(res[5]).concat(" times");
				}
					
			};
			xhttp.open("GET","order_info.php?",true);
			xhttp.send();
	}
	
	function student_billing(){
		xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					str=xhttp.responseText;
					document.getElementById("username").innerHTML="Hello ".concat(str);
				}
					
			};
			xhttp.open("GET","username.php?",true);
			//xhttp.send();
	}
	function logout(){
		 document.getElementById("logout_button").classList.add('active');
		  document.getElementById("order_info_button").classList.remove('active');
		xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					window.location="index.html";
					//str=xhttp.responseText;
					//document.getElementById("username").innerHTML="Hello ".concat(str);
				}
					
			};
			xhttp.open("GET","logout.php?",true);
			xhttp.send();
	}
function menuUpdate()
{
	xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
			var set1=document.getElementById("set1").value;
			var price1=document.getElementById("price1").value;
			var set2=document.getElementById("set2").value;
			var price2=document.getElementById("price2").value;
			var set3=document.getElementById("set3").value;
			var price3=document.getElementById("price3").value;
		//	document.getElementById("showMessage").innerHTML=set2;
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					//str=xhttp.responseText;
					//res=str.split("-");					
				 //
				// document.getElementById("showMessage").innerHTML=xhttp.responseText;
				 document.getElementById("showMessage").innerHTML=set2;
				}
					
			};			
			xhttp.open("POST", "menuorder.php", true);
			//xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("set1="+set1+"&price1="+price1+"&set2="+set2+"&price2="+price2+"&set3="+set3+"&price3="+price3);
		//	xhttp.open("GET","menuorder.php?",true);
			//xhttp.send();
}	
function studentInfo()
{
	xhttp = new XMLHttpRequest();
	var regNumber=document.getElementById("regNumber").value;
	var month=document.getElementById("month").value;
			xhttp.onreadystatechange=function(){
			
			
			//	document.getElementById("showMessage").innerHTML=set2;
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					str=xhttp.responseText;
					//var obj = JSON.stringify(str);
				     var obj = JSON.parse(str);
					 document.getElementById("showBill").innerHTML="Student Name is ".concat(obj.name).concat(" and bill of month ").concat(month).concat(" is ").concat(obj.cost);
					//document.getElementById("showBill").innerHTML=str;
					//res=str.split("-");						
				 //
				// document.getElementById("showMessage").innerHTML=xhttp.responseText;
				// document.getElementById("showBill").innerHTML="Student Name is ".concat(obj);
				}
					
			};			
			xhttp.open("POST", "billing_month.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("regNumber="+regNumber+"&month="+month);
		//	xhttp.open("GET","menuorder.php?",true);
			//xhttp.send();
}	
function profile()
{
	window.location="managerProfile.php";
}


</script>
<style>
body {margin: 50;background-color: #D3D3D3;}

ul.sidenav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 20%;
    background-color: #f1f1f1;
	background-color: #2F4F4F;
    position: fixed;
    height: 100%;
    overflow: auto;
}

ul.sidenav li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}
 
ul.sidenav li a.active {
    background-color: #4CAF50;
    color: white;
}

ul.sidenav li a:hover:not(.active) {
    background-color: #555;
    color: white;
}

div.content {
    margin-left: 25%;
    padding: 10px 16px;
	background-color: #D3D3D3;
   <!-- height: 1000px; -->
}

@media screen and (max-width: 900px) {
    ul.sidenav {
        width: 100%;
        height: auto;
        position: relative;
    }
    ul.sidenav li a {
        float: left;
        padding: 15px;
    }
    div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
    ul.sidenav li a {
        text-align: center;
        float: none;
    }
}
.button {
    position:relative;
    top:50%; 
    left:10%;
    margin: 0 auto;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
}
</style>
 <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
    
</head>
<body>

<ul class="sidenav">
  <li><a  id="username">Hello <?php
		echo $_SESSION["username"];
?></a></li>
<!--  <li><a class="active" href="javascript:showStyle()">Menu Create</a></li>-->
<li><a href="javascript:profile()" id="profile">My Profile</a></li>
  <li><a  href="javascript:orderInfo()" id="order_info_button">Order Information</a></li>
 <!-- <li><a  href="javascript:studentInfo()">Student Information</a></li> -->
  <li><a  href="javascript:logout()" id="logout_button">Logout</a></li>
</ul> 


<div class="content">
 
<h1>Create/Update FoodMenu</h1>
<div id="menucreate">
	<form action="menuorder.php" method="post"> 
	
	<div class="row1">
			<label for="Set1">Set1:</label>
			<input name="set1" id="set1" type="text" />

			<label for="Price1">Price:</label>
			<input name="price1" id="price1" type="text" /> 
	</div>
	 <div class="row2">
			<label for="Set2">Set2:</label>
			<input name="set2" id="set2" type="text" />

			<label for="Price2">Price:</label>
			<input name="price2" id="price2" type="text" /> 
	</div>

	<div class="row3">
			<label for="Set3">Set3:</label>
			<input name="set3" id="set3" type="text" />

			<label for="Price3">Price:</label>
			<input name="price3" id="price3" type="text" /> 
	</div>
	<br>
	<div class="row4">
		<button type="submit" name="update"  class="button"/>Update Menu</button>
	 </div>
	</form> 
</div>
<div id="order_info">
 <p id="showMessage"></p>
<div class="billingCheck">
			<label for="registrationNumber">RegistrationNumber:</label>
			<input name="regNumber" id="regNumber" type="text" />
			<br>
			<label for="Month">Month:</label>
			<input list="months" name="month" id="month">
  <datalist id="months">
    <option value="January">
    <option value="February">
    <option value="March">
    <option value="April">
    <option value="May">
	<option value="June">
    <option value="July">
    <option value="August">
    <option value="September">
    <option value="October">
	<option value="November">
	<option value="December">
  </datalist>
  <br>
  <div class="row5">
  <button type="submit" name="st_info" id="st_info" onclick ="studentInfo()" class="button"/>Student Bill</button>
  </div> 
  <p id="showBill"></p>
  <p id="showBill2"></p>
	</div> 
</div>
</div>

</body>
</html>
