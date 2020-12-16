<table>
	<thead>
		<th>Sn</th>
		<th>Name</th>
		<th>Per %</th>
		<th>Right</th>
		<th>Total</th>
		<th>Info</th>
	</thead>

<?php
	require '../conn.php';
	$examcode= $_POST['exam'];
	echo $examcode;
	$sql ="SELECT * FROM sdata a,signup b  where a.sid = b.sid and a.dexamcode = '$examcode' order by a.avg desc";
	$i =1;
	$query = mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($query)) {
?>
<tbody>
	<td><?php echo $i; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['avg']; ?></td>
	<td><?php echo $row['rightqus']; ?></td>
	<td><?php echo $row['totalqus']; ?></td>
	<td>hello</td>
</tbody>
	<?php $i++; } ?>

</table>
