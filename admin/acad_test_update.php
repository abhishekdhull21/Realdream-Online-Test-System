<?php
include 'conn.php';

require 'navbar.php';

?>

<div class="container">
	<h2>Acadmic Exam Info</h2>
	<label>Exam Code</label><br>
	<input type="text" name="" id="examcode"><br><br>
	<label>Exam Title</label><br>
	<input type="text" name="" id="examname"><br><br>
	<label>Exam Time</label><br>
	<input type="number" name="" id="examtime"><br><br>
	<label>Exam Entry start(ddmmyyHHmin)</label><br>
	<input type="number" name="" id="startentry"><br><br>
	<label>Exam Entry End(in minutes)</label><br>
	<input type="number" name="" id="endentry"><br><br>
	<label>Total Question</label><br>
	<input type="number" name="" id="total_qus"><br><br>
	<label>+ve Mark</label><br>
	<input type="number" name="" value="1" id="pve"><br><br>
	<label>-ve Mark</label><br>
	<input type="number" name="" value="0" id="nve"><br><br>
	<label>Exam Status</label><br>
	<select id="status">
		<option value="0">Upcoming</option>
		<option value="1">Ongoing</option>
		<option value="2">Ended</option>
	</select>
	<br>
	<label>Exam Powered by:</label><br>
	<input type="text" name="" id="acad_name"><br><br>
	<input type="submit" name="" class="btn btn-primary" id="submit" onclick="fetchrecord()"><br>
	<div class="container-fluid" id="content"></div>
	
</div>
	<script type="text/javascript">
		 function fetchrecord() {
	    	var examcode=$('#examcode').val();
	    	console.log(examcode);
	    	var examname=$("#examname").val();
	    	var examtime=$("#examtime").val();
	    	var startentry=$("#startentry").val();
	    	var total_qus=$("#total_qus").val();
	    	var pve=$("#pve").val();
	    	var nve=$("#nve").val();
	    	var status=$("#status").val();
	    	var acad_name=$("#acad_name").val();
		    $.ajax({
		    	url:"acad_test_insert.php",
		    	method:"POST",
		    	data:{
		    		examcode:examcode,
		    		examname:examname,
		    		examtime:examtime,
		    		startentry:startentry,
		    		total_qus:total_qus,
		    		pve:pve,
		    		status:status,
		    		acad_name:acad_name


		    	},
		    	success:function(data)
                        {
                          $('#content').html(data);
                        }
		    });
		}
	      	</script>
	      	<div class="container-fluid" id="content"></div>