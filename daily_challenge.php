
	<style type="text/css">
	*{
		margin:0;
		padding: 0;

	}
	body{
		background-color: #ececec;		
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
	.btnl{
		float: right;
	    width: 90px;
	    text-transform: uppercase;
   		box-shadow: 0 0 20px 1px #000000e3;
	}
	.daily_ch h4 {
    
	    text-align: center;
	    letter-spacing: 2px;
	    word-spacing: 3px;
	    text-transform: uppercase;
	    font-family: cursive;
	}
	</style>
</head>
<body>
	<?php 
		#require '../conn.php';
		#require '../header.php';
		$date = date('dMy');
		$code = strtolower("daily$date");
		#echo $code;
		$sql = "SELECT * FROM weekteststatus where examName = '$code' and status = 1 ";
		$result=mysqli_query($conn,$sql);
		$num = mysqli_num_rows($result);
		if ($num > 0) {
		while ( $row = mysqli_fetch_assoc($result)) {
			$testno = $row['dcno'];
			$title_rec = $row['title'];
			$total = $row['total'];
			$time = $row['time']/60;
			#substr("$cod",0,7);
			//echo $testno;
		}
	 
	 ?>
	<div class="base">
		<div class="daily_ch">
			<h4><span class="text-center">Daily Challenge</span> <span class="chlng_nbr">#<?php echo $testno; ?></span></h4>
			
			<div class="chlng_content">
				<span>Date:<date><?php echo date("d-M-Y"); ?></date><span class="daily_ch_type">Type: Challenge</span></span><br>
				<span>Total: <?php echo $total; ?><span class="daily_ch_type">Time:<?php echo $time; ?> Min.</span></span>
			</div>
			<?php 
			$examlink = "questionpaper.php?examcode=$code&title=$title_rec";
				$cookie_name = "studentid";
				if(isset($_COOKIE[$cookie_name])) {

				   # $_SESSION['sid'] = $_COOKIE[$cookie_name];
					//echo "Value is: " . $_COOKIE[$cookie_name];
				
			echo '<a href="'.$examlink.'"><button class="btn btn-primary btnl">Start</button></a>';
			
				}
				else
					echo  ' <button type="button" class="btn btn-primary btn-lg btnl" id="myBtn">START</button>';
        
			?>
		</div>
	</div>
	
<?php } ?>
