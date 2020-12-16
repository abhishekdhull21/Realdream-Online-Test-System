<?php
require 'conn.php';
$number = $_POST['number'];
$sql = "SELECT * FROM signup where mobile = $number ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result))
{

$email = $row['email'];
$pass = $row['password'];

}
$email;
$subject = 'RealDream - Password Request ';
 $to      = $email;


//$to = "somebody@example.com, somebodyelse@example.com";
//$subject = "HTML email";

$message = "
<html>
<head>
<title>RealDream Registration</title>
</head>
<body>
<p>This email send you because you request to know your password on the <b>RealDream</b> website.<br />
Password: <span style='color:blue' > .$pass. </span> <br />
Not share this with anyone for your security shake.<br />
We are glad to tell you that we serve our every service absolutely free for you.
</p>
<p>Take advantage of the free service now by visiting our website.</p><br>
<a href='realdream.online/login.php'><button>Login Now</button></a><br><br>
If you are facing any problems with visiting the button, then you can paste this <b><a href='realdream.online/login.php' > realdream.online/login.php </a></b> url on your browser search box.<br>
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
$headers .= 'From: <password@realdream.online>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
header('Location: login.php?noti=Password Sent on your registered email, Please Check your mail');
}
else
{
    header('Location: login.php?error=You entered wrong Mobile Number...');
}
?>