<?php
	require("conn.php");

        if (isset($_POST['submit'])) {


		$sid = $_POST['sid'];
		$code = $_POST['examcode'];
		$comments = $_POST['comment'];



		$to = "abhishekdhull21@gmail.com,tcsahil4@gmail.com";

		$message = "
		<html>
		<head>
		<title>New Comment on Test Section</title>
		</head>
		<body>
		<p>
		Comment  : .$comments.<br>
		
		ExamCode : $code

		<hr>
		<p>
		Thank You<br>
		Team <b>RealDream</b>
		</p>

		</body>
		</html>
		";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <askon@realdream.online>' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";


		 $sql = "INSERT INTO `comments` (`sid`, `examcode`, `comments`) VALUES($sid, '$code',  '$comments')";


            if (mysqli_query($conn, $sql))
			{
			
               mail($to, $subject, $message, $headers);
               header('location:qustionpaper.php?examcode='.$code.'');
			} 
			else 
			{
				echo "Comment Not store". mysqli_error($conn);
			}

}
mysqli_close($conn);
?>