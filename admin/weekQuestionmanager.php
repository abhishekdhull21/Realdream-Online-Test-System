<?php
include 'conn.php';
session_start();

$sid = $_SESSION['sid'];
if(!isset($sid))
{
  header('location:index.php');
}
require 'navbar.php';
?><br>
<form method="post">
 <label>Exam Type</label> <br>
 <select name="type">
   <option value="question">Short Test</option>
   <option value="weektest">Long Test</option>
 </select>
 <br><br>
 <label>Exam Code</label><br>
 <input type="text" name="code"><br><br>
 <input type="submit" name="submit" value="submit" ><br><br>
</form>
<?php
  if (isset($_POST['submit'])) {
  
   
    if ($_POST['type'] == 'weektest') {

      $val = "weektest where examName = '$_POST[code]' ";
      
    }
    else if ($_POST['type'] == 'question') {
      $val = "question where examcode = '$_POST[code]' ";
    }
 
?>
	<table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
				 <th>action</th>
                
                <th>Question</th>
               
                
            </tr>
			  </thead>
        <tbody>
	<?php
	 $sqlcat = "SELECT * FROM $val";
	 $resultcat = mysqli_query($conn, $sqlcat);
		while($rowcat = mysqli_fetch_assoc($resultcat))
		{
	   $qus = $rowcat['qus'];
	   $id = $rowcat['id'];
	  echo "
				
                
            
      
            <tr>
                
                                <td><a href='weekQuestionEditor.php?id=".$id."&type=".$_POST['type']."'><button type='button'>Edit</button></a>

				<td>".$id."</td>
                <td>".$qus."</td> 
                
				</td> 
			</tr>";
		}
  }
		?>
				  
	</tbody>
    </table>	
									
	</body>
	</html>
