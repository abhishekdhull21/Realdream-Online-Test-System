<?php
require'conn.php';
$sid = $_POST['sid'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$add = $_POST['address'];
$email = $_POST['email'];
$sql = " UPDATE signup SET name='$name', mobile = '$mobile', email ='$email', address = '$add' WHERE sid=$sid";
   
   if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
	  header('location: usermng.php');
   } else {
      echo "Error updating record: " . mysqli_error($conn);
   }

?>