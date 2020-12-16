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
 <table id="myTable" class="table table-striped" >
        <thead>
            <tr>
				 <th> R.id</th>
				 <th> Name</th>
				 <th>Exam Name</th>
				 <th>Total</th>
                <th>Right</th>
                <th>Avarage</th>
                <th>Time</th>
               
               
                
            </tr>
			  </thead>
        <tbody>
<?php
	 require'conn.php';
	// $sid = $_GET['sid'];
	 $sql = "SELECT * FROM sdata A, signup B WHERE A.sid = B.sid order by A.id desc limit 60";
	 $result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
		   
		   $name = $row['name'];
		   $sid = $row['sid'];
		  $tname = $row['title'];
		   $tqus = $row['totalqus'];
		   $rqus = $row['rightqus'];
		   $avg = $row['avg'];
		   $time = $row['date'];
		   $rid = $row['id'];
	  echo "
			<tr>
                <td>".$rid."</td>
                <td>".$name."</td>
                <td>".$tname."</td>
				<td>".$tqus."</td>
                <td>".$rqus."</td> 
                <td>".$avg."</td> 
                <td>".$time."</td> 
                
				 
			</tr>";
		}
		?>
				  
	</tbody>
    </table>	
									
	
			<br />		
