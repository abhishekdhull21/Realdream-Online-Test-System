<?php
	include('conn.php');
	$fileinfo=PATHINFO($_FILES["image"]["name"]);
	$newFilename=$fileinfo['filename'] .".". $fileinfo['extension'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"image/" . $newFilename);
	$location="image/" . $newFilename;
 
	mysqli_query($con,"insert into image_tb (img_location) values ('$location')");
	header('location:imagein.php?noti= successfully saved');
?>