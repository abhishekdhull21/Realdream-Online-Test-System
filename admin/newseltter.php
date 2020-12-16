<?php
include 'conn.php';
//$to      = $email;
$subject = 'RealDream Wishing You';
 


//$to = "somebody@example.com, somebodyelse@example.com";
//$subject = "HTML email";

$message = "
<html>
<head>
<title>RealDream</title>
</head>
<body>
<img src='https://realdream.online/admin/image/15.jpg' ><br>
Celebrate the free spirit of India.
May this Independence Day Fills your life happiness and prosperity.
<br><h3 style='color:orange;'>Happy</h3><h1 style='color:white;text-shadow: 2px 2px #ff8533;'> Independence</h1><h2 style='color:green;'> Day<h2><br>
<hr>
<a href='realdream.online/login.php'><button>Login Now</button></a>
<p>
Thank You<br>
Team <b>RealDream</b>
</p>

</body>
</html>
";
  	 $sql= "SELECT email FROM signup";
				 $result = mysqli_query($conn, $sql);
					while($row = mysqli_fetch_assoc($result))
					{
        $to = $row['email'];

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@realdream.online>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

         /* $success = mail($to, $subject, $message, $headers);
            if (!$success) {
          $errorMessage = error_get_last()['message'];
} */
           }        
               ?>