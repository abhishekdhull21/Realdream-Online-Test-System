<?php require 'navbar.php'; ?>
<table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
				 <th>Exam Name</th>
				 <th>Total</th>
                <th>Right</th>
                <th>Avarage</th>
               
                
            </tr>
			  </thead>
        <tbody>
<?php
	 require'conn.php';
	 $sid = $_GET['sid'];
	 $sql = "SELECT * FROM sdata A, signup B WHERE A.sid = B.sid and A.sid = $sid ";
	 $result = mysqli_query($conn, $sql);
		
		while($row = mysqli_fetch_assoc($result))
		{
		   $name = $row['name'];
		   $sid = $row['sid'];
		   $tname = $row['testname'];
		   $tqus = $row['totalqus'];
		   $rqus = $row['rightqus'];
		   $avg = $row['avg'];
		
	  echo "
			<tr>
                <td>".$tname."</td>
				<td>".$tqus."</td>
                <td>".$rqus."</td> 
                <td>".$avg."</td> 
                
				 
			</tr>";
		}
		   echo "Student Name :<b> ".$name."</b>";
		?>
				  
	</tbody>
    </table>	
									
		<a href="admin.php">Add Test </a><br />
		<a href="admindeltepge.php"><u>Delete Question</u></a><br />
		<a href="usermng.php">Manage User</a>
			<br />		
