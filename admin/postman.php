<?php
	require("conn.php");
	session_start();
$h1        = $_POST['h1'];
$post      = $_POST['postdata'];
$icon      = $_POST['icon'];
$author_id = $_POST['author'];


 $sql = "INSERT INTO `post` (`heading`, `content`,`icon`,`author_id`) VALUES('$h1', '$post','$icon',$author_id)";


            if (mysqli_query($conn, $sql))
			{
			//	echo "Posted Successfully";
			header('location:poster.php?msg=sucessfully Published...');
			} 
			else 
			{
				echo "Comment Not store". mysqli_error($conn);
			}


mysqli_close($conn);
?>