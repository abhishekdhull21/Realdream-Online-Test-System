<?php
include 'conn.php';
session_start();

$sid = $_SESSION['sid'];
$name = $_GET['name'];
	
		$sql = "UPDATE signup SET name='$name'  where sid = '$sid'";
         
			if (mysqli_query($conn, $sql)) {
				header('location:user.php');
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}




            

?>