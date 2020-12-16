<?php 
    $examcode =$_POST['examcode'];
    $exam_no = substr("$examcode",10,2);
   $title =$_POST['title']." ".$exam_no;
   
  $sql = "INSERT INTO `sdata`(`sid`, `dexamcode`, `title`,`totalqus`, `rightqus`, `avg`) VALUES ('$sid','$_POST[examcode]','$title','$total','$right','$per')";

            if (!mysqli_query($conn, $sql))
			{
				echo "un-successful";
			}
			

?>