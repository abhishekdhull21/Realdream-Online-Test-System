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
			
			<div class="col-md-4">
			<div class="container">
			<form action="weekTestProcess.php">
    <div class="panel panel-default">
      <div class="panel-body">
            <div class="form-group">
          
				 <label for="title">Enter Test Name(Examcode):</label><br /><br />
                <input type="text" name="examcode" id="" placeholder="Enter Exam Code" />
				<hr />	
			
      			
				Total Question:
      			<br />
				<input type="number" name="total" id="" value="10" /><br /><br />
			
				<center><input type="submit" value="Write Now" /></center>
				</form>										
					<hr />	
					<hr />	
				</div>
			</div>
		
		</div>
 </div>
</body>

</html>
