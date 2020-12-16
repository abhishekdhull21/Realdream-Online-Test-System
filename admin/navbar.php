<?php
  require'class/classidu.php'; 
  session_start();
  $sid = $_SESSION['sid'];
  $sql = "SELECT * from admin where id = $sid";
  $result = $select->select($sql);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script> 
          <script src="media/js/jquery.dataTables.min.js"></script> 
		  <link href="media/css/jquery.dataTables.min.css" rel="stylesheet">
    <script>
     $(document).ready(function(){
	   $("#myTable").dataTable();
	 });
   
   </script>
</head>
<body>           
	
<nav class="navbar navbar-expand-sm bg-info navbar-dark">
  <ul class="navbar-nav">
       <li class="nav-item active">
      <a class="nav-link" href="admin.php" >Home</a>
    </li>
          <?php 
          if($result)
          {
            foreach ($result as  $value)
            {
              $role = $value['role'];
              
              if ($role == 'super_admin') {
                echo ' <li class="nav-item">
                          <a class="nav-link" href="usermng.php">User</a>
                        </li>';
              }
           }
          }
        ?>

    <li class="nav-item">
      <a class="nav-link" href="thoughtinput.php" >Thought</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="poster.php">Post</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="postdata.php">Post Info</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="examdata.php">Student Record</a>
    </li>
    
   
  
    
    <li class="nav-item">
      <a class="nav-link" href="weekQuestionmanager.php">Question Editor</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="weekTestAddQuestion.php">Week Test </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="usersugg.php">User Suggestion</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="todayrecord.php">Exam Record</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo ROOT.'..\weekTestStatus.php';?>">Week Status</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="#">Academy Corner</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="ROOT.'index.php'">Academy Result</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="logout.php">logout</a>
    </li>
    
  </ul>
</nav>		