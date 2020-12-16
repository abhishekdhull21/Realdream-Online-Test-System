<?php
include 'conn.php';


		$catid   = $_POST['examcode'];
		$n       =  $_POST['total'];
		$time  = $_POST['time'];
		
foreach ($_POST as $key => $value) {
echo "$key = $value<br>";
}

for($i = 1;$i <= $n; $i++)
{
	
$sql = ("INSERT INTO weektest (examName, qus,option1,option2,option3,option4, rightans,explanation) VALUES ('$catid', '".$_POST[$i.'qus']."', '".$_POST[$i.'aoption']."', '".$_POST[$i.'boption']."', '".$_POST[$i.'coption']."', '".$_POST[$i.'doption']."','".$_POST[$i.'rightans']."','".$_POST[$i.'exp']."')");
/*$sql = ("INSERT INTO question ( examcode, qus,option1,option2o,option3,option4, rightans, explanation) VALUES ($catid, '".$_POST[$i.'qus']."', '".$_POST[$i.'aoption']."', '".$_POST[$i.'boption']."', '".$_POST[$i.'coption']."', '".$_POST[$i.'doption']."',".$_POST[$i.'rightans']."  )");*/




if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}	
?>
<a href="admin.php">Add More Quiz </a>