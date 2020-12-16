<!DOCTYPE html>
<html lang="en">
<?php
  function current_url()
                {
                    $url      = $_SERVER['REQUEST_URI'];
                    $validURL = str_replace("&", "&amp", $url);
                    return $validURL;
                }
                ?>
	<head>
	<title>RealDream Feature - Mock Test |  Current Affairs |  Quiz |   
              <?php
                  if (isset($_POST['post'])) {
                   post($post);
                  }
                  else{
                echo current_url();
              }
                
                 ?></title>
                 <?php
                 $url = current_url();
                     if(isset($url))
                
                    {
                            
                            $url = substr("$url",0,6);
                            //print_r($url);
                           /* if($url=='/login' || $url== '/signup')
                            {
                               //$url=null; 
                            }
                            else
                            {
                                
                            }*/
                        }
                 
                 ?>
	<meta name="Description" content="RealDream offers online test series, daily, exam preparation and job updates for SSC, Banking, IBPS PO, SBI Clerk, RRB, Insurance, Railway and other exams. Take free quizzes, mock tests and get your doubts cleared at the one-stop destination.">
	<meta name="Keywords" content="RealDream Online, railway group d , hindi gk  , quizlet , mock test , online exams , online test gk, ssc online, current affairs, gk questions, gk quiz, quiz |">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta  property="ia:rules_url" content="https://realdream.online/">
    <meta  property="ia:rules_url_dev" content="https://realdream.online/">
    <meta property="og:image" content="image/rr.jpg">
    <meta property="og:site_name" content="RealDream" />
    <meta property="og:type" content="website" /> 
    <script  src="sketch.js"></script>
    <meta property="og:url" content="https://realdream.online" /> 
    <meta property="og:title" content="Free Website For Online Test" /> 
   
    <meta property="og:image:alt" content="RealDream" /> 
   <meta property="fb:app_id" content="155081711871540" />
     
     <script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/p5.js"></script>
  <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.dom.js"></script>
  <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.1/addons/p5.sound.js"></script>
  <!--script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <meta property="og:description"    content="RealDream offers online test series, daily, exam preparation and job updates for SSC, Banking, IBPS PO, SBI Clerk, RRB, Insurance, Railway and other exams. Take free quizzes, mock tests and get your doubts cleared at the one-stop destination." />
    
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

   <!-- Global site tag (gtag.js) - Google Analytics -->
<!--script async src="https://www.googletagmanager.com/gtag/js?id=UA-112467960-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112467960-1');
</script-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

<!--?php
    

?>*/

<!--Start of Tawk.to Script-->
<!--script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b589fb9df040c3e9e0bf4e0/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->



<!--script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5be53dedfca3ce0011150398&product=inline-share-buttons"></script-->



<style>
    *{
    
        
        font-weight: 100;
        margin:0px;
        padding:0px;
        font-size:14px;
        
     }
     h1,h3,h4,h5,h6{
         
         font-variant: small-caps;
     }
     body{
         background-color:#CAD3C8;
     }
     .row,.col-md-12, .col-md-4, .col-md-6, .col-md-8, .col-md-5, .col-md-7, .col-md-9{
         margin:0;
         padding:0;
         overflow:hidden;
     }
    a, a:hover {
   text-decoration: none;
    }
     #loadpic{
        display:none;
    }
</style>
  </head>