<?php
include 'conn.php';
session_start();

$sid = $_SESSION['sid'];
$id =$_GET['id'];
// sql to delete a record
$sql = "DELETE FROM question WHERE id= $id";

if (mysqli_query($conn, $sql)) {
	header('location: admindeltepge.php');

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>