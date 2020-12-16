<?php
include 'conn.php';
$name =$_GET['name'];
$number =$_GET['number'];
$email =$_GET['email'];
$password =$_GET['password'];
$address =$_GET['address'];
$to      = $email;
$subject = 'RealDream';
 


//$to = "somebody@example.com, somebodyelse@example.com";
//$subject = "HTML email";

$message = "
<html>
<head>
<title>RealDream Registration</title>
</head>
<body>
<h5>Hii, $name<h5>
<p>This email send you because you Signup on the <b>RealDream</b> website.<br />
We are glad to tell you that we serve our every service absolutely free for you.
</p>
<p>Take advantage of the free service now by visiting our website.</p><br>
<a href='realdream.online/login.php'><button>Login Now</button></a><br><br>
If you are facing any problems with visiting the button, then you can paste this <b> realdream.online/login.php </b> url on your browser search box.<br>
<hr>
<p>
Thank You<br>
Team <b>RealDream</b>
</p>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <askon@realdream.online>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

$check = "SELECT * FROM signup where mobile = $number or email = '$email'";
  $result = mysqli_query($conn, $check);

         if (mysqli_num_rows($result) > 0) 
		 {
		 	
		 	header('Location:signup.php?error=error: Mobile or E-mail address already used');
		 }
		 else
		 {
 			$sql = "INSERT INTO signup(`name`, `mobile`, `email`, `password`, `address`) VALUES ('$name',$number,'$email','$password','$address')";

            if (mysqli_query($conn, $sql))
             {
               header('Location:login.php?noti=Successfully regitration please login');
               mail($to, $subject, $message, $headers);
             }
             else
              {
              	
              	header('Location:signup.php?error=Regitration failed please check all field and try again');
               }
		}	

?>