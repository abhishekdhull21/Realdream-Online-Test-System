.<?php
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
  if (isset($_GET['test'])) {
                                 $cod = $_GET['test'];
                                $code = substr("$cod",0,7);
                                 $sub = substr("$code",4,7);
                                 
                                  if ($sub == "eng" ) {
                                      $subno = "English";
                                  }
                                  else if ($sub == "mat")
                                  {
                                      $subno = "MATH";
                                  }
                                  else if ($sub == "reg")
                                  {
                                      $subno = "REASONING";
                                  }
                                  else if ($sub == "sci")
                                  {
                                      $subno = "SCIENCE";
                                  }
                                   $state = substr("$code",0,4);
                                   echo $state;
                                     if ($state == "0ssc" ) 
                                     {
                                       $state = "SSC";
                                      }
                                      else if($state == "hssc")
                                      {
                                        $state == "HSSC";
                                      }
                                      else if($state == "rail")
                                      {
                                        $state = "RAILWAY";
                                      }
                                    
                                  $title_rec = $state." ".$subno;

                               }
?>
           <style type="text/css">
                            .topicbox{
                                padding:19px;
                            }
                         .tableclass{
                                      border-color:#eee;
                                      margin:20px;
                                      padding:10px;
                                      font: 15px "Century Gothic", "Times Roman", sans-serif;
                                      }
                             .title{
                                    font-family:'typo';
                                    }

                                    .header{
                                    background:#202020;
                                    height:110px;
                                    }
                                    .logo {
                                    font-family:'typo';
                                    font-size:35px;
                                    color:#ffbb33;
                                    margin:15px;
                                    }

                                    .title1{
                                    font: 12px "Century Gothic", "Times Roman", sans-serif;
                                    }
                                    .title2{
                                    font-family: 'Ubuntu', sans-serif;
                                    font-size:20px;
                                    }


                                    .sub1
                                    {
                                    width:100px;
                                    color:#202020;
                                    background:orange;
                                    font-size:15px;
                                    height:40px;
                                    margin:20px;
                                    padding:10px;
                                    width:100px;
                                    }


                                    .sub
                                    {
                                    width:100%;
                                    background-color:#9acd32;
                                    font-size:16px;
                                    padding:2px;
                                    margin-top:15px;
                                    margin-right:20px;
                                    }
                                    .sub:hover
                                    {
                                    color:#fff;
                                    }
                                    .contentdiv {
                                      padding: 20px;
                          
                        }
                            @media only screen and (max-width: 680px) {                              
                              .table-responsive{
                                 background-color: #C7DFDBFF;
                                 margin:0;
                                padding: 10px;
                              }

                              .tableclass{
                                  font-size: 20px;
                                  padding-left: 0px;
                                  margin-left: 0px;
                                  margin-top: 0px;
                                  padding-top: 0px;
                                  padding-right: 0px;
                                  margin-right: 0px;
                                  margin-bottom: 0px;

                              }
                              .advert{
                                 margin:0;
                                padding: 0;
                                 margin-left: -15
                              }
                              .panel-body{
                                padding: 0;
                              }
                              .tdhead{

                              }
                              .contentdiv{
                                padding-right: 0px;
                                padding-left: 0px;
                                margin-right: -10;
                              }
                           .title
                          {
                          font-family:'typo';
                          }

                          .header
                          {
                          background:#202020;
                          height:110px;
                          }
                          .logo
                          {
                          font-family:'typo';
                          font-size:35px;
                          color:#ffbb33;
                          margin:15px;
                          }

                          .title1{
                          font: 12px "Century Gothic", "Times Roman", sans-serif;
                          }
                          .title2{
                          font-family: 'Ubuntu', sans-serif;
                          font-size:20px;
                          }

}
                          /*.sub1 {
                          width:100px;
                          color:#202020;
                          background:orange;
                          font-size:15px;
                          height:40px;
                          margin:20px;
                          padding:10px;
                          width:100px;
                          }*/


                          .sub{
                          width:100%;
                          background-color:#9acd32;
                          font-size:16px;
                          padding:2px;
                          margin-top:15px;
                          margin-right:20px;
                          }
                          .sub:hover{
                          color:#fff;
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
    <!-- Navigation -->
   <?php require 'nav.php';
   require 'bodyheader.php'; ?>
    </header>
	
	
    
    

		<div class="row" style="padding:0.2%">
<!--center Container div start -->
<div class="col-md-8">

<!--Start Of Navigatin Bar-->
  <div class="panel panel-primary ">
    <div class="panel-heading"><h3 style="color:white; font-size:28px; text-align:center;"> <?php echo $title_rec."  TEST "; ?></h3></div>
       <div class="panel-body" style="background-color: #D7D8D8">
	        <div class="content">
            <div class="table-full-width">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>
                       									
												
						<div class="row advert" >
                          <div class="col-md-12" >
                            <div class="panel panel-default">
                              <div class="panel-body banner">
                                <div class="content topicbox">
                              <?php 
                               
                              
                               /* $sql = "SELECT * from  weekteststatus WHERE  examName  like '$code%' GROUP BY examName  order by examName ";
                                $result = mysqli_query($conn, $sql);
                                  $count = mysqli_num_rows($result);
                                  //echo $count;
                                
                                  while($rows = mysqli_fetch_assoc($result))
                                  {
                                      $examcode =  $rows['examName'];
                                     
                                  ?>
                                 
                                  <a href="questionpaper.php?examcode=<?php echo $examcode.'&title='. $title; ?>">
                                  <?php
                                   // $dexamcode = "0sscsci00004"; 
                                    
                                    //echo $dexamcode;  
                                   
                                    
                                       echo"<button class='btn btn-info' style='width:100%; height:50%' >".$rows['title'];  
                                    
                                      
                                       echo  "</button><hr /></a>";          
                                     }
                                    */
                               
                              $q20=mysqli_query($conn,"SELECT distinct dexamcode FROM sdata WHERE sid= $sid AND dexamcode like '$code%'");
                                $count = mysqli_num_rows($q20);
                               
                                $limit =3;
                               // echo $count;
                               if ($count < 3) {
                                 $limit  = 3;
                               }
                               elseif ($count <5) {
                                 $limit = 5;
                               }
                               elseif ($count <7) {
                                 $limit =7;
                               }
                               elseif ($count >11) {
                                 $limit = 11;
                               }
                               elseif ($count >13) {
                                 $limit =13;
                               }
                               elseif ($count >15) {
                                 $limit =15;
                               }
                               elseif ($count >17) {
                                 $limit = 17;
                               }
                               elseif ($count >19) {
                                 $limit = 19;
                               }
                              $result = mysqli_query($conn,"SELECT * FROM weekteststatus where examName like '$code%' and status = 1 ORDER BY examName asc limit $limit ") or die('Error');
                              echo  '<div class="panel tableclass">
                              <div class="table1">
                              <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable title1">
                              <tr class="w3-light-grey tdhead" >
                              
                              <td><b>Topic</b></td>
                              <td><b>Total</b></td>
                              
                              <td><b>Time</b></td>
                              <td></td>
                              </tr>';
                              $c=1;
                              while($row = mysqli_fetch_array($result)) {
                                $title = $row['title'];
                                $total = $row['total'];
                                $examcode =  $row['examName'];
                                //$sahi = $row['sahi'];
                                  $time = round($row['time']/60,2);
                               
                              $q12=mysqli_query($conn,"SELECT dexamcode FROM sdata WHERE sid='$sid' AND dexamcode = '$examcode'" )or die('Error98');
                              $rowcount=mysqli_num_rows($q12);  
                              if($rowcount == 0){
                                echo '
                                <tr style="color:black" >
                                
                                 <td>'.$title.'</td>
                                 <td>'.$total.'</td>
                                 
                                 <td>'.$time.'&nbsp;min</td>
                                 <td><b><a href="questionpaper.php?examcode='.$examcode.'&n=1&t='.$total.'&title='.$title_rec.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32;"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td>
                                 </tr>';
                              }
                              else
                              {
                              echo '
                              <tr style="color:#000000">
                              
                               <td title="This quiz is already solve by you" >'.$title.'&nbsp;
                               </td>
                               <td>'.$total.'</td>
                               
                               <td>'.$time.'&nbsp;min</td>
                                <td><b><a href="questionpaper.php?examcode='.$examcode.'&n=1&t='.$total.'&title='.$title_rec.'" class=" pull-right  sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b>
                                </td>
                                </tr>';
                              }
                              }
                              $c=0;
                                echo '</table></div></div>';
                              ?>
                                <div  style='display:none;' id='showlabel' > 
                                <label>Please Complete this Pack. </label>
                               </div>
                              <button class='btn btn-primary' id='show'>Show More</button>
                               
                               <script>
                                $(document).ready(function () {
                                  $('#show').click(function(){
                                      $('#showlabel').toggle();
                                    });
                                });
                              </script>
                              </div>
                            </div>
                          </div>
                        </div>  
                       
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
<?php require 'footer.php'; ?>
    <!-- Footer Links -->
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