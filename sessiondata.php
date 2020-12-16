<?php
include 'conn.php';
session_start();

$sid = $_SESSION['sid'];

if(!isset($sid))
{
header('location:index.html');
}


$sql = "SELECT * FROM signup where sid = '$sid'";
$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($result))
{

$name = $row['name'];

?>