<?php 
include'pagination.php';
require'header.php';
?>

<style type=text/css>

.thoo {	font-family: "Comic Sans MS", cursive, sans-serif;'; }
     .modal-header {
        background-color: #5cb85c;
        color:white !important;
        text-align: center;
        font-size: 30px;
      }
      .modal-footer {
        background-color: #f9f9f9;
      }
      .modal-h3{
            margin-right: 45%;
    
      }
      .close{
    
      }

.btncls
{
  color:black;
  float:right;
}
.btnsub
{
  width: 100%;
  display: inline-block;
    height: auto;
    padding: 0;
    margin: 0;
    vertical-align: top;
    width: 100%;
    background-color: hotpink;
  //background-image: url("img/submit.png");
}
textarea {
  margin-top: 10px;
  margin-left: 70px;
  width: auto;
  height: 100px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;
}


textarea:focus {
    background: none repeat scroll 0 0 #FFFFFF;
    outline-width: 0;
}

</style>

<script language=javascript>
function show1()
{

document.getElementById("layer1").style.display='block';
document.getElementById("v1").style.display='block';
}

function hide1()
{


document.getElementById("layer1").style.display='none';
document.getElementById("v1").style.display='none';
}


</script>
 
     

  <body id="page-top" onload="show1();" class="bdy">
	
    <?php require'nav.php'; ?>
<?php require'bodyheader.php'; ?>
     <h3 class="mnotice" style="background-color:#161717; color:white; font-family: sans-serif;"><marquee  onmouseover="this.stop();"
           onmouseout="this.start();"> <a href="signup.php" style="color: white;">Free registration now open you can Join us Now totally free.&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <span style="color:#f79605f5;">If you face any problem to accesss then contact us...&nbsp;&nbsp;</span>Thank You</marquee>
         </h3>

  
    </header> 
   <div class="row" style="padding: 1vw;">

       

	<div class="col-md--12" ></div>
	<div  class="col-md-7" style="padding: 1vw;" >
	    <?php include 'daily_challenge.php'; ?>

      <div class="container">
  
              <!-- Trigger the modal with a button -->
             
            
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                     
                        <h3 class="modal-h3" ><span class="glyphicon glyphicon-lock"></span> Login</h3>
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                      <form role="form" method="post" action="actionl.php?ref=<?php echo $examlink;  ?> ">
                        <div class="form-group">
                          <label for="usrname"><span class="glyphicon glyphicon-user"></span> Number</label>
                          <input type="text" class="form-control" name="mobile" id="usrname" placeholder="Enter Mobile Number">
                        </div>
                        <div class="form-group">
                          <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                          <input type="password" class="form-control" name="password" id="psw" placeholder="Enter password">
                        </div>
                        
                          <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                         If not registered then<a href="signup.php" >
                        <button type="submit" style="margin-right: 4%" class="btn  btn-primary pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-log-in"></span> Register</button>
                         </a>
                          <button type="submit" style="margin-right: 45px" data-dismiss="modal" class="btn btn-danger btn-default pull-left" ><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                       
                    </div>
                  </div>
                  
                </div>
              </div> 
            </div>
            
              <script>
              $(document).ready(function(){
                $("#myBtn").click(function(){
                  $("#myModal").modal();
                });
              });
              </script>
	<div class="panel "  >
	<div class="panel-heading" style="color:white; font-size:28px; text-align:center; background-color: #337ab7;"><h3> Latest Updates</h3></div>
	
	<?php
	include'pagination.php';
	include'conn.php';
			while($crow = mysqli_fetch_array($nquery)){
	$heading = $crow['heading']; 
	$content = $crow['content']; 
	$pid = $crow['pid']; 
	$img = $crow['icon']; 
	 if ( $img == "" ) 
	{
		$defimg = "<img src=images/dca.jpg width=100% height=100px alt= img />";
	}
	else
	{
		$defimg = "<img src= image/$img width=110px height=100px alt= $img />";
	}
  
	$string = strip_tags($content);
	if (strlen($string) > 5) {

    // truncate string
    $stringCut = substr($string, 0, 1200);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
    $string .= "... <a href='postreader.php?postid=$pid'>Read More</a>";
	}
     
	echo "<div class='panel '>
  <div class='panel-heading' style='background-color:#2a17f7a1; color:#fff;'><a href='postreader.php?postid=$pid&post=$heading' >
  <span style='color:#fff; padding:0px;     font-weight: 500; font-size:25px'>".$heading."</span></div>
  <div class='panel-body'>
	<div class='row' > <div class='col-md-2'>".$defimg.
	"</a></div><div class='col-md-1' ></div><div class='col-md-8' >"
	.$string."</div></div></div></div>
</div><div>";
	}	

	?>
<div id="pagination_controls"><?php echo $paginationCtrls; ?></div>



  <hr />
  </div>
  </div>
  <!--Update Portion end--->
  <div class="col-md-4">
  <div>
				<!--Panel Start-->
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 style="color:white;"> Thought of the Moment</h3></div>
				<div class="panel-body">
					<?php
					$ran = (rand(1,6));
					//echo $ran;
					 $sqlcat = "SELECT * FROM thought where tid = $ran";
					 $resultcat = mysqli_query($conn, $sqlcat);
						while($rowcat = mysqli_fetch_assoc($resultcat))
						{
							$tho = $rowcat['tought'];
							echo "<blockquote><h4 class='thoo'>".$tho."</h4></blockquote><br />";
						}
					
					?>
				</div>
				<div class="panel-heading"><h3 style="color:white;"> Like us on Fb</h3></div>
				<div class="panel-body">
				<div class="fb-page" data-href="https://www.facebook.com/09realdream/" data-width="300" data-height="100" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/09realdream/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/09realdream/">Real Dream</a></blockquote></div>
				</div>
				
				<div class="panel-heading"><h3 style="color:white;"> Advirtisement</h3></div>
				<div class="panel-body">


				</div>
				</div>
  
  </div>
  </div>
  </div>
 
    
<?php 
require'footer.php';
?>
