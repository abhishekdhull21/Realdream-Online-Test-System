<?php require '../navbar.php'; ?>
<body>
<div>
	
			
		
		<label>Exam Code</label>
		<select name="examcode" id="examcode">
			<option>SELECT</option>
			<?php
				require '../conn.php';

				$sql ="SELECT * FROM academic_exam ";
				$query = mysqli_query($conn,$sql);
				while ($row=mysqli_fetch_assoc($query)) {
				echo"<option value=".$row['testcode'].">".$row['test_name']."</option>";
				}
				?>
			
				
			
		</select><br><br>
		<input type="submit" name="" onclick="fetchrecord()">
		<br>
		<hr>
		<br>
	<script> 
     
      	
        
        
             		//document.write(examcode);
                    function fetchrecord() {
                    	var examcode=$("#examcode").val();
                      $.ajax({
                        url:"fetchrecord.php",
                        method:"POST",
                        data:{
                        	exam:examcode
                        },

                        success:function(data)
                        {
                          $('#content').html(data);
                        }
                      });
                    }
                  
       
  </script>
		<div id="content"></div>
		<?php
		echo __dir__;
		echo getcwd();
		?>
</div>
</body>
