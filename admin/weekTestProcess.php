
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<title>Admin Shab</title>
	<script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
</head>
<body style="margin:80px">
	
<form method="POST" action="weekDataServer.php">
<?php
		session_start();
		
		$examcode  =  $_GET['examcode'];
		$time      =  $_GET['time'];
		$total     =  $_GET['total'];
		
		
		//$spid =  $_SESSION['spid'];
	

				       echo'<input type="hidden" name="examcode" value="'.$examcode.'" >
	                <input type="hidden" name="time" value="'.$time.'" >
	                <input type="hidden" name="total" value="'.$total.'" >';
				 
				 for( $i = 1; $i<=$total; $i++ ) {
               
         
				echo "<hr /><hr />Question".$i."<br /> <textarea name=".$i."qus ></textarea><br />";
				
				echo "Option A<br /> <input type=text name=".$i."aoption /><br />";
				echo "Option B<br /> <input type=text name=".$i."boption /><br />";
				echo "Option C<br /> <input type=text name=".$i."coption  /><br />";
				echo "Option D<br /> <input type=text name=".$i."doption /><br />";
				echo "Option right ans <br /><select name=".$i."rightans ><option value=0>A</option>
				<option value=1>B</option>
				<option value=2>C</option>
			    <option value=3>D</option>
			    </select><br />";
			    echo'<label>Explanation</label><br>
			    		<textarea name="'.$i.'exp" cols="40" rows="13" ></textarea><br>';
				echo "<script>
						CKEDITOR.replace( '".$i."exp' );
					</script>";
         }
         
         
      
?>
<br />
<input type="submit" value="Input Test" class="btn btn-info" />
</form>
</body>