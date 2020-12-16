  <!-- Model -->
  <script data-require="jquery@*" data-semver="2.2.0" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script data-require="bootstrap@*" data-semver="3.3.6" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link data-require="bootstrap-css@3.3.6" data-semver="3.3.6" rel="stylesheet
                                                                    " href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
  <script >
    
    $('.modal-content').resizable({
      //alsoResize: ".modal-dialog",
      minHeight: 300,
      minWidth: 300
    });
    $('.modal-dialog').draggable();

    $('#myModal').on('show.bs.modal', function() {
      $(this).find('.modal-body').css({
        'max-height': '100%'
      });
    });

  </script>

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

    if (isset($_GET['cid'])) {
                                 $cod = $_GET['cid'];
                                $code = substr("$cod",0,5);
                                 $sub = substr("$code",2);
                                 
                                  if ($sub == "POL" ) {
                                      $subno = "POLICE";
                                      
                                  }
                                  else if($sub == "mat"){
                                      $subno = "MATH";
                                  } 
                                   else if($sub == "sci"){
                                      $subno = "SCIENCE";
                                  } 
                                   else if($sub == "reg"){
                                      $subno = "REASONING";
                                  } 
                                   else if($sub == "eng"){
                                      $subno = "ENGLISH";
                                  }
                                  $state = substr("$code",0,2);
                                     if ($state == "HR" ) 
                                     {
                                       $state = "HARYANA";
                                      }
                                      else if($state = "RL")
                                      {
                                        $state = "RAILWAY";
                                      }
                                  $title = $state." ".$subno;

                               }
?>
  <body id="page-top" class="bdy">
  

   <?php require 'nav.php';
   require 'bodyheader.php'; ?>
</header>
  
  
    
    

    <div class="row" style="padding:0.2%">
<!--center Container div start -->
<div class="col-md-8">

<!--Start Of Navigatin Bar-->
  <div class="panel panel-primary ">
    <div class="panel-heading"><h3 style="color:white; font-size:102%; text-align:center;"><?php echo $title." MOCK TEST "; ?> </h3></div>
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
                                <div class="content">
                              <?php 
                              
                              
                                   
                                         $sqls = "SELECT DISTINCT a.examName, b.status, b.time from weektest a, weekteststatus b WHERE a.examName = b.examName and a.examName like '$code%' and b.status = 1 order by examName asc";
                                      $results = mysqli_query($conn, $sqls);

                                 $i =1;
                                  while($rows = mysqli_fetch_assoc($results))
                                  {
                                      $examcode = $rows['examName'];
                                      $clock = $rows['time'];  
                                           
                                  
                                 
                                  echo'<a href="weeklyTestQuestion.php?examcode='.$rows["examName"].'&title='. $title.' '.$i.'&clock='.$clock .' " >
                                              <button type="button" class="btn btn-primary">Start Test'.$i.'</button></a>';
                                     
                                      
                                    
                                 /* <!--?php 
                                  
                                    

                                       echo    '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true ">&times;</span></button>
                                              <h4 class="modal-title"  style="color:red; float:left;" id="myModalLabel">Read Instruction  before Start the test</h4>
                                            </div>
                                            <div class="modal-body">
                                               <div class="text-center">   <b>कृपया निम्नलिखित निर्देशों को ध्यान से पढ़ें</b> </div>
                                                 <div>
                                                    <p><strong><u>सामान्य अनुदेश</u></strong></p>
                                                </div>
                                                <div>
        <ul>
            <li> परीक्षा की कुल समयावधि <b>60</b> मिनट है ।</li>
            <li>घड़ी सर्वर के अनुकूल स्थापित किया गया है। काउंटडाउन घडी आपके कंप्यूटर स्क्रीन पर शीर्ष में 
बाएं कोने पर दर्शाया गया है, जिससे आपको परीक्षा स्माप्त करने हेतु कुल शेष समय का पता लग सकेगा। टाइमर के शून्य पर पहुँचते जे साथ ही परीक्षा समयावधि समाप्त हो जाएगी, जिसके उपरांत आप परीक्षा सबमिट नहीं कर सकेंगे ।</li>
        </ul>
         <p><strong><u>सवाल का जवाब दो:</u></strong></p>
        <ul >
            <li>बहु विकल्प प्रकार के प्रश्न का उत्तर देने हेतु प्रक्रिया:</li>
            <ul type="a">
                <li>अपना जवाब चुनने के लिए, विकल्पों में से किसी एक बटन पर क्लिक करें</li>
                
                <li>अपने चुने हुए उत्तर को बदलने के लिए, दूसरे विकल्प के बटन पर क्लिक करें</li>
        </ul><br>
        <strong>Result</strong>
        <p>
            टेस्ट सबमिट करने के बाद आपको तीन टैब होंगे Result, Exam, Performance 
           <br> <strong>Result</strong><br>
              <p>इस टैब में आप आपका स्कोर जान सकते है </p>
           <br> <strong>Exam</strong><br>
                इस टैब में आप आपके द्वारा attempted  टेस्ट देख सकते है <br>
                <ul>
                    <li>अगर प्रश्न सही है तो प्रश्न हरा होगा </li>
                    <li>अगर प्रश्न गलत या एटेम्पट नहीं किया  प्रश्न लाल होगा </li>
                </ul>

            <strong>Performance</strong>

        </p>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              <a href="weeklyTestQuestion.php?examcode='.$rows["examName"].'&title='. $title.'&clock='.$clock .' " >
                                              <button type="button" class="btn btn-primary">Start Test</button></a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>';-->*/
                                       
                                       $i++;
                                     }
                          
                           
                              ?>

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
<div class="panel panel-info">
<div class="panel-heading"><h3> Like us on Fb</h3></div>
<div class="panel-body">
<div class="fb-page" data-href="https://www.facebook.com/09realdream/" data-width="300" data-height="100" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/09realdream/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/09realdream/">Real Dream</a></blockquote></div>

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