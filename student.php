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
window.onload = menu();
var str,res,inttp1,inttp2,inttp3;
var name;

		function menu(){
			
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
			//document.getElementById("showMessage").innerHTML=str;
				if(this.readyState==4 && this.status==200){
					//document.getElementById("showMessage").innerHTML=xhttp.responseText;
					str=xhttp.responseText;
					//document.getElementById("showMessage").innerHTML=str.split('-');
					//res=document.getElementById("showMessage").innerHTML;
					res=str.split("-");
					document.getElementById("set1").innerHTML = res[0];
					document.getElementById("price1").innerHTML = res[1];
					document.getElementById("set2").innerHTML = res[2];
					document.getElementById("price2").innerHTML = res[3];
					document.getElementById("set3").innerHTML = res[4];
					document.getElementById("price3").innerHTML = res[5];
					document.getElementById("tprice1").innerHTML = "Tk. ".concat(res[1]);
					document.getElementById("tprice2").innerHTML = "Tk. ".concat(res[3]);
					document.getElementById("tprice3").innerHTML = "Tk. ".concat(res[5]);
					inttp1=res[1];
					inttp2=res[3];
					inttp3=res[5];
					//getName();
				}
					
			};
			//var value=document.getElementById("inputName").value;
			xhttp.open("GET","menuload.php?name=",true);
			xhttp.send();
			
			//str="Nafis-n";
			//parse();
		}
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
		function place(){
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function(){
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					document.getElementById("showMessage").innerHTML="Your order is placed";
				}
					
			};
			//var value=document.getElementById("inputName").value;
			var c= document.getElementById("check1").checked;
			if(document.getElementById("check1").checked)
			{
				var quantity=document.getElementById("quantity1").value;
				//xhttp.open("GET","order.php?food="+res[0]+"&quantity="+quantity,true);
				//xhttp.send();
				xhttp.open("POST", "order.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("food="+res[0]+"&quantity="+quantity+"&cost="+inttp1);
				//xhttp.open("GET","order.php?quantity="+res[0]+"quantity="+quantity,true);
			//	xhttp.send();
			}
			if(document.getElementById("check2").checked)
			{
				var quantity=document.getElementById("quantity2").value;
				//xhttp.open("GET","order.php?food="+res[0]+"&quantity="+quantity,true);
				//xhttp.send();
				xhttp.open("POST", "order.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("food="+res[2]+"&quantity="+quantity+"&cost="+inttp2);
				//xhttp.open("GET","order.php?quantity="+res[0]+"quantity="+quantity,true);
			//	xhttp.send();
			}
			if(document.getElementById("check3").checked)
			{
				var quantity=document.getElementById("quantity3").value;
				//xhttp.open("GET","order.php?food="+res[0]+"&quantity="+quantity,true);
				//xhttp.send();
				xhttp.open("POST", "order.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("food="+res[4]+"&quantity="+quantity+"&cost="+inttp3);
				//xhttp.open("GET","order.php?quantity="+res[0]+"quantity="+quantity,true);
			//	xhttp.send();
			}
			//xhttp.open("GET","order.php?food="+res[0]+"quantity="+quantity,true);
				//xhttp.send();
			//xhttp.open("GET","menuload.php?name="+value,true);
			//xhttp.send();
		}
		function increment1()
		{
			var element=document.getElementById("quantity1").value;
			var intEl=parseInt(element);
			intEl++;
			document.getElementById("quantity1").value = intEl.toString();
			var element2=document.getElementById("price1").innerHTML;
			/*var inttp2=parseInt(element2);
			inttp2=intEl*inttp2;
			document.getElementById("tprice1").innerHTML="Tk. ".concat(inttp2.toString());*/
		    inttp1=parseInt(element2);
			inttp1=intEl*inttp1;
			document.getElementById("tprice1").innerHTML="Tk. ".concat(inttp1.toString());
			
		}
		function increment2()
		{
			var element=document.getElementById("quantity2").value;
			var intEl=parseInt(element);
			intEl++;
			document.getElementById("quantity2").value = intEl.toString();
			var element2=document.getElementById("price2").innerHTML;
			 inttp2=parseInt(element2);
			inttp2=intEl*inttp2;
			document.getElementById("tprice2").innerHTML="Tk. ".concat(inttp2.toString());
			
		}
		function increment3()
		{
			var element=document.getElementById("quantity3").value;
			var intEl=parseInt(element);
			intEl++;
			document.getElementById("quantity3").value = intEl.toString();	
			var element2=document.getElementById("price3").innerHTML;
			/*var inttp2=parseInt(element2);
			inttp2=intEl*inttp2;
			document.getElementById("tprice3").innerHTML="Tk. ".concat(inttp2.toString());*/
			inttp3=parseInt(element2);
			inttp3=intEl*inttp3;
			document.getElementById("tprice3").innerHTML="Tk. ".concat(inttp3.toString());
		}
		function decrement1()
		{
			var element=document.getElementById("quantity1").value;
			var intEl=parseInt(element);
			intEl--;
			if(intEl<0)
				intEl=0;
			document.getElementById("quantity1").value = intEl.toString();
			var element2=document.getElementById("price1").innerHTML;
			/*var inttp2=parseInt(element2);
			inttp2=intEl*inttp2;
			document.getElementById("tprice1").innerHTML="Tk. ".concat(inttp2.toString());*/
			 inttp1=parseInt(element2);
			inttp1=intEl*inttp1;
			document.getElementById("tprice1").innerHTML="Tk. ".concat(inttp1.toString());
			
		}
		function decrement2()
		{
			var element=document.getElementById("quantity2").value;
			var intEl=parseInt(element);
			intEl--;
			if(intEl<0)
				intEl=0;
			document.getElementById("quantity2").value = intEl.toString();
			var element2=document.getElementById("price2").innerHTML;
			inttp2=parseInt(element2);
			inttp2=intEl*inttp2;
			document.getElementById("tprice2").innerHTML="Tk. ".concat(inttp2.toString());
			
		}
		function decrement3()
		{
			var element=document.getElementById("quantity3").value;
			var intEl=parseInt(element);
			intEl--;
			if(intEl<0)
				intEl=0;
			document.getElementById("quantity3").value = intEl.toString();	
			var element2=document.getElementById("price3").innerHTML;
		/*	var inttp2=parseInt(element2);
			inttp2=intEl*inttp2;
			document.getElementById("tprice3").innerHTML="Tk. ".concat(inttp2.toString());*/
		    inttp3=parseInt(element2);
			inttp3=intEl*inttp3;
			document.getElementById("tprice3").innerHTML="Tk. ".concat(inttp3.toString());
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
	function profile()
	{
		window.location="studentProfile.php";
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
    left:30%;
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
<body onload="menu()">

<ul class="sidenav">
	<li><a  id="username" >Hello <?php
		echo $_SESSION["username"];
?></a></li>
  <!--<li><a class="active" href="#home" id="order_button">Order food</a></li>-->
  <li><a href="javascript:profile()" id="profile">My Profile</a></li>
  <li><a href="javascript:billing()" id="bill_button">Billing</a></li>
   <li><a href="javascript:logout()" id="logout_button">Logout</a></li>
</ul> 
<div class="content">
 <!--<h2>Menu List</h2>
  <ul >
  <li><a  href="">Rice with Chicken...............50/-</a></li>
  <li><a href="">Rice with Beef...................50/-</a></li>
  <li><a href="">Rice with Rui Fish...............50/-</a></li>
</ul> -->
<div style="overflow-x:auto;">
<table style="width:80%">
  <tr>
    <th>Item Name</th>
    <th>Price</th> 
	<th>Quantity</th> 
	<th>Total</th> 
  </tr>
  <tr>
    <td id="set1"></td>
    <td id="price1"></td>
	<td> <button id="minus1" onclick ="decrement1()">-</button><input name="quantity1" id="quantity1" type="text" value="1"/><button id="plus1" onclick ="increment1()">+</button></td>
	<td id="tprice1"></td>
	<td> <input type="radio" name="check" id="check1" value="checked1"> </td>
  </tr>
  <tr>
    <td id="set2"></td>
    <td id="price2"></td>
	<td> <button id="minus2" onclick ="decrement2()">-</button><input name="quantity2" id="quantity2" type="text" value="1"/><button id="plus2" onclick ="increment2()">+</button></td>
	<td id="tprice2"></td>
	<td> <input type="radio" name="check" id="check2" value="checked2"> </td>
  </tr>
  <tr>
    <td id="set3"></td>
    <td id="price3"></td>
	<td> <button id="minus3" onclick ="decrement3()">-</button><input name="quantity3" id="quantity3" type="text" value="1"/><button id="plus3" onclick ="increment3()">+</button></td>
	<td id="tprice3"></td>
	<td> <input type="radio" name="check" id="check3" value="checked3"> </td>
  </tr>
</table>
</div>
<button class="button" id="place" onclick ="place()" >Place Order</button>

 <p id="showMessage"></p>
 <p id="bill"></p>
</div>
<div class="place">
<!--<button class="button" id="place" >Place Order</button>-->
</div>
</body>
</html>
