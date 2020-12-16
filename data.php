
<?php
 	require 'conn.php';
 	date_default_timezone_set('Asia/Kolkata');
 	$min = date('i')-9;
     $nowTime = date('dmyHi');
     
     $sql = "SELECT * from academic_exam a, academic_info b where  a.powerd_by = b.acad_id order by a.status asc";
     $res = mysqli_query($conn,$sql);
     while ($row=mysqli_fetch_assoc($res)) 
     {
     		$testDay = $row['entry_time'];
     		$tenTime = $testDay+$row['entry_close'];

     ?>
   			<div class="container">
    
        <div class=" jumbotron" >
          <?php
          		
          		//$min = date('g');
          		//$sec = date('s');
          		//echo $tenTime;
                if($row['status'] == 1)
                  echo "<img src='images/live.png' width=45px height=28px >" ?>
         <?php echo $row['test_name'];  ?><br>
        Time: <?php echo $row['exam_time']/60 ;  ?> min &nbsp;&nbsp;
        Total: <?php echo $row['total_qus'];  ?> <br><br>
        Powered by : <?php echo $row['acad_name'];   ?>
        <hr>
        <?php 
        	if ($nowTime >= $testDay && $tenTime >= $nowTime) {
        		
        	?>
         <a href="questionpaper.php?exam=">

        <button class="btn btn-primary w-100">START
          <i class="material-icons" style="float:right;">chevron_right</i></button>
          </a>
      <?php
      	 }
      	 else{


      	 	?>
      <?php	 	
      	 }
   		}
   	  ?>
       </div>
     
    </div>       