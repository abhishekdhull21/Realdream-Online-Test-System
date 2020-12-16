
 <form action="updateexamecode.php">
 <?php
	require'../../conn.php';
	$sql = "SELECT * FROM question where examcode = '0sscsci0008'  limit 10 ";
	$result = mysqli_query($conn, $sql);
	$i = 1;
	while($row = mysqli_fetch_assoc($result))
	{

	   $qus = $row['qus'];
	   $id = $row['id'];
	   $examcode = $row['examcode'];

            
?>
	<?php echo $i. $qus ?><br><br>
	<input type="hidden" name="<?php echo $i; ?>id" value="<?php echo $id; ?>"  /><br><br/>
	examcode<br><br>
	<input type="text" value="<?php  echo $examcode ?>" name="<?php echo $i; ?>examcode" ><br><br>

<?php 
$i++;
} 
	
?>	
<input type="submit" name="submit">
</form>