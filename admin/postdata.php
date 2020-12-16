
 
	<?php
		require 'navbar.php';
		

		$sid = $_SESSION['sid'];
		if(!isset($sid))
		{
			//echo "string";
		  header('location:index.php');
		}
	?>

	<br><br>
	<table id="myTable" class="table table-striped" >
		<thead>
			<tr>
				<td>Post Heading</td>
				<td>Post Author</td>
				<td>Post View</td>
				<td>Edit</td>
			</tr>
		</thead>	
		<tbody>
				<tr>
<?php
	$sql = "SELECT * from post,admin where post.author_id = admin.id order by post.pid desc";
	$result = $select->select($sql);
	if ($result) {
		foreach ($result as  $value) {
		$heading =	$value['heading'];
		$author =	$value['name'];
		$counter =	$value['counter'];
		$pid =	$value['pid'];
		
			
	echo 	'
					<td>'.$heading.'&nbsp;&nbsp;<a href="..\postreader.php?src=admin20%editor20%page&postid='.$pid.' " target="_blank" ><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
					<td><i class="fa fa-user" aria-hidden="true"></i> &nbsp;'.$author.'</td>
					<td><i class="fa fa-eye" aria-hidden="true"></i> &nbsp;'.$counter.'</td>
					<td><a href = "posteditor.php?src=admin&editor = '.$sid.'&pid='.$pid.'" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
				</tr>';
		}
	}
?>

		</tbody>
	</table>
</body>
</html>