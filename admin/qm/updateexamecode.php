<!DOCTYPE html>
<html>
<head>
    <title>Update Question</title>
</head>
<body>


 <?php
 require'../../conn.php';
   if(isset($_GET['submit']))
     {
     	

        //foreach ($_POST as $key => $value)

        for($i = 1;$i <= 10; $i++)
        {	
        	$examcode = $_GET[$i.'examcode'];
        	$id = $_GET[$i.'id'];

        	echo $examcode." and ".$id."<br><br/>";
        	$sql = " UPDATE question SET examcode ='$examcode' WHERE id=$id";
		   
		   if (mysqli_query($conn, $sql)) {
		      echo "Record updated successfully";
			  
		   } 
		   else {
		     		 echo "Error updating record: " . mysqli_error($conn);
  				  }
        }
    }
?>

<a href="index.php"><button>Inse4rt More</button></a>

</body>
</html>