	<style type="text/css">
        .logbox0{
            margin-left: 40%;
        } 
       
@media only screen and (max-width: 310px) {
  
    .header0{
          margin-top:21%;
          background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -83px;
    
          }
           
}@media only screen and (min-width: 311px) {
  
    .header0{
          margin-top:20%;
          background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -80px;
    
          }
          .logbox0{
            margin-left: 40%;
            margin-top: -45px;
        } 
}@media only screen and (min-width: 320px) {
  
    .header0{
          margin-top:20%;
          background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -80px;
    
          }
      .mnotice {
                margin-top: 30px;
            }
      .logbox0{
        margin-left: 40%;
        margin-top: -45px;
    } 
}@media only screen and (min-width: 340px) {
  
    .header0{
          margin-top:12%; background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -50px;
    
          } 
      .mnotice {
            margin-top: 50px;
        }
      .logbox0{
        margin-left: 40%;
        margin-top: -45px;
    } 

}@media only screen and (min-width: 375px) {
  
    .header0{
          margin-top:17%; background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -50px;
    
          } 
      .mnotice {
            margin-top: 60px;
        }
      .logbox0{
        margin-left: 40%;
        margin-top: -45px;
    } 

}@media only screen and (min-width: 394px) {
  
    .header0{
          margin-top:17%; background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -50px;
          margin-top: 60px;
    
          } 
      .mnotice {
            margin-top:70px;
        }
      .logbox0{
        margin-left: 40%;
        margin-top: -45px;
    } @media only screen and (min-width: 414px) {
  
    .header0{
          margin-top:17%; background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -50px;
          margin-top: 60px;
    
          } 
      .mnotice {
            margin-top:84px;
        }
      .logbox0{
        margin-left: 40%;
        margin-top: -45px;
    } 
}@media only screen and (min-width: 420px) {
  
    .header0{
          margin-top:15%;
          background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -35px;
          
    
          }
      .mnotice {
          margin-top: 88px;
           
        }
}
@media only screen and (min-width: 450px) {
  
    .header0{
          margin-top:15%;
          background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -35px;
          margin-top: 60px;
    
          }
      .mnotice {
          margin-top: 105px;
           
        }
}@media only screen and (min-width: 490px) {
  
    .header0{
          margin-top:15%;
          background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -35px;
          margin-top: 60px;
    
          }
      .mnotice {
          margin-top: 125px;
           
        }
}
}@media only screen and (min-width: 526px) {
  
    .header0{
          margin-top:15%;
          background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -35px;
          margin-top: 88px;
    
          }
      .mnotice {
          margin-top: 145px;
           
        }
}@media only screen and (min-width: 566px) {
  
    .header0{
          margin-top:15%;
          background:url(images/bg1.jpg) no-repeat;
          background-size: 100%;
          margin-bottom: -35px;
          margin-top: 88px;
    
          }
      .mnotice {
          margin-top: 166px;
           
        }
}
@media only screen and (min-width: 700px) {
  
    .header0{
          
          background:red;
          height:200px;
          width:100%;
          margin-top:20px;
          margin-bottom:50px;
          
         
    
          }
      .mnotice {
              margin-top: 80px;
              position: relative;
           
        }
         .logbox0{
       
    } 
}
/*@media only screen and (min-width: 700px) {
  
    .header0{
          
         bacground:#e400ff8a;
         margin-top: 0;
    
    }

     img {
          max-width: 100%;
          height: auto;
        }*/
    </style>
    <header class="header0 text-white" style="">
          <!--img src="images/bg1.jpg" width="1360px" style="position: absolute; z-index: -1;  top: 60px;" /--> 
             <div class="container text-center">
      
    <?php if(!empty($sid))
            {
                echo "<span ><h1><b>".$name."</b></h1></span>";
            }
            ?>
      
        
        <?php
           
            if(empty($sid))
            {
                echo'<div class="logbox0" ><a href="signup.php">	<button class="btn btn-success" style="width:30%">Sign Up</button> </a>
            	  <a href="login.php">	<button class="btn btn-info">Test Now</button> </a></div>';
          }
        ?>
	 </div>