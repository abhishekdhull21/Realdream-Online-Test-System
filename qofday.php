
<!DOCTYPE html>
<html>
<head>
	<title>RealDream Question Of The Day</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<style type="text/css">
			#qday
			{
				font-family: sans-serif;
				text-align: center;
				font-size: 32px;
				color: #f10;
				text-decoration: bold;
			}
			body 
			{

				background-image: url('image/images.jpg');
				margin: 0px;
				padding: 0px;
			}
			.btn
			{
				background-color: grey ;
				color: white;
				width: 100%;
				
			}
			.btn:hover{
				color: gray;
				font-size: 30px;
				background-color: lightblue ; 
				width: 100%;
			}
			.card{
				width: 50%;
				margin-left: 25%;
				margin-top: 7%;
				align-content: center;
				align-self: center;
				border: 6px solid #007F7FAA;

			
				animation-name: bord;
			    animation-duration: 1s;
			    animation-iteration-count: infinite;
			}
			@-webkit-keyframes bord {
		    0%   {border-color:#00FFBB80; }
		    25%  {border-color:#D18E5A9F; }
		    50%  {border-color:#004A7F80; }
		    75%  {border-color:#C2270080;}
		    100% {border-color:#007F7F80; }
		}
		#  .rslt {
			display: show;
			font-size: 32px;
			color: red;
			top: 0;
			left: 0;
			text-align: center;
			text-decoration: bold;
			position: absolute;
		}
		#chk{
			position: relative;

		}
		#showrslt{
			display: none;
			position: absolute;
			top: 0;
			left: 0;
			
			padding:6px;
			color: black;
			background-color: #8d87a9;
			width : 100%;
			height: 100%;


		}
		#cls{
			float: right;
		}
		#main{
			width: 100%;
			min-height: 100%;
			position: relative;
		}
		*{
			margin: 0px;
			padding: 0px;
		}
		@media only screen and (max-width: 620px) {
    #showrslt {
        
        display: none;
			position: absolute;
			z-index: 0;
			margin-top:-100%;
			padding:4px;
			color: black;
			background-color: lightblue;
			width : 100%;
			min-height: 120%;

    }
   .card{
				width: 95%;
				margin-left: 2.5%;
				margin-top: 7%;
				align-content: center;
				align-self: center;
				border: 6px solid #007F7FAA;

			
				animation-name: bord;
			    animation-duration: 1s;
			    animation-iteration-count: infinite;
			}
			@-webkit-keyframes bord {
		    0%   {border-color:#00FFBB80; }
		    25%  {border-color:#D18E5A9F; }
		    50%  {border-color:#004A7F80; }
		    75%  {border-color:#C2270080;}
		    100% {border-color:#007F7F80; }
		} 	
}
		</style>
</head>
<body>
<?php
require_once'conn.php';
    $date = date("d M Y");
    $sql = "SELECT * FROM qofday where date = '$date' order by id desc";
 
    $query = mysqli_query($conn, $sql);  
     $num = mysqli_num_rows($query);
    
   if($num = 1)
    	
    while($crow = mysqli_fetch_array($query)){
			
	$qus = $crow['qus']; 
	$op1 = $crow['op1']; 
	$op2 = $crow['op2']; 
	$op3 = $crow['op3']; 
	$op4 = $crow['op4'];  
	$ryt = $crow['ryt']; 
 	$ex = $crow['explainqus']; 

	?>
	<div id="main">
	<div class="card">
		<div class="card-heading" id="qday">QUESTION OF THE DAY</div>
   		<div class="card-body">
    		<table class="table">
    
    			<tbody>
    				<form method="post" action="">
				       	 <tr class="table-secondary">
				        	<td><?php echo "Q : &nbsp;&nbsp;" .$qus; ?></td>
				     	 </tr> 
					      <tr class="table-warning">
					        <td id="ans1">(a)&nbsp;<input type="radio" name="qus" id="ans_1" value="1" ><?php echo"&nbsp;". $op1; ?></td>
					       
					      </tr>
					      <tr class="table-success">
					        <td id="ans2">(b)&nbsp;<input type="radio" name="qus" id="ans_2" value="2" ><?php echo "&nbsp;". $op2; ?></td>
					      </tr>
					      <tr class="table-danger">
				         	 <td id="ans3">(c)&nbsp;<input type="radio" name="qus" id="ans_3" value="3" ><?php echo"&nbsp;". $op3; ?></td>
				           </tr>
					      <tr class="table-info">
					      	<td id="ans4">(d)&nbsp;<input type="radio" name="qus" id="ans_4" value="4" > <?php echo"&nbsp;". $op4; ?></td>
					      </tr>
					      <input type="radio" name="qus" id="empty" value="0" checked hidden /> 
					      <tr>
					      	<td><input type="submit" name="submit" class="btn" value="Submit"></td>
					      </tr>
    				 </form>
     						
    			</tbody>
  			</table><button name="chk" class="btn btn-success" id="chk" >Check Answer</button>
 		</div>
	</div>
<div id="rslt">
<?php
 if (isset($_POST['submit'])) {
 	if ($_POST['qus'] == $ryt) {
 		echo "<script>
          alert('Great, You answered Right');
 		</script>";
 	}
 	else{
 		echo "<script>
			alert('You answered wrong please check Result');
 		</script>";
 		
 	
 	}
 }
 ?>
</div>

<div id="showrslt">
	<?php if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
	}
	echo date(" H:i A  d M y"); ?><button id="cls">close</button>
	<hr>
	<CENTER><h1 style="color: white"> QUESTION OF THE DAY SOLUTION</h1></CENTER><br><br>
	<?php 
		echo "<h3>". $qus."</h2><br>
		<p>Explanation: <hr>".$ex."<p><br><br>";


	 ?><hr />
	 <button id="cls1">close</button>
</div>

<script>
	$(document).ready(function(){
     
      $("#ans3").click(function(){
      	$("#ans_3").attr('checked', true)
      });
      $("#ans4").click(function(){
      	$("#ans_4").attr('checked', true)
      });
       $("#ans1").click(function(){
      	$("#ans_1").attr('checked', true)
      });
      $("#ans2").click(function(){
      	$("#ans_2").attr('checked', true)
      });
      $("#chk").click(function(){
      	$("#showrslt").show()

      });
      $("#cls").click(function(){
      	$("#showrslt").hide()

      });
      $("#cls1").click(function(){
      	$("#showrslt").hide()

      });
	});
</script>
</div>
<?php } ?>
</body>
</html>