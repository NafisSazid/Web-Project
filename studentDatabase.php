<?php
session_id('mySessionID');	
session_start();
$con = mysqli_connect('localhost', 'smarthall', 'smarthall','smarthall');
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
window.onload = databaseShow();
function databaseShow()
{
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
			//document.getElementById("showMessage").innerHTML=str;
				if(this.readyState==4 && this.status==200){
					//document.getElementById("showMessage").innerHTML=xhttp.responseText;
					str=xhttp.responseText;
					document.getElementById("studentDatabase").innerHTML=str;
				}			
			};
			xhttp.open("GET","database_fetch.php?",true);
			xhttp.send();
}
function userMain()
{
	window.location="manager.php";
	
}
function profile()
{
	window.location="managerProfile.php";
}
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
                    					
					document.getElementById("showOrderInfo").innerHTML=res[0].concat(" is ordered ").concat(res[1]).concat(" times").concat("<br>").
					concat(res[2]).concat(" is ordered ").concat(res[3]).concat(" times").concat("<br>").
					concat(res[4]).concat(" is ordered ").concat(res[5]).concat(" times");
				}
					
			};
			xhttp.open("GET","order_info.php?",true);
			xhttp.send();
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
  <li><a  href="javascript:userMain()" id="username">Hello <?php
		echo $_SESSION["username"];
?>  </a></li>
<!--  <li><a class="active" href="javascript:showStyle()">Menu Create</a></li>-->
<li><a href="javascript:profile()" id="profile">My Profile</a></li>
  <li><a  href="javascript:orderInfo()" id="order_info_button">Order Information</a></li>
  <li><a  href="javascript:studentDatabase()" id="student_database_button">Student Database</a></li>
 <!-- <li><a  href="javascript:studentInfo()">Student Information</a></li> -->
  <li><a  href="javascript:logout()" id="logout_button">Logout</a></li>
</ul> 
<div class="content">
 <div style="overflow-x:auto;">
<table style="width:80%" id="studentDatabase">
</table>
<div>
<p id="showOrderInfo"></p>
</div>

</body>
</html>
