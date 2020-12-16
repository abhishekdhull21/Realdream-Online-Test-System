<?php
require'conn.php';
$tho = $_POST['tho'];


 $sql = "INSERT INTO `thought` (`tought`) VALUES('$tho')";


            if (mysqli_query($conn, $sql))
			{
			header('location:thoughtinput.html');
			 //echo "Successfull";
			} 
			else 
			{
				echo "Comment Not store". mysqli_error($conn);
			}


mysqli_close($conn);
?>