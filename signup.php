
<?php
	  session_start();
	  if(isset($_POST['signup'])){
		$conn = mysql_connect('localhost', 'smarthall', 'smarthall');
		$db   = mysql_select_db('smarthall');
		$name = $_POST["name"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$regNumber = $_POST["regNumber"];
		$department = $_POST["department"];
		$hash1 = md5( rand(1000,10000));
		
		if(isset($name)&&isset($password)&&isset($email)&&isset($regNumber)&&isset($department)){
			$sql="SELECT * FROM student_account where Email='$email'";
			$result=mysql_query($sql);	
		    $count=mysql_num_rows($result);
			if($count==0)
			{
			$sql = "INSERT INTO student_account VALUES('$name','$department','$regNumber','$email','$password','student');";
			if(mysql_query($sql)===TRUE){
				//include "showUser.html";
			//	echo "<h1>Sign Up Succesfull</h1>";
				$_SESSION["email"] = $email;
				$_SESSION["regNumber"] = $regNumber;
				$_SESSION["username"] = $name;
				header("Location: student.php"); 
				sendVerificationBySwift($email,$name,$hash1);
				
			}else{
				echo "<script>
				alert('insertion failed');
				window.location.href='registration.html';
				</script>";
			}
			}
			else
			{
				echo "<script>
				alert('email already exists');
				window.location.href='registration.html';
				</script>";
			}
			
		}
	  }
	  
	 function sendVerificationBySwift($email,$name,$id)
{
    require_once 'lib/swift_required.php';

    $subject = 'Hall Management Signup | Verification'; // Give the email a subject
   // $address="http://csedu.cf/smarthall/mail_verify?email".$email."&hash=".$id;
    $body = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials.
 
------------------------
email: '.$email.'
password: '.$password'
------------------------
 
Please click this link to activate your account:.
 '.$address;

        $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('smarthall.du@gmail.com')
            ->setPassword('smarthall')
            ->setEncryption('ssl');

        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance($subject)
            ->setFrom(array('noreply@smarthall.du.com' => 'smarthall'))
            ->setTo(array($email))
            ->setBody($body);

        $result = $mailer->send($message);
}
	  
?>




























