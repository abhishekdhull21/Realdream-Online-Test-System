<?php
require'conn.php';
$id = $_POST['id'];
$qus = $_POST['qus'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$r= $_POST['r'];
$sql = " UPDATE  question SET qus ='$qus', option1 = '$a', option2 = '$b',option3 = '$c',option4 = '$d',rightans = '$r' WHERE id=$id";
   
   if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
	  header('location: admindeltepge.php');
   } else {
      echo "Error updating record: " . mysqli_error($conn);
   }

?>