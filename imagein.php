<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>RealDream Photu GhaR</title>
</head>
<body>
<?php
if(!empty($_GET['noti']))
{
    echo $_GET['noti'];
}
?>
	<div>
	<form method="POST" action="saveimage.php" enctype="multipart/form-data">
	<label>Image:</label><input type="file" name="image">
	<button type="submit">Upload</button>
	</form>
	</div><br />
	<a href="index.php" >Home</a>
</body>
</html>