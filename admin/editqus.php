<form method="post" action="qusedit.php">
	<?php
include 'conn.php';

$id = $_GET['id'];
	


	 $sqlcat = "SELECT * FROM question question WHERE id= $id";
	 $resultcat = mysqli_query($conn, $sqlcat);
		while($rowcat = mysqli_fetch_assoc($resultcat))
		{
	   $qus = $rowcat['qus'];
	   $id = $rowcat['id'];
	   $a = $rowcat['option1'];
	   $b = $rowcat['option2'];
	   $c = $rowcat['option3'];
	   $d = $rowcat['option4'];
	   $r = $rowcat['rightans'];
	   ?>
<input type="hidden" name="id" value="<?php echo $id; ?>">
Question <br />
<textarea name="qus" ><?php echo $qus; ?></textarea><br />
<br />Option a <br />
<input type="text" name="a" value="<?php echo $a; ?>" /><br />
<br />Option b <br />
<input type="text" name="b" value="<?php echo $b; ?>" /><br />
<br />Option c <br />
<input type="text" name="c" value="<?php echo $c; ?>" /><br />
<br />Option d <br />
<input type="text" name="d" value="<?php echo $d; ?>"><br />
<br />Right  <br />

<input type="number" name="r" value="<?php echo $r; ?>"><br />
<br />
	<button class="btn" type="submit" name="update"  >Change Information</button>

		</form><?php } ?>