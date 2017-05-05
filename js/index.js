$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
function login(){
var str;
	       xhttp = new XMLHttpRequest();
	var email=document.getElementById("email").value;
	var password=document.getElementById("password").value;
	var flag;
			xhttp.onreadystatechange=function(){
			console.log(this.readyState+" "+this.status+" "+xhttp.responseText);
				if(this.readyState==4 && this.status==200){
					var str=xhttp.responseText;
					str=str.toString();
					var str2='s';
					var str3="m";
					var str4="f";
					var n=str2.localeCompare(str);
					var n2=str3.localeCompare(str);
					var n3=str4.localeCompare(str);
					document.getElementById("showError").innerHTML=str;
					document.getElementById("showError2").innerHTML=str2;
					//document.getElementById("showError3").innerHTML=n3;
					if(str==str2)
					{
						flag++;
						document.getElementById("showError3").innerHTML=flag;
					  window.location="student.php";
					 }
					 else if(str.charAt(0)==str3.charAt(0))
					{
					  window.location="manager.php";
					 }
					 else if(str.charAt(0)==str4.charAt(0))
					 {
						document.getElementById("showError").innerHTML="Incorrect email or password";
					 }
					 //document.getElementById("showError").innerHTML="Incorrect email or password";
					// document.getElementById("showError").innerHTML=str;
				}
					
			};			
			xhttp.open("POST", "login.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("email="+email+"&password="+password);
		
	}
var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}