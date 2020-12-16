	<?php
	include 'conn.php';
	session_start();
	$cookie_name = "studentid";
	$id = $_SESSION['sid'];

	$cookie_value = $id;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

	if(!isset($cookie_value))
	{
		//echo "failed";
		header('location:login.php?error=Session Expired, Please Login');
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<script type="text/javascript">
		

//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
	</script>
<script type="text/javascript" >var timeleft = 420;

var startTime = 0;
var currentTime = 0;

function convertSeconds(s) {
  var min = floor(s / 60);
  var sec = s % 60;
  return nf(min, 2) + ':' + nf(sec, 2);
}

var ding;

function preload() {
  ding = loadSound("ding.mp3");
}

function setup() {
  noCanvas();
  startTime = millis();


  var params = getURLParams();
  console.log(params);
  if (params.minute) {
    var min = params.minute;
    timeleft = min * 60;
  }

  var timer = select('#timery');
  timer.html(convertSeconds(timeleft - currentTime));

  var interval = setInterval(timeIt, 1000);

  function timeIt() {
    currentTime = floor((millis() - startTime) / 1000);
    timer.html(convertSeconds(timeleft - currentTime));
    if (currentTime+10 == timeleft) {
      ding.play();
	  //alert("hiii");
      //clearInterval(interval);
      //counter = 0;
    }
	if (currentTime == timeleft) {
      ding.stop();
	  
	document.getElementById("form1").submit();
      clearInterval(interval);
      //counter = 0;
    }
  }


}
</script>
	<style type="text/css">
		.no-js #loader { display: none;  }
	.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(images/Preloader_10.gif) center no-repeat #fff;
	}
	</style>
  <body id="page-top" class="bdy">
	<div class="se-pre-con"></div>
	
    <!-- Navigation -->
  	<?php require 'nav.php'; 
  		  require 'bodyheader.php';
  	?>
	</header>
	

    
<div class="row" style="padding:1%">
		<!--center Container div start -->
<div class="col-md-8">

<div class="panel panel-primary">
<div class="panel-heading"><h3 style="color:white; text-align:center;"> <?php echo  $_GET['title']; ?></h3></div>
<div class="panel-body">
				  	 <p id="timery" style="position: fixed;background:#fff; top: 58px; left: 20px;">00:00<p>
					</div>	

	<!--Start Of Navigatin Bar-->
		<div class="content">
			<div class="table-full-width">
				<table class="table">
					<tbody>
						<tr>
							<td>
							
				
			<form method="post" id="form1" action="result.php#totalresult">
			
		<?php
			$code = $_GET['examcode'];
			echo'<input type="hidden" name="examcode" value="'.$code.'" >';
			
			$_SESSION['examcode'] = $code;
			/*$catid = $_SESSION['catid'];
			$title = $_SESSION['title'] ."-". $testno;
			$_SESSION['stitle'] = $title;
			*/
			$sqlqus = "SELECT * FROM `question` WHERE examcode = '$code' order by examcode asc ";
			$resultqus = mysqli_query($conn, $sqlqus);

			$i = 1;
            while($rowqus = mysqli_fetch_assoc($resultqus))
			{
				$id = $rowqus['id'];
				$_SESSION['id']= $rowqus['id'];
             
			?>      
					
		
		  <hr />
		  <input type="hidden" name="title" value="<?php echo $_GET['title'] ?>">
			 <table class="table">
					<thead>
				 
					  <tr class="light">
						<th><?php echo   "<h2> <span style='color:blue;'>Q".$i.": </span>&nbsp;".$rowqus['qus']."</h2>" ?></th>
						
					  </tr>
					</thead>
					<tbody>
					 <?php if(isset($rowqus['option1'])){ ?>
					  <tr class="info">
						
						<td style="font-size:16px">(a)
						 <input type="radio" id="<?php echo 'a'.$i; ?>" name="<?php echo $rowqus['id']; ?>" value="0" />
						 <label for="<?php echo 'a'.$i; ?>"><?php echo " ". $rowqus['option1']; ?></label>
						</td>
					  </tr>
					 <?php } ?>
					 <?php if(isset($rowqus['option2'])){ ?>

					  <tr class="Primary">
						<td style="font-size:16px">(b) 
							<input type="radio" id="<?php echo 'b'.$i; ?>" name="<?php echo $rowqus['id']; ?>" value="1" />
							<label for="<?php echo 'b'.$i ?>"><?php echo " ".$rowqus['option2']; ?></label>
						</td>
					  </tr>
					  <?php } ?>
					  <?php if(isset($rowqus['option3'])){ ?>
					  <tr class="danger">
						<td style="font-size:16px">(c) 
							<input type="radio" id="<?php echo 'c'.$i; ?>" name="<?php echo $rowqus['id']; ?>" value="2" />
							<label for="<?php echo 'c'.$i ?>"> <?php echo " ".$rowqus['option3'] ?></label>
						</td>
					  </tr>	
					  <?php } ?>
					  <?php if(isset($rowqus['option4'])){ ?>
					  <tr class="warning">
						<td style="font-size:16px">(d) <input type="radio" id="<?php echo 'd'.$i; ?>"	name="<?php echo $rowqus['id']; ?>" value="3" /><label for="<?php echo 'd'.$i ?>"><?php echo " ".$rowqus['option4'] ?></label></td>
					  </tr>	
					  <?php } ?>				  
					  
					  <tr >
						<td><input type="radio" style="display:none"checked="checked" name="<?php echo $id; ?>" value="empty" /></td>
					  </tr>
					 
					</tbody>
				  </table>
				
        	
			<?php
				

			$i++;}	?>
									
												
												
												</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
							<input type="submit" id="loadpicbtn" value="Submit Exam" style="width:98%; text-align: center; height:53px; font: serif; font-size:30px" class="btn btn-primary"/>
							<img id="loadpic" width="40px" style="margin-left:40%" height="40px" src="image/loading.gif">
						</form>

					</div>
					<br />
					<hr />
					
					<br />
					<div class="cbox">
					<div class="container" id="cbox">
					<form name="form2"action="inserttestcoment.php" method="post">
					<h3><b><i class="fa fa-pencil" aria-hidden="true"></i> Comment Box</b></h3>
					<input type="hidden" name="sid" value="<?php echo $sid; ?> " />
					<input type="hidden" name="examcode" value="<?php echo $code; ?> " />
					<textarea name="comment" id="" cols="28" rows="4" placeholder="Comment here..."></textarea>
					<br />
					<input type="submit"  value="Comment" name="submit" class="btn btn-primary"/>

					
                    </form>
                       
                          
                        
					<br />
				

					<?php
						$sqlcom = "SELECT * FROM comments a, signup b WHERE a.examcode = '$code'  and b.sid = a.sid";
						$resultcom = mysqli_query($conn, $sqlcom);
                        
                        if (mysqli_num_rows($resultcom) > 0){
                           echo' <h3 ><b><i class="fa fa-comments" aria-hidden="true"></i> Comments</b></h3>
					<hr class="chr"/>
					<div class="jumbotron">';
                       
						while($rowcom = mysqli_fetch_assoc($resultcom))
						{
							$name1     = $rowcom['name']; 
							$time      = $rowcom['date_publish']; 
							$comments  = $rowcom['comments'];
							$user_img  = $rowcom['picture'];
							echo "<div class='cshow'  ><h4>
							<i class='fa fa-user-circle-o' aria-hidden='true'></i>
							  ".$name1."</h4>
							<h6>
							".$time."</h6>
							<p style='color:black'>
							".$comments."</p>
							</div>";
						}	
                      echo " </div>"; }
					
					?>
					
					</div>
					</div>
					</div>
					</div>
					







<!--Container Div End-->

		
<div class="col-md-4">
<!--Panel Start-->
<div class="panel panel-info">
<div class="panel-heading"><h3> Like us on Fb</h3></div>
<div class="panel-body">
<div class="fb-page" data-href="https://www.facebook.com/09realdream/" data-width="300" data-height="100" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/09realdream/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/09realdream/">Real Dream</a></blockquote></div>

</div>
<div class="panel-heading"><h3> Advirtisement</h3></div>
<div class="panel-body">

	
</div>
</div>

<!--End of Panel-->
</div>
</div>

<!--End of side col-->
<!-- Footer -->

<?php require 'footer.php';
} ?>