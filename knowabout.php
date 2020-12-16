<?php 
include'pagination.php';
require'header.php';
?>
 <script>
$(document).ready(function(){
  $("#faq1").click(function(i){
    $("#faqa1").fadeToggle("slow");
  });
  $("#faq2").click(function(i){
    $("#faqa2").fadeToggle("slow");
  });
  $("#faq3").click(function(i){
    $("#faqa3").fadeToggle("slow");
  });
  $("#faq4").click(function(i){
    $("#faqa4").fadeToggle("slow");
  });
  $("#faq5").click(function(i){
    $("#faqa5").fadeToggle("slow");
  });
});
</script>
<style type=text/css>
      body{
        background:#fff;
      }
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


.faqa{
  display: none;
  visibility: hidden;
}
.signupbtn{
      margin: 20px 0;
    /* box-shadow: 0 0 1px 1px #00000045; */
    background: #2942ee;
    color: #fbf4f4;
    width: 95%;
    padding: 10px;
    border-radius: 10px;
    font-weight: 800;
    word-spacing: 2px;
    letter-spacing: 1.5px;
}
.faq, .about {
    /* border: .5px solid #00000073; */
    padding: 13px;
    border-radius: 14px;
    box-shadow: 0 0 6px 2px #0000003b;
}
</style>



     

  <body id="page-top" class="bdy">
	
    <?php require'nav.php'; ?>
<?php require'bodyheader.php'; ?>
     <h3 class="mnotice" style="background-color:#161717; color:white; font-family: sans-serif;"><marquee  onmouseover="this.stop();"
           onmouseout="this.start();"> <a href="signup.php" style="color: white;">Free registration now open you can Join us Now totally free.&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <span style="color:#f79605f5;">If you face any problem to accesss then contact us...&nbsp;&nbsp;</span>Thank You</marquee>
         </h3>

  
    </header> 
 <div class="container">
     <hr />
   <a href="/signup.php"  ><button class="signupbtn">GET STARTED NOW </button></a>
<div class="about">
    <h2>What is RealDream: </h2>
    <p>
      RealDream is an Education platform or <strong>Online Exam Portal </strong>.It provide you online exam/test service for govt jobs. We provide SSC, Bank, Railway and other states exam
      facility. Realdream provides all these services free of cost.
    </p>
    <h2>Why RealDream Stand: </h2>
    <p>
      Our motto is spread the knowledge to everyone. So every student would prepare well and get on service. <br>
      The student do hardwork but not in proper way. They prepare their self but due to lack of exam practice and time management they don't get there name in cutoff list.<br>
      Here, RealDream provide you all these services  without any charges. So, <b>RealDream is that weapon which help you to crack the exam.</b>
    </p>
      <h2>What type of exam </h2>
      <p>
        RealDream platform make availble short exam and full lenth/Mock Test. Short exam divided subject wise and Mock Test will be like Real Exam. Here we category the exam according to Job.<br>
        <stron><i>Time is worth</i></stron><br>
        So for a time managment when exam start there will be a timer that help you to manage the time 
      </p>
     </div>
   <a href="signup.php" > <button class="signupbtn">GET STARTED NOW </button></a>
   <hr />
      <div class="faq">
         
    <h1>Faq</h1> <hr />
      <h4 id="faq1">How can I take the Test?</h4>
      <p id="faqa1"  style="color:black; display: none;">You need register first, then you can take the test.
      </p>
      <h4 id="faq2">When can I take the test?</h4>
      <p id="faqa2"  style="color:black; display: none;">Anytime, you can take the test.
      </p>
      <h4  id="faq3">Is there any performance report for future?</h4>
      <p id="faqa3"  style="color:black; display: none;">Yes, you can check your performance anytime.
      </p>
      <h4  id="faq4">Would I have to pay for this Service?</h4>
      <p id="faqa4"  style="color:black; display: none;">No, RealDream provide a free Environment to the student.
      </p>
      <h4  id="faq5">Can I use mobile to take Test?</h4>
      <p id="faqa5"  style="color:black; display: none;">Absolutely, you can use RealDream in Mobile.
      </p>

    </div>
    <hr />
   </div>
<?php 
require'footer.php';
?>
