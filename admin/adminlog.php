<?php
require 'conn.php';
session_start();
$number =$_POST['mobile'];
$password =$_POST['password'];


if(isset($number,$password)){
  $sql = "SELECT * FROM admin where mobile = '$number' and password = '$password'";
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) 
		 {
            while($row = mysqli_fetch_assoc($result))
			{
               	$_SESSION['sid'] =$row['id'];
                header('Location:admin.php');
            }
         } 
		else
			{
				echo "error";
			//	header('Location:index.php?error=login failed please try again');
			}
    mysqli_close($conn);

}
?>