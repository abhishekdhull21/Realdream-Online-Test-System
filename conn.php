<?php
$conn = mysqli_connect ("localhost","root","","realdream");
mysqli_set_charset($conn, 'utf8');

if (mysqli_connect_error($conn))
{
	echo "connection failed";
}



?>