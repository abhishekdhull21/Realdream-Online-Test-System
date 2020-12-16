<?php

session_start();


	
		include'conn.php';
	
		$n = $_GET['total'];
		$subid = $_GET['subid'];
		//$spid = $_GET['number'];
		$catid = $_SESSION['catid'];
		$_SESSION['n'] = $n;
		 $_SESSION['subid'] = $subid;
		// $_SESSION['spid'] = $spid;
		$sql = "SELECT * FROM  subpart WHERE catid = ".$catid." and subid = ".$subid."" ; 


		$result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
		$spid=$row['spid'];
		$lastspid = $spid+1;
		$_SESSION[spid] = $lastspid;
		}
		header('location:adminpro.php');
		?>	