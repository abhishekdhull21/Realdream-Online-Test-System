<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="" >
Question Show Date <br>
<input type="text" name="qdate" required /><br><br>
Question of thje day<br>
<textarea name="qus" required ></textarea>
<br><br>
option A <br>
<input type="text" name="op1" required ><br><br>
option B <br>
<input type="text" name="op2" required ><br><br>
option C <br>
<input type="text" name="op3" required ><br><br>
option D <br>
<input type="text" name="op4" required ><br><br>
<select name="ryt" >
	<option value="1">A</option>
	<option value="2">B</option>
	<option value="3">C</option>
	<option value="4">D</option>
</select><br><br>
Explain answer<br>
<textarea name="explainans" ></textarea>
<br><br>
<input type="submit" name="submit" value="Insert" >
</form>
<?php
$date = date("d M Y");
echo $date;
require 'conn.php';
if(isset($_POST['submit'])) {
	# code...
$qus = $_POST['qus'];
$op1 = $_POST['op1'];
$op2 = $_POST['op2'];
$op3 = $_POST['op3'];
$op4 = $_POST['op4'];
$ryt = $_POST['ryt'];
$explainqus = $_POST['explainans'];
$date = $_POST['qdate'];

//echo $date;
$sql = "INSERT INTO qofday (qus, op1, op2, op3, op4, ryt, explainqus, date) VALUES ('$qus', '$op1', '$op2', '$op3', '$op4', '$ryt', '$explainqus','$date')";
if(mysqli_query($conn, $sql))
{
	echo "Data Inserted Successfully";
}
else
{
	echo "Data Not Inserted Successfully";
}
}
?>
</body>
</html>