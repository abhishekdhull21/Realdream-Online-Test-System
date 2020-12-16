<?php
include 'conn.php';
$mail = $_POST['email'];
ECHO $mail;

$sql = "SELECT * FROM signup where email = .'$mail'";

$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($result))
{

$number = $row['mobile'];
$email = $row['email'];

$pass = $row['password'];
echo $pass;
}


?>