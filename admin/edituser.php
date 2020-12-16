<form method="post" action="useredit.php">
	<?php
include 'conn.php';

$sid = $_GET['userid'];
	


	 $sqlcat = "SELECT * FROM signup where sid = $sid";
	 $resultcat = mysqli_query($conn, $sqlcat);
		while($rowcat = mysqli_fetch_assoc($resultcat))
		{
	   $name = $rowcat['name'];
	   $sid = $rowcat['sid'];
	   $mobile = $rowcat['mobile'];
	   $email = $rowcat['email'];
	   $add = $rowcat['address'];
	   ?>
<input type="hidden" name="sid" value="<?php echo $sid; ?>">
Name <br />
<input type="text" name="name" value="<?php echo $name; ?>"><br />
<br />Mobile <br />
<input type="number" name="mobile" value="<?php echo $mobile; ?>"><br />
<br />E-mail <br />
<input type="email" name="email" value="<?php echo $email; ?>"><br />
<br />address <br />
<input type="text" name="address" value="<?php echo $add; ?>"><br />
<br />
	<button class="btn" type="submit" name="update"  >Change Information</button>

		</form><?php } ?>