 <?php 
 	require 'navbar.php';
 			$pid = $_GET['pid'];
  			$heading = $_POST['heading'];
			$icon = $_POST['icon'];
			$post = $_POST['post'];
			$redirect = '<meta http-equiv="refresh" content="0;url=postdata.php" />';
  			$sql ="UPDATE post SET heading = '$heading', icon = '$icon' ,content = '$post' where pid = $pid ";
  			$result = $select->update($sql,$redirect);
  ?>
  <body><form method="post" action="" >
  	<?php 
  		
  		$sql = "SELECT * from post where pid = $pid";
  		$result = $select->select($sql);
  		if ($result) {
  			foreach ($result as $value) {
  				$heading = $value['heading'];
  				$icon = $value['icon'];
  				$post = $value['content'];
  				echo
  				 ' <div style="padding: 20px">
					 
					  <label>Post Heading</label><br>
					  <input type="text" name="heading" value="'.$heading.'"><br>
					  <label>Post Icon</label><br>
					  <input type="text" name="icon" value="'.$icon.'"><br>
					  <label>Post</label><br>
					  <textarea name="post" >'.$post.'</textarea><br>
					  <input type="submit" name="submit" value="Update">
					
					</div>
					<script>
						CKEDITOR.replace( "post" );
					</script>';
  			}
  		}

  		
  		
  		
  	?> 
  </form>
  </body>
