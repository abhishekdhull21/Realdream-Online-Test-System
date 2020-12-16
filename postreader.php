<?php require'header.php' ?>

<style>
.thoo {
		font-family: "Comic Sans MS", cursive, sans-serif;';
}
.bdy {
	font-size:18px;
}
.add-comment {
    font-size:24px;
    font-weight:500;
    line-height:1.333;
    margin:0 0 10px;
}

.scrollheader {
  position: fixed;
  top: 58px;
  z-index: 1;
  width: 100%;
  background-color: #f1f1f1;
}
.progress-container {
  width: 100%;
  height: 8px;
  background: #ccc;
}

.progress-bar {
  height: 11px;
  background: #ff7043;
  width: 0%;
}


</style>
   

  <body id="page-top" class="bdy">
    <?php require'nav.php' ; 
          require'bodyheader.php' ;
          ?>
    
    </header>
   <div class="row" style="margin-top:30px">
<div class="col-md-8">
<?php
require 'conn.php';


$pid = $_GET['postid'];
$post = $GET['post'];
echo $post;
$sqlsub = "SELECT * FROM post WHERE pid = $pid ";
$resultsub = mysqli_query($conn, $sqlsub);


while($rowsub = mysqli_fetch_assoc($resultsub))
{

$h1 = $rowsub['heading'];
$post = $rowsub['content'];
$time = $rowsub['time'];


//echo $h1;
//echo $post;

?>
  <div class="scrollheader">
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div> 
  </div>
<div class="content">
<div style="margin-left:0;" class="panel panel-primary ">
<div class="panel-heading"><h3 class="text-uppercase" style="color:white; font-size:28px;    font-weight: 500; text-align:center;"><?php echo $h1; ?> </h3></div>
<div class="panel-body" style="font-weight: 500;" >
<br />
<h3 class="text-capitalize"><?php echo $h1;?></h3>
<h5><?php echo $time;?></h5><br />
<hr />
<?php echo 
    '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:block; text-align:center;"
             data-ad-layout="in-article"
             data-ad-format="fluid"
             data-ad-client="ca-pub-4733970562454302"
             data-ad-slot="5392744946"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>'.$post;
         $sql = "UPDATE post SET  counter = counter+1 where pid =$pid";
  
          if(!mysqli_query($conn, $sql)){
           echo "something going wrong";
          }
        } ?>
<br /><label> </label>

<div class="sharethis-inline-share-buttons">Share</div><br>
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
<hr />
					<div style="margin-left:45px"class="container">
						<span class="add-comment" ><h3>Add a Comment</h3></span>
						<h5>Leave your suggestion for a better Service.	</h5>
					
					<form name="form2"action="postcommentsinsert.php" method="post">
					Name <span style="color:red">*</span><br/>
					<input type="text" name="name" required /><br />
					E-mail <span style="color:red">*</span><br/>
					<input type="email" name="email" id="" required 	/><br />
				    <input type="text" name="pid" value="<?php echo $pid; ?>" hidden 	/><br />
				   
					<textarea name="comment" id="" cols="24" rows="4" placeholder="Comment here..." required></textarea>
					<br />
					<input type="submit" value="Comment" class="btn btn-primary"/>
					</form>
					<br />
			

					<h3 ><b><i class="fa fa-comments" aria-hidden="true"></i> Comments</b></h3>
					<div style="border:1px solid black; width:270px"></div>
					<?php
						$sqlcom = "SELECT * FROM postcomments WHERE pid = $pid ";
						$resultcom = mysqli_query($conn, $sqlcom);

						while($rowcom = mysqli_fetch_assoc($resultcom))
						{
							$name = $rowcom['cname']; 
							$time = $rowcom['time']; 
							$web = $rowcom['web']; 
							$comments = $rowcom['comments']; 
							echo "<div class='container'>
							<h4>
							".$name."</h4>
							<h6>
							".$time."</h6>
							<p>
							".$comments."</p><br />
							</div>";
						}	
					
					?>
  </div><hr />
  </div>
  </div>
  </div>
</div>


<!--Container Div End-->
<div class="col-md-4" style="color:white;">

<!--Panel Start-->
<div class="panel panel-info">
<div class="panel-heading"><h3> Like us on Fb</h3></div>
<div class="panel-body">
<div class="fb-page" data-href="https://www.facebook.com/Real-Dream-221798415264835/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Real-Dream-221798415264835/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Real-Dream-221798415264835/">Real Dream</a></blockquote></div>

</div>
<div class="panel-heading"><h3> Advirtisement</h3></div>
<div class="panel-body">

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
</div>

<!--End of Panel-->


</div>
</div>



  
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
				
		
                <script>
                // When the user scrolls the page, execute myFunction 
                window.onscroll = function() {myFunction()};
                
                function myFunction() {
                  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                  var scrolled = (winScroll / height) * 100;
                  document.getElementById("myBar").style.width = scrolled + "%";
                }
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


</html>
