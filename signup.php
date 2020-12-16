<?php


//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

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
?>
<?php require'header.php'; ?>
<style>
.thoo {
		font-family: "Comic Sans MS", cursive, sans-serif;';
}
.bdy {
	font-size:18px;

    
}
    *{
    	    padding:0px;
            margin:0px;
    }
		/* Full-width input fields */
		input[type=text], input[type=number], input[type=email], input[type=password] {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			display: inline-block;
			border: none;
			background: #f1f1f1;
		}

		input[type=text]:focus, input[type=password]:focus {
			background-color: #ddd;
			outline: none;
		}

		/* Overwrite default styles of hr */
		hr {
			border: 1px solid #f1f1f1;
			margin-bottom: 25px;
		}

		/* Set a style for the submit button */
		.registerbtn {
		    background-color: #2942ee;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            font-weight: 400;
            font-size: 25px;
            border-radius: 15px;
		}

		.registerbtn:hover {
			opacity: 1;
		}

		/* Add a blue text color to links */
		a {
			color: dodgerblue;
		}
		

		/* Set a grey background color and center the text of the "sign in" section */
		.signin {
			//background-color: #ffff;
			text-align: center;
		}
		img{
		    width: 300px
		}
		@media only screen and (max-width: 600px) 
		{
            img
            {
                width: 300px;
                
            }
        }
		</style>

 

    
    
  <body id="page-top" class="bdy">
	
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=155081711871540&autoLogAppEvents=1';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    

	<?php require'nav.php';
            require'bodyheader.php';
            ?>
            </header>
			<div class="row">
		<!--center Container div start -->
		<div class="col-md-8">
		<div class="container">

		<!--Start Of Navigatin Bar-->
		<div class="col-md-10">


		<?php
		$err = $_GET['error'];
		if(isset($err))
		{
		echo "<h1 style='color:red'>".$err."</h1>";
		}
		?>
		</div>

		<!--End of Navigation Bar-->
		</div>	
		<br>
		<br>
		<div class="col-md-12" style="padding:0px; margin:0px" >
        
		<form action="actions.php" name="myform" onsubmit="return validateform()">

		   
		   <div class="panel panel-primary" style="padding:0px">
			  <div class="panel-heading"><h1 style="font-size:26px;font-weight: 500; text-align:center; color:white">Student Registration Panel</h1></div>
		<div class="panel-body" style="padding:10px" >
		<p style="text-align:center; color:black;">Please fill correct info for a better service.</p>
		<hr>
		</div> 
        <div class="gbtn"><?php echo $output; ?></div>
		<br />
		<div style="padding:10px">
		<label for="name"><b>First Name</b></label><br />
		<input type="text"  pattern="[A-Za-z ]{4,}" placeholder="Enter Name" name="name" contenteditable="true" spellcheck="true" title="Enter Only First Name" required>

		<br />
		<label for="no"><b>Mobile</b></label><br />
		<input type="number" placeholder="Enter Number" name="number" name="number" min="6000000000" max="999999999999"  required>
		<br />
		<label for="no"><b>Address</b></label><br />
		<input type="text" placeholder="Enter address" name="address" required>
		<br />
		<label for="email"><b>Email</b></label><br />
		<input type="email" placeholder="Enter Email" name="email" required>
		<br />
		<label for="psw"><b>Password</b></label><br />
		<input type="password" placeholder="Enter Password" name="password" required>
		<br />
		<label for="psw-repeat"><b>Repeat Password</b></label><br />
		<input type="password" placeholder="Repeat Password" name="psw-repeat" >
		<hr>
		<p>By creating an account you agree to our <a href="privacy.html">Terms & Privacy</a>.</p>

		<button type="submit" class="registerbtn">Register</button>
		
        <div class="gbtn"><?php echo $output; ?></div>
		<p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </div>
		</div>
		</div>
		</div>
		</form>
        
        
		<!--Container Div End-->
		<div class="col-md-4"><br><br>
		<!--Panel Start--> 
		<div class="panel panel-primary">
			 
		<div class="panel-heading"><h3> Like us on Fb</h3></div>
		<div class="panel-body">
		<center><div class="fb-page" data-href="https://www.facebook.com/Real-Dream-221798415264835/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Real-Dream-221798415264835/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Real-Dream-221798415264835/">Real Dream</a></blockquote></div>
		</center>
		</div>
		 
		</div>

		<!--End of Panel-->
		</div>
		</div>
		<!--End of side col-->

    

  
<!-- Footer -->
<?php require'footer.php'; ?>
