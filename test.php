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



?>
<!DOCTYPE html>
<html lang="en">

	<head>
	<title>RealDream Feature - Mock Test | SSC Online | Current Affairs |  Gk Quiz | Quiz |</title>
	<meta name="Description" content="RealDream offers online test series, daily, exam preparation and job updates for SSC, Banking, IBPS PO, SBI Clerk, RRB, Insurance, Railway and other exams. Take free quizzes, mock tests and get your doubts cleared at the one-stop destination.">
	<meta name="Keywords" content="RealDream Online, railway group d , hindi gk  , quizlet , mock test , online exams , online test gk, ssc online, current affairs, gk questions, gk quiz, quiz |">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!--FONTS-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
<style>
.thoo {
		font-family: "Comic Sans MS", cursive, sans-serif;';
}
.bdy {
	font-size:18px;
}


</style>

    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
 <script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-4733970562454302",
          enable_page_level_ads: true
     });
</script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112467960-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112467960-1');
</script>


  </head>

  <body id="page-top" class="bdy">
	
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=155081711871540&autoLogAppEvents=1';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="sdash.php">RealDream</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		    <li class="nav-item">
              <a class="nav-link " href="sdash.php">Student Dashboard</a>
            </li> 
			<li class="nav-item">
              <a class="nav-link " href="about.html">About</a>
            </li>
			<li class="nav-item" title="Logout"><a class="nav-link" href="logout.php" >Logout</a></li>

            
          </ul>
        </div>
      </div>
    </nav>

	
	
    <header class="bg-danger text-white">
      <div class="container text-center">
        <h1>Welcome to RealDream</h1>
        <p class="lead" style="color:blue">A totally free place for <b>Student</b></p>
	  <a href="test.php">	<button class="btn btn-success" style="20%">Test Area </button> </a>

	 </div>
    </header>
    

		<div class="row" style="padding:1%">
<!--center Container div start -->
<div class="col-md-8">

<!--Start Of Navigatin Bar-->
<div class="panel panel-primary ">
<div class="panel-heading"><h3 style="color:white; font-size:28px; text-align:center;"> Please Select Exam </h3></div>
<div class="panel-body">


<!--End of Navigation Bar-->
				


      
	    <div class="content">
                                <div class="table-full-width">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
																						
												<?php

											
												 $sqlcat = "SELECT * FROM category";
												 $resultcat = mysqli_query($conn, $sqlcat);


												while($rowcat = mysqli_fetch_assoc($resultcat))
												{
												   
												   $catname = $rowcat['catname'];
												  
            
        	

?>													<center>
														<a href="examsub.php?cid=<?php echo $rowcat['catid']."&catname=".$catname; ?>">
												<?php echo "<button class='btn btn-warning' style='width:40%'>".$catname."</button><hr />"; }}?>
														</a>	<br />							
																						
													</center>
												
												</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
	  
							   
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

<!--End of side col-->
<!-- Footer -->
<footer class="page-footer font-small blue pt-4 mt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">RealDream</h5>
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

				<!-- realdream_main_Blog1_1x1_as -->
				<ins class="adsbygoogle"
				style="display:block"
				data-ad-client="ca-pub-4733970562454302"
				data-ad-slot="3533202249"
				data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">important link</h5>

            <ul class="list-unstyled">
              <li>
               
                        <li><a href="login.php">Login</a></li>
                        <li><a href="signup.php">Registration</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                       
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">Privacy & Policy</h5>

            <ul class="list-unstyled">
              <li>
				 <li><a href="about.html">About us</a></li>
                 <li><a href="feed.php">Feedback</a></li>
                 <li><a href="privacy.html">User agreement</a></li>
                    
              </li>
            </ul>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://realdream.online"> RealDream.Online</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->	

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

  </body>

</html>
<?php } ?>