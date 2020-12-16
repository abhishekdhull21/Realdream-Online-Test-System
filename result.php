<?php
include 'conn.php';
session_start();
$cookie_name = "studentid";
$id = $_SESSION['sid'];
$examcode = $_SESSION['examcode'];
$cookie_value = $id;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

if(!isset($cookie_value))
{
	//echo "failed";
	header('location:login.php?error=Please fill the Correct Number or Password');
}
else 
{
	$sid = $cookie_value;
$sql = "SELECT * FROM signup where sid = '$sid'";
$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($result))
{

$name = $row['name'];
$number = $row['mobile'];
$email = $row['email'];

}
require 'header.php';
?> 

  <body id="page-top" class="bdy">
		
	
    <!-- Navigation -->
   <?php require 'nav.php';
   		 require 'bodyheader.php';
   		 ?>
          </header>  

		<div class="row" style="padding:1%">

		<div class="col-md-8">
				
			<?php 
				 $cat = substr("$examcode",0,4);
				  $sub = substr("$examcode",4,3);
				  
				 
				   
				  if ($cat == 'hssc') {
				  		$cat = "HSSC";
				  }
				  elseif ($cat == 'rail') {
				  	# code...
				    $cat ="RAILWAY";

				  }
				  elseif ($cat == 'acad') {
				  	# code...
				    $cat ="RAILWAY";

				  }
				  else{
				  	$cat == "SSC";
				  }

				  if ($sub == 'eng') {
				  	$sub = "ENGLISH";
				  }
				  elseif ($sub == 'mat') {
				  	$sub = 'MATH';
				  	# code...
				  }
				  elseif ($sub == 'reg') {
				  	$sub = 'REASONING';
				  	# code...
				  }
				  elseif ($sub == '0gk') {
				  	$sub = 'GENERAL KNOWLEDGE';
				  	# code...
				  }
				  elseif($sub == 'sci'){
				  	$sub = 'SCIENCE';
				  }
				  else{
				  	$sql = "SELECT * FROM academic_info where acad_id like '%$sub'";
				  	$query = mysqli_query($conn,$sql);
				  	while ($row = mysqli_fetch_assoc($query)) {
				  		$acad_name = $row['acad_name'];
				  	}
				  	$sub = $acad_name;
				  }
				  //echo "<label style='color:darkviolet;'>HOME/".$cat."/".$sub."</label>";
				  ?>	
		<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#totalresult"><i class="fa fa-check-square-o" aria-hidden="true"></i> Result</a></li>
            <li><a data-toggle="tab" href="#home"><i class="fa fa-file" aria-hidden="true"></i>
              Exam</a></li>
            <li><a data-toggle="tab" href="#pro"><i class="fa fa-bar-chart" aria-hidden="true"></i> PERFORMANCE</a></li>
        </ul>

    <div class="tab-content">
                  
		
			<div id="home" class="tab-pane fade">

				<div class="panel panel-primary ">
									<div class="panel-heading"><h3 style="color:white; font-size:28px; text-align:center;"> ANSWER SHEET</h3></div>
		             <div class="panel-body">

					 <?php
						
							
							
							//$examcode = $_SESSION['examcode'];
							$right = 0;
							$wrong = 0;
							$empty = 0;
							$ans=implode("",$_POST);
							$sqlqus = "SELECT * FROM `question` WHERE examcode = '$_POST[examcode]' ";
								$resultqus = mysqli_query($conn, $sqlqus);
                            	$i = 1;
								while($rowqus = mysqli_fetch_assoc($resultqus))
								{
								  
									if($rowqus['rightans'] == $_POST[$rowqus['id']])
										{
											echo "<br><div style='color:green; '><b>Q".$i.":".$rowqus['qus']."</b></div>";
										 	echo "a) &nbsp;&nbsp;" .$rowqus['option1']."<br>";
											echo "b) &nbsp;&nbsp;" .$rowqus['option2']."<br>";
											echo "c) &nbsp;&nbsp;" .$rowqus['option3']."<br>";
											echo "d) &nbsp;&nbsp;" .$rowqus['option4']."<br>";
										echo "Result:";
										if($_POST[$rowqus['id']] == 0)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option1']."<br>";
										}
										if($_POST[$rowqus['id']] == 1)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option2']."<br>";
										}
										if($_POST[$rowqus['id']] == 2)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option3']."<br>";
										}
										if($_POST[$rowqus['id']] == 3)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option4']."<br>";
										}
											
											$right++;
										}
									else if( $_POST[$rowqus['id']]== "empty")
									{
														echo "<div style='color:red'><b>Q".$i.":".$rowqus['qus']."</b></div>";
														echo "a) &nbsp;&nbsp;" .$rowqus['option1']."<br>";
														echo "b) &nbsp;&nbsp;" .$rowqus['option2']."<br>";
														echo "c) &nbsp;&nbsp;" .$rowqus['option3']."<br>";
														echo "d) &nbsp;&nbsp;" .$rowqus['option4']."<br>";
														echo "Result:Not attempt<br>Right Ans:";
										if($rowqus['rightans'] == 0)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option1']."<br>";
										}
										if($rowqus['rightans'] == 1)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option2']."<br>";
										}
										if($rowqus['rightans'] == 2)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option3']."<br>";
										}
										if($rowqus['rightans'] == 3)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option4']."<br>";
										}
										$empty++;
									}
									else
										{
											 echo "<div style='color:red'><b>Q".$i.":".$rowqus['qus']."</b></div>";
											 echo "a) &nbsp;&nbsp;" .$rowqus['option1']."<br>";
											 echo "b) &nbsp;&nbsp;" .$rowqus['option2']."<br>";
											 echo "c) &nbsp;&nbsp;" .$rowqus['option3']."<br>";
											 echo "d) &nbsp;&nbsp;" .$rowqus['option4']."<br>";
											 echo "attempted:";
										if($_POST[$rowqus['id']] == 0)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option1']."<br>";
										}
										if($_POST[$rowqus['id']] == 1)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option2']."<br>";
										}
										if($_POST[$rowqus['id']] == 2)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option3']."<br>";
										}
										if($_POST[$rowqus['id']] == 3)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option4']."<br>";
										}
										echo "Right:";
										if($rowqus['rightans'] == 0)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option1']."<br>";
										}
										if($rowqus['rightans'] == 1)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option2']."<br>";
										}
										if($rowqus['rightans'] == 2)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option3']."<br>";
										}
										if($rowqus['rightans'] == 3)	
										{
											echo " &nbsp;&nbsp;" .$rowqus['option4']."<br>";
										}	
											
								$wrong++;
								} 
								  echo "	 
								
								<button class='btn btn-primary' id='btn".$i."'>Show Explanation</button>
								 <div  style='display:none;' id='div".$i."' > ".$rowqus['explanation']."</div>
								 <script>
									$(document).ready(function () {
										$('#btn".$i."').click(function(){
												$('#div".$i."').toggle();
											});
									});
								</script>								
				
								 ";   
							$i++;	  
								}
								
							  // print_r( array_values($_POST));
							  $total = $right+$empty+$wrong;
							  $per = ($right*100)/$total
							   
							  // print_r($_GET);
							  
					 ?>
					</div>
				</div>
			</div>
	
		  
		  <div id="totalresult" class="tab-pane fade">	
		  	<div class="panel panel-primary ">	 
		  <table class="table table-hover">
			<thead>
				<tr>
					<th style="font-size: 22px" ><h5> Type</h5></th>
					<th style="font-size: 22px" ><h5>Number</h5></th>
				</tr>
			</thead>
		  <tbody>
	  		 
		 
			
		    <div class="panel-heading"><h3 style="color:white; font-size:28px; text-align:center;"> TOTAL RESULT</h3></div>
			 <div class="panel-body" >
				<tr >
		        <td style="font-size: 18px" ><?php echo "Total Question"; ?></td>
		        <td style="font-size: 18px" ><?php echo $total; ?></td>
		      </tr>
		      <tr>
		        <td style="font-size: 18px" ><?php echo "Not attempt"; ?></td>
		        <td style="font-size: 18px" ><?php echo $empty; ?></td>
		      </tr>
		      <tr>
		        <td style="font-size: 18px" ><?php echo "Right"; ?></td>
		        <td style="font-size: 18px" ><?php echo $right; ?></td>
		      </tr>
		      <tr>
		        <td style="font-size: 18px" ><?php echo "Wrong"; ?></td>
		        <td style="font-size: 18px" ><?php echo $wrong; ?></td>
		      </tr>
		      <tr>
		        <td style="font-size: 18px" ><?php echo "Avarage"; ?></td>
		        <td style="font-size: 18px" ><?php echo number_format($per, 2)."%"; ?></td>
		      </tr>
					
				</tbody>
			</table>
		 	</div>
		 </div>
			<div id="pro" class="tab-pane fade">
			  <?php echo "<script>

			      // Load the Visualization API and the corechart package.
			      google.charts.load('current', {'packages':['corechart']});

			      // Set a callback to run when the Google Visualization API is loaded.
			      google.charts.setOnLoadCallback(drawChart);

			      // Callback that creates and populates a data table,
			      // instantiates the pie chart, passes in the data and
			      // draws it.
			      function drawChart() {

			        // Create the data table.
			        var data = new google.visualization.DataTable();
			        data.addColumn('string', 'Topping');
			        data.addColumn('number', 'Slices');
			        data.addRows([
			          ['Right', ".$right."],
			          ['Wrong', ".$wrong."],
			          ['Not attempt', ".$empty."]
			        ]);

			        // Set chart options
			        var options = {'title':'Your Score in this Exam',
			                       'width':400,
			                       'height':300};

			        // Instantiate and draw our chart, passing in some options.
			        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
			        chart.draw(data, options);
			      }
			    </script>";
			    ?>
				 <div id="chart_div"></div>
			
		</div>
        <div class="container">
		<a href="examno.php?test=<?php echo $_POST['examcode']; ?> "><button class="btn btn-success">More Exam</button></a>
		<a href="examsubject.php?exam=<?php echo $cat; ?> ">
			<button class="btn btn-warning">Other Subject</button></a>
		<a href="questionpaper.php?examcode=<?php echo $_POST['examcode'].'&title='.$_POST['title']; ?> ">
			<button class="btn btn-primary">Restart Exam</button></a>
	</div>
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


 </div>
 </div>






  


<!--Container Div End-->
<div class="col-md-4">
<!--Panel Start-->
<div class="panel panel-primary">
<div class="panel-heading"><h3> Like us on Fb</h3></div>
<div class="panel-body">
<div class="fb-page" data-href="https://www.facebook.com/09realdream/" data-width="300" data-height="100" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/09realdream/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/09realdream/">Real Dream</a></blockquote></div>

</div>
<div class="panel-heading"><h3> Advirtisement</h3></div>
<div class="panel-body">

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

						
							<ins class="adsbygoogle"
								 style="display:block"
								 data-ad-client="ca-pub-4733970562454302"
								 data-ad-slot="3533202249"
								 data-ad-format="auto"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
</div>
</div>

<!--End of Panel-->
</div>
</div>
<script>
	(function (global) { 

    if(typeof (global) === "undefined") {
        throw new Error("window is undefined");
    }

    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";

        // making sure we have the fruit available for juice (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };

    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };

    global.onload = function () {            
        noBackPlease();

        // disables backspace on page except on input fields and textarea..
        document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };          
    }

})(window);
</script>
<!--End of side col-->
<!-- Footer -->

<?php
	require 'footer.php';
 } ?>
    <script type="text/javascript">
      $(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});
    </script>