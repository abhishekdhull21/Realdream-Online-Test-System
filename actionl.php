<?php
include 'conn.php';
session_start();

$number =$_POST['mobile'];
$password =$_POST['password'];

if(isset($number,$password)){
  $sql = "SELECT * FROM signup where mobile = '$number' and password = '$password'";
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) 
		 {
            while($row = mysqli_fetch_assoc($result))
			{
               
			   $sid = $row['sid'];
			   $_SESSION['sid'] =  $sid;

			   if($sid > 0)
			   {
			   	if (isset($_GET['ref']))
			   	 {	
			   	 	$link =$_GET['ref'];
			   	 	$title =$_GET['title'];

					echo '<script>
						  window.location.href = "'.$link.'&title='.$title.'";
						</script>';
					#header('Location:');
				 }
				else{
						header('Location:sdash.php');
					}
			   }
            }
         } 
		else
			{
				//echo "error";
				header('Location:login.php?error=login failed please try again');
			}
    mysqli_close($conn);

}
?>