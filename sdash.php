<?php
include 'conn.php';
include_once 'gpConfig.php';
//include'classes/mainclass.php';
//include_once 'User.php';
  
if(isset($_POST['submit']))
  {

    $sid     =  $_POST['sid'];
    $name    =  $_POST['name'];
    $lname   =  $_POST['lname'];
    $gender  =  $_POST['gender'];
    $mobile  =  $_POST['number'];
    $dob  =  $_POST['dob'];
   
    $address =  $_POST['address'];
    
    $sql = " UPDATE  signup SET name ='$name', last_name = '$lname', gender = '$gender', dob = '$dob', mobile = '$mobile',address = '$address' WHERE sid=$sid";
   
   if (mysqli_query($conn, $sql)) {
      echo "Profile updated successfully";
    header('location: sdash.php#profile');
   } 
   else {
      echo "Error updating record: " . mysqli_error($conn);
      header('location: sdash.php#error');
   }
}
$cookie_name = "studentid";
if(!empty($_SESSION['sid']))
{
   $id = $_SESSION['sid'];
}
else
            {
                if(isset($_GET['code'])){
                  $gClient->authenticate($_GET['code']);
                  $_SESSION['token'] = $gClient->getAccessToken();
                  header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
                }
                
                if (isset($_SESSION['token'])) {
                  $gClient->setAccessToken($_SESSION['token']);
                }
                
                if ($gClient->getAccessToken()) {
                  //Get user profile data from google
                  $gpUserProfile = $google_oauthV2->userinfo->get();
                  
                  //Initialize User class
                  $user = new User();
                  
                  //Insert or update user data to the database
                    $gpUserData = array(
                        'oauth_provider'=> 'google',
                        'oauth_uid'     => $gpUserProfile['id'],
                        'name'          => $gpUserProfile['given_name'],
                        'last_name'     => $gpUserProfile['family_name'],
                        'email'         => $gpUserProfile['email'],
                        'gender'        => $gpUserProfile['gender'],
                        'locale'        => $gpUserProfile['locale'],
                        'picture'       => $gpUserProfile['picture'],
                        'link'          => $gpUserProfile['link']
                    );
                    $userData = $user->checkUser($gpUserData);
                  
                  //Storing user data into session
                  $_SESSION['userData'] = $userData;
                  
                  //Render facebook profile data
                    if(!empty($userData)){
                        $id  = $userData['sid'];
                      /*  $output = '<h1>Google+ Profile Details </h1>';
                        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
                        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
                        $output .= '<br/>Name : ' . $userData['name'].' '.$userData['last_name'];
                        $output .= '<br/>Email : ' . $userData['email'];
                        $output .= '<br/>Gender : ' . $userData['gender'];
                        $output .= '<br/>Locale : ' . $userData['locale'];
                        $output .= '<br/>Logged in with : Google';
                        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
                        $output .= '<br/>Logout from <a href="logout.php">Google</a>';
                      // echo' <meta http-equiv="refresh" content="0;url=https://realdream.online/" />';*/
                      
                    }else{
                        echo'<meta http-equiv="refresh" content="0;url=logout.php" />';
                    }
            } 
                else 
                {
                  $authUrl = $gClient->createAuthUrl();
                  $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
                 }
    }

$_SESSION['sid']  = $id;
$cookie_value = $id;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

if(!isset($cookie_value))
        {
             echo '<meta http-equiv="refresh" content="0;url=login.php?error=Session expired please login again" />'; 
        
        }
      
else 
{
  $sid = $cookie_value;
  $_SESSION['sid']=$sid;
$sql = "SELECT * FROM signup where sid = '$sid'";
$result = mysqli_query($conn, $sql);
require'header.php';
if (mysqli_num_rows($result) < 1)
{
     echo '<meta http-equiv="refresh" content="0;url=logout.php" />';
}
while($row = mysqli_fetch_assoc($result))

{

$name = $row['name'];
$number = $row['mobile'];
$email = $row['email'];
$pic = $row['picture'];
$lname = $row['last_name'];
$gender = $row['gender'];
$address = $row['address'];
$dob = $row['dob'];



?>
 
<style>
     h1,h2,h3,h4,h5,h6{
        
         font-variant: small-caps;
         
     }
     body{
        background-color: #ececec;
        overflow-x:hidden;
        margin:0px;
        padding:0px;
     }
     
      .banner{
      color: white;
      padding: 15px;
      width: 90.5%;
      height: 60px;
      margin-left:15px;
      margin-right:15px;
      margin-bottom: 20px;
      margin-right: 20px;
      box-shadow: 0px 7px 20px 0px #1617178a;
      border-radius: 14px;
      text-align: center;
        

    }
    .dcbg{
      background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#0074f6), to(#ed3535e0));
  }
  .dcbg1{
      background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ed3573e0), to(#033434a1));
  }
  .btn1{
    float: right;
      width: 90px;
      text-transform: uppercase;
      box-shadow: 0 0 20px 1px #000000e3;
  }
	.base{
			margin:10px;

	}
	.daily_ch{
			color: white;
			padding: 15px;
			width: 97.5%;
			height: 148px;
			box-shadow: 0px 7px 20px 0px #1617178a;
    		background-color: #fff;
    		border-radius: 14px;
    		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#0074f6), to(#ed3535e0));

		}
	.chlng_content{
		margin-bottom: 8px;
	}
	.chlng_nbr{
		float: right;
	}
	.daily_ch_type{
		float: right;
	}

	.daily_ch h4 {
    
	    text-align: center;
	    letter-spacing: 2px;
	    word-spacing: 3px;
	    text-transform: uppercase;
	    font-family: cursive;
	}
     .row, .col-md-4,.col-md-6,.col-md-8,.col-md-7,.col-md-12{
         overflow-x:hidden;
         margin:0px;
        padding:0px;
     }
     
     
        input[type="text"],input[type="date"],input[type="number"] {
    width: 60%;
    background-color: white;
    box-shadow: 0 0 5px 0px #ff7043;
    padding-left: 10px;
    border-radius: 9px;
    }
    input:focus {
    box-shadow: 0 0 9px 1px #4285f4;
    }
    input[type="submit"] {
    background-color: #0173ec;
    border-radius: 9px;
    color: white;
    padding: 5px;
    background-color: #0a62f5;
    box-shadow: 3px 3px 2px 2px #ff7043;
    }
</style>


  <body id="page-top" class="bdy" onload="myfun();">
  
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=155081711871540&autoLogAppEvents=1';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  
  
  <?php require'nav.php'; require'bodyheader.php'; ?>
  </header>
     <p id="message" ></p> 
        
        <input type="hidden" value="<?php echo $sid;  ?>" id ="sid" >
        <?php if ($dob =="") {
            
            echo    '
                      <div class="well well-lg picker" id="picker" >
                      <h6>Enter Date of birth</h6>
                      <input type="date" name="" id="dob" >
                      <input type="submit" class="btn btn-primary dobbtn" name="" value="save" onclick="insertData()" >
                    </div>
                    <script> 
                      function insertData() {
                      
                        var dob=$("#dob").val();
                         var sid=$("#sid").val();
                 
                    // AJAX code to send data to php file.
                            $.ajax({
                                type: "POST",
                                url: "sdashdatainsert.php",
                                data: {dob:dob,
                                    sid:sid
                                },
                                dataType: "JSON",
                                success: function(data) {
                                 $("#message").html(data);
                                 $("#picker").hide();
                                $("#message").addClass("alert alert-success");
                                setTimeout(function() {
                                  $("#message").fadeOut("fast");
                                }, 3000);
                                },
                                error: function(err) {
                                alert(err);
                                }
                            });
             
                          }
                  </script>';
      }
      else if ($number =="") {
         
            echo    '<div class="well well-lg picker" id="picker">
                   
                      <h6>Enter Number</h6>
                      <input id="mobile" type="number"  > 
                      <button class="btn btn-primary dobbtn" id="insert" onclick="insertData()"  >Save</button>
                     
                    </div>
                    <script> 
                      function insertData() {
                      
                        var sid=$("#sid").val();
                        var mobile=$("#mobile").val();
                    // AJAX code to send data to php file.
                            $.ajax({
                                type: "POST",
                                url: "sdashdatainsert.php",
                                data: {mobile:mobile,
                                    sid:sid},
                                dataType: "JSON",
                                success: function(data) {
                                 $("#message").html(data);
                                 $("#picker").hide();
                                $("#message").addClass("alert alert-success");
                                setTimeout(function() {
                                  $("#message").fadeOut("fast");
                                }, 3000);
                                },
                                error: function(err) {
                                alert(err);
                                }
                            });
             
                          }
                  </script>';


                  
      }
      else if ($gender =="") {
         
            echo    '<div class="well well-lg picker" id="picker">
                   
                      <h6>Select Gender</h6>
                      <input id="gender" type="radio" value="Male"   name="gender" >Male
                      <input id="gender" type="radio" value="Female" name="gender" > Female 
                      <button class="btn btn-primary dobbtn" id="insert" onclick="insertData()"  >Save</button>
                     
                    </div>
                    <script> 
                      function insertData() {
                      
                        var sid=$("#sid").val();
                        var gender=$("#gender:checked").val();
                    // AJAX code to send data to php file.
                            $.ajax({
                                type: "POST",
                                url: "sdashdatainsert.php",
                                data: {gender:gender,
                                    sid:sid},
                                dataType: "JSON",
                                success: function(data) {
                                 $("#message").html(data);
                                 $("#picker").hide();
                                $("#message").addClass("alert alert-success");
                                setTimeout(function() {
                                  $("#message").fadeOut("fast");
                                }, 3000);
                                },
                                error: function(err) {
                                alert(err);
                                }
                            });
             
                          }
                  </script>';


                  
      }
      else if ($address =="") {
         
            echo    '<div class="well well-lg picker " id="picker">
                   
                      <h6>Enter Address</h6>
                      <input id="address" type="text"    name="address" > 
                      <button class="btn btn-primary dobbtn" id="insert" onclick="insertData()"  >Save</button>
                     
                    </div>
                    <script> 
                      function insertData() {
                      
                        var sid=$("#sid").val();
                        var address=$("#address").val();
                    // AJAX code to send data to php file.
                            $.ajax({
                                type: "POST",
                                url: "sdashdatainsert.php",
                                data: {address:address,
                                    sid:sid},
                                dataType: "JSON",
                                success: function(data) {
                                 $("#message").html(data);
                                 $("#picker").hide();
                                $("#message").addClass("alert alert-success");
                                setTimeout(function() {
                                  $("#message").fadeOut("fast");
                                }, 3000);
                                },
                                error: function(err) {
                                alert(err);
                                }
                            });
             
                          }
                  </script>';


                  
      }
      ?> 


 <div class="row sdash" >
    <div class="col-md-8" >
    <?php require 'daily_challenge.php'; ?>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a data-toggle="tab" href="#profile"><i class="fa fa-user" aria-hidden="true"></i>
            PROFILE</a></li>
            <li><a data-toggle="tab" href="#performance"><i class="fa fa-bar-chart" aria-hidden="true"></i> PERFORMANCE</a></li>
        </ul>

            <div class="tab-content" style="padding:1vh;">
                  <div id="home" class="tab-pane fade"></div>
                <!-- Profile-->
                  <div id="profile" class="tab-pane fade">
                      <ul class="nav nav-tabs mainnav">
                        <li class="active"><a data-toggle="tab" href="#view"><i class="fa fa-user-circle" aria-hidden="true"></i> VIEW</a></li>
                        <li><a data-toggle="tab" href="#editpro"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</a></li>
                      </ul>

                      <div class="tab-content">
                        <div id="view" class="tab-pane active">
                          <div class="card">
                                <?php
                                    if ($pic==null) {
                                      echo '<img src="images/avatar.png" alt="Avatar1" style="width:100%">';
                                    }
                                    else
                                      {
                                        echo '<img src=" '.$pic.' " alt="Avatar2" style="width:100%">';
                                      }
                                     
                                    ?>
                                 <br>
                              <div class="container">    
                               <table> 
                                <tr>
                                  <td><span class="profile_heading"> Name </td><td>:   </span></td>
                                  <td><span class="profile_subheading" ><?php echo $name." ".$lname;  ?></span></td>
                                </tr>
                                
                                <tr>
                                  <td><span class="profile_heading"> Gender </td><td>:    </span></td>
                                  <td><span class="profile_subheading" ><?php echo $gender;  ?></span></td>
                                </tr>
                                
                                <tr>
                                  <td><span class="profile_heading"> Mobile </td><td>:    </span></td>
                                  <td><span class="profile_subheading" ><?php echo $number;  ?></span></td>
                                </tr>
                                
                                <tr>
                                  <td><span class="profile_heading"> E-mail </td><td>:    </span></td>
                                  <td><span class="profile_subheading" ><?php echo $email;  ?></span></td>
                                </tr>
                                
                                <tr>
                                  <td><span class="profile_heading"> Address </td><td>:  &nbsp;&nbsp;   
                                  </span></td>
                                  <td><span class="profile_subheading" ><?php echo $address;  ?></span></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>    
                        <div id="editpro" class="tab-pane fade" style="padding:2vh;" >
                          <form method="post" action="" >
                            <input type="hidden" value="<?php echo $sid;  ?>" name="sid"  />
                            <label>First Name</label><br>
                            <input type="text" value="<?php echo $name;  ?>" name="name"   /><br><br>
                            <label>Last Name</label><br>
                            <input type="text" value="<?php echo $lname;  ?>" name="lname"   /><br><br>
                            <label>D.O.B</label><br>
                            <input type="date" value="<?php echo $dob;  ?>" name="dob"   /><br>
                            <label>Gender</label><br>
                            <input type="radio" value="male" name="gender"   />Male<br>
                            <input type="radio" value="female" name="gender"   />Female<br><br>
                            <label>Mobile</label><br>
                            <input type="text" value="<?php echo $number;  ?>" name="number"   /><br><br>
                            <label>E-mail</label><br>
                            <input type="text" value="<?php echo $email;  ?>" name="email"  disabled /><br><br>
                            <label>Address</label><br>
                            <input type="text" value="<?php echo $address;  ?>" name="address"   /><br><br>
                            <input type="submit" value="Update Profile" name="submit">
                          </form>

                        </div><!--Edit Profile -->
                      </div> 
                  </div>              
                  <!-- Performance -->
                  <div id="performance" class="tab-pane fade">
                    
                    <p>This Section in developement Mode very soon its available</p>
                  </div>
               
          </div>

              
              <br><br>
                
                   
                     <p id="demo"></p>
                <div id="content">
                  
                </div>
                <!--script>
                  
                var xhttp, xmlDoc, txt, x, i;
                xhttp = new XMLHttpRequest();
                
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML =
      this.responseText;
                    }
                  //(this.xhttp,500);
                };
              

                xhttp.open("POST", "data.php", true);
                xhttp.send();
                
              
                </script-->
                 
                 <!-- <script type="text/javascript">
                   $(document).ready(function()
                   {
                    setInterval(function(){
                      checkit();
                    },500);
                    function checkit() {
                      $.ajax({
                        url:"data.php",
                        method:"POST",
                        success:function(data)
                        {
                          $('#content').html(data);
                        }
                      });
                    }
                   });
                 </script>                 
                 <h1 id="txt"></h1> -->
                 
                 <a href="examsubject.php?exam=rail">
                    <div class="banner dcbg1" >
                     RAILWAY  <i class="material-icons" style="float:right;">chevron_right</i>
                   </div>
                 </a>
          <!-- SSC -->
           <a href="examsubject.php?exam=0ssc"> 
              <div class="banner dcbg" >
                SSC <i class="material-icons" style="float:right;">chevron_right</i>
                </div>       
           </a>               
                       
                 
            <!-- HSSC -->
            <a href="examsubject.php?exam=hssc">
              <div class="banner dcbg" >
               HSSC     <i class="material-icons" style="float:right;">chevron_right</i>     
              </div>           
           </a>           
                    
              
              <!-- Haryana Police -->
             <a href="weekTestSeries.php?cid=HRPOL&ccid=252">
              <div class="banner dcbg " >
                  HARYANA POLICE MOCK TEST <i class="material-icons" style="float:right;">chevron_right</i>
              </div>
            </a>
                <!-- RAILWAY Police -->
            <a href="weekTestSeries.php?cid=RLPOL&ccid=2534232"> 
              <div class="banner dcbg1">
               RAILWAY POLICE MOCK TEST <i class="material-icons" style="float:right;">chevron_right</i>
              </div>
            </a>
          </div>        
         
         
              
               
       

 
  
  <!--center Container div start -->
   <div class="col-md-4">
   <!--Start Of Navigatin Bar-->
     <!--Container Div End-->
   
      <!--Panel Start-->
      <div class="panel panel-primary">
      <div class="panel-heading"><h3> Like us on Fb</h3></div>
      <div class="panel-body" style="text-align">
      <div style="overflow:hidden;" class="fb-page" data-href="https://www.facebook.com/09realdream/" data-width="320" data-height="100" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/09realdream/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/09realdream/">Real Dream</a></blockquote></div>
     
      </div>
      <div class="panel-heading"><h5> Ads</h5></div>
      <div class="panel-body">

                         
              </div>
              </div>

              <!--End of Panel-->
      
          <!--End of side col-->
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

  </body>

</html>
<?php }

} 
?>