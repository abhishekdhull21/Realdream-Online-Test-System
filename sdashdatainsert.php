<?php	
	require'conn.php';
	session_start();
	
	//$gender  = $_POST['gender'];
	//$address = $_POST['address'];
	$sid 	 = $_POST['sid'];
      //$sid  = $_SESSION['sid'];
	if (isset($_POST['gender'])) {
		 $data = $_POST['gender'];
		 $var  = "gender";
	}
	else if (isset($_POST['dob'])) {
		 $data = $_POST['dob'];
		 $var  = "dob";
	}
	else if (isset($_POST['mobile'])) {
		 $data = $_POST['mobile'];
		 $var  = "mobile";
	}
	else if (isset($_POST['address'])) {
		 $data = $_POST['address'];
		 $var  = "address";
	}
	
	$sql = "update signup SET  $var = '$data' where sid = $sid";
	
	if(mysqli_query($conn, $sql)){
		$res=" Profile Successfully update";
  			echo json_encode($res);
	}
	else{
		 $error="Not Inserted,Some Probelm occur.";
  		echo json_encode($error);
	}
?>