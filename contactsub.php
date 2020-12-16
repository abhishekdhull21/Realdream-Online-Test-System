<?php
$name = $_POST['uname'];
$email = $_POST['email'];
$add = $_POST['address'];
$msg = $_POST['msg'];
$to      = 'abhishekdhull21@gmail.com';
$subject = 'New Message From RealDream Contact Form';

if(isset($name, $email, $add, $msg))

{

$message = "Name:  .$name. \n Email: $email \n address:  $add \n Message:
$msg ";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <rldrmcontactform@realdream.online>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
header('location:contact.php?msg=Message successfully sent');

}
else
{
    header('location:contact.php?msg=Site is unavailable Now So try after a piece of time');
}
?>