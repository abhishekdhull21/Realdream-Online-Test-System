<?php
include 'conn.php';
session_start();

$sid = $_SESSION['sid'];
if(!isset($sid))
{
  header('location:index.php');
}
require 'navbar.php';
if(isset($_GET['msg']))
{
    echo '<br><br><p style="color:green" >'.$_GET['msg'].'</p>';
}
?>
<style>
    #loadpic{
        display:none;
    }
</style>
<form action="postman.php" method="post">
    <input type="hidden" name="author" value = "<?php echo $sid; ?>" />
<h3>Enter Heading</h3>
<input id="" name="h1" required="" type="text" />

<h3>Enter image Name with type</h3>
<input type="text" id="" name="icon"  />
<h3>Enter Post Data</h3>
<textarea cols="120" name="postdata" placeholder="Enter Here Your Post" required="" rows="35" type="text"></textarea><br />
<br />
<input type="submit" id="loadpicbtn" class="btn btn-primary" value="POST"  />
<img id="loadpic" width="40px" height="40px" src="image/loading.gif">
</form>
   
      
    <script>
        CKEDITOR.replace('postdata');
        
            
         $(document).ready(function () {
       $('#loadpicbtn').click(function () {
         $(this).hide("slow","");  
         $('#loadpic').show();
       });
      
   });
    </script>
</body>
</html>