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

  require 'header.php'; 
?>
  <body id="page-top" class="bdy">
	
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=155081711871540&autoLogAppEvents=1';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!-- Navigation -->
   <?php require 'nav.php';
   require 'bodyheader.php'; ?>

<style>
    .csubject {
    /* border-color: #ddd; */
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    box-shadow: 3px 20px 4px 0px #16171770;
    /* box-shadow: 0 0 black; */
    background-color: #fbf4f400;
    /* align-items: center; */
    text-align: center;
}
.sub_td{
    padding-left: 0px;
    padding-right: 0px;
    padding-bottom: 0px;
    padding-top: 0px;
    font-weight: 600;
}
</style>	
	
    
    

		<div class="row" style="padding:1%">
<!--center Container div start -->
<div class="col-md-8">

<!--Start Of Navigatin Bar-->
  <div class="panel panel-primary ">
    <div class="panel-heading"><h3 style="color:white; font-size:28px; text-align:center;"> Select Subject </h3></div>
       <div class="panel-body">
	        <div class="content">
            <div class="table-full-width">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="sub_td">
																						
						<?php 
                          if (isset($_GET ['exam']))
                          {
                            $exam = $_GET ['exam'];
                          }
                          else
                          {
                            $exam = '0ssc';
                          }
                        
                        ?>
						<div class="row advert" >
                          <div class="col-md-12" >
                              <a href="examno.php?test=<?php echo $exam.'sci'; ?>">
                                <div class="panel panel-default csubject">
                                    <div class="panel-body banner">
                                     <span>SCIENCE</span>
                                    </div>
                                </div>
                            </a>
                          </div>
                        </div>  
                        <div class="row advert" >
                          <div class="col-md-12" >
                              <a href="examno.php?test=<?php echo $exam.'mat'; ?>">
                                 <div class="panel panel-default csubject">
                                  <div class="panel-body banner">
                                    <span>MATH</span>
                                  </div>
                                </div>
                            </a>
                          </div>
                        </div>  
                        <div class="row advert" >
                          <div class="col-md-12" >
                              <a href="examno.php?test=<?php echo $exam.'reg'; ?>">
                                <div class="panel panel-default csubject">
                                 <div class="panel-body banner">
                                    <span>REASONING</span>
                                </div>
                               </div>
                            </a>
                          </div>
                        </div>
                        <div class="row advert" >
                          <div class="col-md-12" ><a href="examno.php?test=<?php echo $exam.'0gk'; ?>">
                            <div class="panel panel-default csubject">
                              <div class="panel-body banner">
                                <span>GENERAL KNOWLEDGE</span>
                              </div>
                            </div>
                            </a>
                          </div>
                        </div><div class="row advert" >
                          <div class="col-md-12" ><a href="examno.php?test=<?php echo $exam.'eng'; ?>">
                            <div class="panel panel-default csubject">
                              <div class="panel-body banner">
                                 <span>ENGLISH</span>
                              </div>
                            </div>
                            </a>
                          </div>
                        </div>
					   </td>
                    </tr>
                  </tbody>
                </table>
                <hr />
            </div>
          </div>
        </div>
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
<?php } } ?>