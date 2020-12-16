<?php
include 'conn.php';
session_start();

$sid = $_SESSION['sid'];
if(!isset($sid))
{
  header('location:index.php');
}
require 'navbar.php';
?>
 	<table border="solid">	
 		<tr>
 		<th>id</th>
 		<th>Date</th>
 		<th>suggestion</th>
 		<th>Other</th>
 	   </tr>
 		<?php
 		require'conn.php';
				 $sqlcat = "SELECT * FROM usersuggestion order by id desc";
				 $result = mysqli_query($conn, $sqlcat);
					while($row = mysqli_fetch_assoc($result))
					{
				   $id = $row['id'];
				   $date = $row['date'];
				   $sugg = $row['suggid'];
				   $usersugg = $row['usersugg'];

				  
				 ?>
				<tr>
					<td><?php echo $id ?></td>
					<td><?php echo $date ?></td>
					<td>
					<?php 
						if($sugg == 1)
						{
							echo " Current Affair Material";
						} 
						else if($sugg == 2)
						{
							echo "Special Current Affair Quiz";
						} 
						else if($sugg == 3)
						{
							echo " PDF Store";
						} 
						else if($sugg == 4)
						{
							echo " Long Quiz";
						} 
						else if($sugg == 5)
						{
							echo " Short Quiz";
						} 
						else
						{
							echo " Giveway Quiz";
						}

					?> 
				   </td>
					<td><?php echo $usersugg; ?></td>
				</tr> 	
 <?php } ?>
	 </table>
 