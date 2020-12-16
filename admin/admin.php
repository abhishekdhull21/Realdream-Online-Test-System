<?php
include 'conn.php';
session_start();

$sid = $_SESSION['sid'];
if(!isset($sid))
{
	header('location:index.php');
}
 require 'navbar.php';
if (isset($_GET['msg'])) {
	echo '<br><br><p style="color:red">'.$_GET['msg'].'</p>';
	# code...
}
?>


			<hr />
			<hr />
			
			<div class="col-md-4">
			<div class="container">
			<form action="adminpro.php">
    <div class="panel panel-default">
      <div class="panel-body">
            <div class="form-group">
          	 <label for="title">Exam Code:</label><br /><br />
                <input type="text" name="examcode" id="" placeholder="Enter Code" />
				<hr />	
				<br />
				 <label for="title">Title </label><br /><br />
                <input type="text" name="title"  placeholder="Enter exam title " required />
				<hr />	
				<br />
				 <label for="title">Time (Sec.)</label><br /><br />
                <input type="number" name="time"  placeholder="Enter Time " required />
				<hr />	
      			
				Total Question:
      			<br />
				<input type="number" name="total" id="" value="20" /><br /><br />
				<center><input type="Submit" value="Proceed" /></center>
				</form>										
					<hr />	
					<hr />	
				</div>
			</div>
			
		</div>
 </div>
</body>

</html>
