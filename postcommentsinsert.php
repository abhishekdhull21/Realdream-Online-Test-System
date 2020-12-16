
			<?php       
			            ob_start();
						require 'conn.php';
						session_start();
						$pid = $_POST['pid'];
						$cname = $_POST['name'];
						$email = $_POST['email'];
						$comments = $_POST['comment'];
						
					    $to = "abhishekdhull21@gmail.com,tcsahil4@gmail.com";
                        
                        $message = "
                        <html>
                        <head>
                        <title>New Comment on post-id .$pid.</title>
                        </head>
                        <body>
                        <p>
                        Comment : $comments<br>
                        Name: $cname<br>
                        Email: $email<br>
                        Post: https://realdream.online/postreader.php?postid=$pid
                        
                        Post id : $pid
                        
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


						 $sql = "INSERT INTO `postcomments` (`cname`, `email`,`pid`, `comments`) VALUES('$cname','$email', $pid,'$comments')";


            if (mysqli_query($conn, $sql))
			{
			mail($to, $subject, $message, $headers);
           // header('location: postreader.php');
            echo "<script type='text/javascript'>window.location.href = 'postreader.php?postid=".$pid."';</script>";
			} 
			else 
			{
				echo "Comment Not store". mysqli_error($conn);
			}
			?>