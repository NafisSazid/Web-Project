<?php
session_id('mySessionID');	
session_start();
$con = mysqli_connect('localhost', 'root', '','meal_management');
$category;
if(!isset($_SESSION["email"])){
header("Location: registration.html");
exit(); }
/*else{
	$category=$_SESSION["category"];
			$check=strcmp($category,'manager');
			if($category==0)
			{
			header("Location: registration.html");	
			exit(); 
			}
}*/
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type ="text/javascript">

var str,res,inttp1,inttp2,inttp3;
var name;
function billing(){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
			//document.getElementById("showMessage").innerHTML=str;
				if(this.readyState==4 && this.status==200){
					//document.getElementById("showMessage").innerHTML=xhttp.responseText;
					str=xhttp.responseText;
					document.getElementById("bill").innerHTML="Your total bill of this month is ".concat(str);
					document.getElementById("bill_button").classList.add('active');
                    document.getElementById("order_button").classList.remove('active');
					document.getElementById("logout_button").classList.remove('active');
					document.getElementById("profile").classList.remove('active');
					//res=document.getElementById("showMessage").innerHTML;
					
				}
					
			};
			//var value=document.getElementById("inputName").value;
			xhttp.open("GET","billing.php?",true);
			//xhttp.open("GET","billing_month.php?",true);
			xhttp.send();
			//str="Nafis-n";
			//parse();
		}
		function logout(){
			document.getElementById("bill_button").classList.remove('active');
           // document.getElementById("order_button").classList.remove('active');
			document.getElementById("logout_button").classList.add('active');
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
function updatePassword()
{
	xhttp = new XMLHttpRequest();
	var password=document.getElementById("password").value;
	var repassword=document.getElementById("repassword").value;
			xhttp.onreadystatechange=function(){
			
			
			//	document.getElementById("showMessage").innerHTML=set2;
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					str=xhttp.responseText;
					 document.getElementById("showMessage").innerHTML=str;				
				}
					
			};			
			xhttp.open("POST", "updatePassword.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("password="+password+"&repassword="+repassword);
}
function userMain()
{
	window.location="student.php";
	
}
		
	</script>
<style>
body {margin: 50;background-color: #D3D3D3;}
table {
    border-collapse: collapse;
    width: 100%;
}
tr:nth-child(even){background-color: #f2f2f2}
th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
	
}
th {
    background-color: #4CAF50;
    color: white;
}

tr:hover{background-color:#f5f5f5}
ul.sidenav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 20%;
    background-color: #333;
	background-color: 	#2F4F4F;
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
    height: 10000px; 
	background-color: #D3D3D3;
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
</head>
<body >

<ul class="sidenav">
	<li><a  id="username" href="javascript:userMain()">Hello <?php
		echo $_SESSION["username"];
?></a></li>
  <!--<li><a class="active" href="#home" id="order_button">Order food</a></li>-->
  <li><a href="javascript:profile()" id="profile">My Profile</a></li>
  <li><a href="javascript:billing()" id="bill_button">Billing</a></li>
   <li><a href="javascript:logout()" id="logout_button">Logout</a></li>
</ul> 
<div class="content">
 <div>
<label>
 New Password
</label>
<br>
<input type="password" name="password" id="password" required autocomplete="of"/>
<br>
<label>
 Retype Password
</label>
<br>
<input type="password" name="repassword" id="repassword" required autocomplete="of"/>
<br>
<br>
<button class="button" id="updatePass" onclick ="updatePassword()" >Update Password</button>
</div>
<p id="showMessage"></p>
<p id="bill"></p>
</div>

</body>
</html>
