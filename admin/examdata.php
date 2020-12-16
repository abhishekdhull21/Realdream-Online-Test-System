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
<br> <form action="checkrecord.php" >
   <label for="title">Select Student:</label><br /><br />
                <select name="sid" class="form-control">
		     <option value="">--- Select Name ---</option>
					
				<?php
				require'conn.php';
				$sqlcat = "	SELECT * FROM signup";
				 
				 $resultcat = mysqli_query($conn, $sqlcat);
					while($rowcat = mysqli_fetch_assoc($resultcat))
					{
				   $name = $rowcat['name'];
				   $sid = $rowcat['sid'];
				  
				 ?>
							  
					
					<option value="<?php echo $sid; ?>" ><?php echo $name; ?></option><?php } ?>
					</select>
					<input type="submit" value="Check Record" />
			  </form>
			  </body>
			  </html>