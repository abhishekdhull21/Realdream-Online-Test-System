 
	<?php
		require 'navbar.php';
		

		$sid = $_SESSION['sid'];
		if(!isset($sid))
		{
			//echo "string";
		  header('location:index.php');
		}
	?>	

    <table id="myTable" class="table table-striped" >
        <thead>
            <tr>
				<th>SN</th>
                <th>Student Id</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>address</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
			  </thead>
        <tbody>
	<?php
include 'conn.php';
session_start();

$sidd = $_SESSION['sid'];
if(!isset($sidd))
{
	header('location:index.php');
}
	


	 $sqlcat = "SELECT * FROM signup order by sid";
	 $resultcat = mysqli_query($conn, $sqlcat);
	 $i = 1;
		while($rowcat = mysqli_fetch_assoc($resultcat))
		{
	   $name = $rowcat['name'];
	   $sid = $rowcat['sid'];
	   $mobile = $rowcat['mobile'];
	   $email = $rowcat['email'];
	   $add = $rowcat['address'];
	  echo "
				
                
            
      
            <tr>
                <td>".$i."</td>
				<td>".$sid."</td>
                <td>".$name."</td>
				<td>".$mobile."</td>
                <td>".$email."</td> 
                <td>".$add."</td> 
				 
				<td><a href='edituser.php?userid=".$sid."'><button>Edit User</button></a></td> 
				<td><a href='userdelt.php?userid=".$sid."'><button>Delete ID</button></a></td> 
				
				</tr>";
				$i++;
		}
		?>
				  
	</tbody>
    </table>	
									
	</body>
	</html>
