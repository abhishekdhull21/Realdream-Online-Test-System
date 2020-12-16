<?php

$cookie_name = "studentid";
if(isset($_COOKIE[$cookie_name])) {
    $_SESSION['sid'] = $_COOKIE[$cookie_name];
	//echo "Value is: " . $_COOKIE[$cookie_name];
	header('location:sdash.php');
}


//Include GP config file && User class
include_once 'gpConfig.php';
//include_once 'User.php';

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
      /*  $output = '<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>';*/
      // echo' <meta http-equiv="refresh" content="0;url=https://realdream.online/" />';
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
}
require'header.php';
?>

<style>
		/* Full-width input fields */
		input[type=number], input[type=password] {
			width: 80%;
			padding: 15px;
			margin: 5px 0 22px 0;
			display: inline-block;
			border: none;
			background: #f1f1f1;
		}

		input[type=number]:focus, input[type=password]:focus {
			background-color: #ddd;
			outline: none;
		}

		/* Overwrite default styles of hr */
		hr {
			border: 1px solid #f1f1f1;
			margin-bottom: 25px;
			

		}

		/* Set a style for the submit button */
		.loginbtn {
			    background-color: #2942ee;
                color: white;
                font-weight: 600;
                word-spacing: 2px;
                padding: 16px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 80%;
                opacity: 0.9;
                border-radius: 7px;
                box-shadow: 0 0 1px 0px #0000005c;
		}
        .loginform{
                border: 2px solid #fbf4f4;
                padding: 6%;
                box-shadow: 0 0 5px 6px #16171791;
                background: white;
                border-radius: 30px;
        }
		.loginbtn:hover {
			opacity: 1;
		}

		/* Add a blue text color to links */
		a {
			color: dodgerblue;
		}
        .bdy{
            background-color:#CFD8DC;
        }
        .placeicon{
            font-family:fontawesome;
        }
		@media only screen and (max-width: 600px) 
		{
            img
            {
                width: 170px;
                
            }
        }
		</style>

 



     <body id="page-top" class="bdy">
         <?php require'nav.php';
            require'bodyheader.php';
            ?>

	</header>

			<div class="row" style="margin:1%;">
			<!--center Container div start -->
			<div class="col-md-8">
			

				<!--Start Of Navigatin Bar-->
			

			<div class="panel " style=" background-color: #2e41ea; border-color: #337ab7;">
			<div class="panel-heading"><h1 style="font-size:28px;text-align:center;color:white;">Student Login Panel</h1></div>
			<div class="panel-body" style="background-image: linear-gradient(#2942ee, #f32e06);">
		
			<?php
			
			if(isset($_GET['error']))
			{
				$err = $_GET['error'];
				echo "<h1 style='color:red'>".$err."</h1>";
			}
			
			if(isset($_GET['noti']))
			{
				$noti = $_GET['noti'];
				echo "<h1 style='color:green'>".$noti."</h1>";
			}
			?>
		




                <br><br>
                <div class="loginform">
                 <form action="actionl.php" method="post">
				  <div class="container">
                     <h3>Sign In </h3>
                     <h5>Welcome Back and </h5>
                     <h5>Glad to see you !</h5>
                     <hr /><br>
				
					<label for="uname"><h4> Mobile</h4></label> <br />
					<input type="number" placeholder="&#xf3cd; Enter mobile" class="placeicon" name="mobile" required>
		<br />
					<label for="psw"><h4>Password</h4></label><br />
					<input type="password" placeholder="&#xf023; Enter Password" class="placeicon" name="password" required>
					<br><label>
					  <input type="checkbox" checked="checked" name="remember"> Remember me
					</label><br>
					<button type="submit" class="loginbtn">Login</button>
				<div class="gbtn"><?php echo $output; ?></div>
					<p>If not registered then <a href="signup.php" >Sign Up Here</a></p>

				  </div>
			
				  <hr />
				</form>
			
			    
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Forgotton Password</button>
			</div>
			<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Forgot Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="fast.php" method="post">
        
       <b> Registered Number: </b><br>
        <input type="number" name="number" placeholder="Enter Your Mobile Number">
        <br><br/>
        <input type="submit" class" btn btn-danger" >
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
				</div>
				<!--End of Navigation Bar-->
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

			<!--End of Panel-->
			</div>
			</div>
			</div>
			<!--End of side col-->

			  
			  
<?php
require'footer.php';
?>