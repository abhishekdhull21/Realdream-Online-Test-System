<?php
$conn = mysqli_connect ("localhost","root","","realdream");
if (mysqli_connect_error($conn))
{
	echo "connection failed";
}

define('ROOT', __DIR__ .'/');

?>