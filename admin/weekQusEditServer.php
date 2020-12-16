<?php
require'conn.php';
$id    = $_POST['id'];
$qus   = $_POST['qus'];
$a     = $_POST['a'];
$b     = $_POST['b'];
$c     = $_POST['c'];
$d     = $_POST['d'];
$r     = $_POST['r'];
$type  = $_POST['type'];
echo $type."v";

$sql = " UPDATE  $type SET qus ='$qus', option1 = '$a', option2 = '$b',option3 = '$c',option4 = '$d',rightans = '$r' WHERE id=$id";
   
   if (mysqli_query($conn, $sql)) {
    
	  echo' <meta http-equiv="refresh" content="0;url=weekQuestionmanager.php" />';
   } else {
      echo "Error updating record: " . mysqli_error($conn);
   }

?>