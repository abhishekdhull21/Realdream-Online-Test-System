<?php
require 'conn.php';
$usersugg = $_POST['usersugg'];

	if(!empty($_POST['sugg']))
		{
			$data = $_POST['sugg'];
			$cookie_name = "usersuggetion";
			$cookie_value = "done";
			
			 $sql = "INSERT INTO usersuggestion (`suggid`, `usersugg`) VALUES ('$data','$usersugg')";

            if (mysqli_query($conn, $sql))
            {
            	setcookie($cookie_name, $cookie_value, time() + (86400 * 5), "/"); // 86400 = 1 day
				header('Location:index.php?info=Thanks, for your priceless time ...');

			}
		
	      else
			{
				header('Location:index.php?error=Sorry, Your suggestion not stored please try again...');
			}
		}
		else
		   {
		   	  header('Location:index.php?error=Sorry, Please Select atleast One option...');
		   }	
?>