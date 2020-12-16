<?php  
//include 'termnprivicy.html'; 
session_start(); 
session_destroy();
$cookie_name = "studentid";
setcookie('studentid', null, -1, '/');
unset($_COOKIE['studentid']);

setcookie("studentid", "", time() - 3600);
unset($_COOKIE['studentid']);

//echo "log out Successful";
header("location:index.php?error=you have successfully logout..."); 
exit();
?>