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
	<table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
				 <th>action</th>
                <th>id</th>
                <th>Question</th>
               
                
            </tr>
			  </thead>
        <tbody>
	<?php
	 $sqlcat = "SELECT * FROM question order by testno desc";
	 $resultcat = mysqli_query($conn, $sqlcat);
		while($rowcat = mysqli_fetch_assoc($resultcat))
		{
	   $qus = $rowcat['qus'];
	   $id = $rowcat['id'];
	  echo "
				
                
            
      
            <tr>
                <td><a href='remove.php?id=".$id."'><button type='button'>Remove</button></a>
                                <td><a href='editqus.php?id=".$id."'><button type='button'>Edit</button></a>

				<td>".$id."</td>
                <td>".$qus."</td> 
                
				</td> 
			</tr>";
		}
		?>
				  
	</tbody>
    </table>	
									
	</body>
	</html>
