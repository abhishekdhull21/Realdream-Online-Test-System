
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
<br><br>
<table e id="myTable" class="table table-striped" >
	<thead>
		<th>Exam </th>
		<th>Title </th>
		
		<th>Status</th>
	</thead>
<tbody>
	<?php
	 include 'conn.php';
	 $sql = "SELECT * FROM weekteststatus  ORDER BY id DESC ";
	 $result = mysqli_query($conn, $sql);
		while($row = mysqli_fetch_assoc($result))
		{
	   $exam = $row['examName'];
	  
	   $status = $row['status'];
	   $title = $row['title'];
	   $id = $row['id'];


	?><tr> 
     <td><?php echo $exam; ?></td>
     <td><?php echo $title; ?></td>

     <td><?php if($status == 1)
     {
      echo "Publish"; 
     }
     else
     {
     	echo "Draft";
     }

  ?></td>

<?php } ?>  

     </tr>
</tbody>
</table>



<form action="" method="post">
<label>Test Type</label><br>
<select name="type">
	<option value="1">New Test</option>
	<option value="0">UpdateTest</option>
</select><br><br>
Exam Code<br>
<input type="text" name="exam" required /><br><br>
Exam Title<br>
<input type="text" name="title" required /><br>
<label>Time(Sec)</label><br>
<input type="number" value="420" name="time"><br>
Exam Status<br>
<select name="status" >
	<option value="1" >Publish Test</option>
	<option value="0" >Draft       </option>
</select>
<br><br>

<input type="submit" value="Submit" />
</form>

<?php
require'conn.php';
if(!empty($_POST['exam']) )
{
	$exam1 = $_POST['exam'];
	$status = $_POST['status'];
	$time = $_POST['time'];
	$type = $_POST['type'];
	$title = $_POST['title'];
	if ($type == 0) 
	 {
	 	
		$sql = ("UPDATE weekteststatus set status = '$status' where examName = '$exam1'");
		if ($conn->multi_query($sql) === TRUE)
		{
		    echo " records updated successfully";
		} 
		else
		 {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		 }
	}
	else {
		$sql = ("INSERT INTO weekteststatus (  examName,title,status,time) VALUES ( '$exam1','$title', $status,$time)");
			if ($conn->multi_query($sql) === TRUE)
		{
		    echo "New records created successfully";
		} 
		else
		 {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		 }
	}



	
}
	
?>
<br><br>
<a href="weekTestStatus.php">
 <button>Refresh</button>                                                                                                </a>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             