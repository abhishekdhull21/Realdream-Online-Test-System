<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=155081711871540&autoLogAppEvents=1';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #2942ee;" id="mainNav">
      <div class="container">
        
        <a class="navbar-brand js-scroll-trigger" href="index.php">
          <h2 style=" margin-top: 10px; margin-left: -80px; color: #fbf4f4;"> RealDream </h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		    <li class="nav-item">
              <a class="nav-link " href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li> 
           
            <?php 
                if(isset($sid))
                {
                    echo '<li class="nav-item">
                            <a class="nav-link " href="sdash.php"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                         </li>
                         <li class="nav-item">
                          <a class="nav-link " href="about.html"><i class="fa fa-th-large" aria-hidden="true"></i> About</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link " href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                         </li>';
                } 
                else
                echo'
                <li class="nav-item">
                     <a class="nav-link " href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Test Now</a>
                </li> 
    			<li class="nav-item">
                  <a class="nav-link " href="signup.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="about.html"><i class="fa fa-th-large" aria-hidden="true"></i> About</a>
                </li>';
            ?>
          
           
            <div id="google_translate_element" style="margin-top: 14px; margin-left: 10px;" ></div><script type="text/javascript">
                function googleTranslateElementInit() {
                 new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true, gaTrack: true, gaId: 'UA-112467960-1'}, 'google_translate_element');
                        }
                </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
           </li>
          </ul>
        </div>
      </div>
    </nav>

	