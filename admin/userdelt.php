<?php
require'conn.php';
$sid = $_GET['userid'];
$sql = "DELETE FROM signup WHERE sid= $sid";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
	header('location: usermng.php');

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>