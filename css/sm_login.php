<?php
session_start();
if(isset($_POST['submit'])){
 require "dbcon.php";
$username=mysqli_real_escape_string($connect,$_POST['email']);
$password=mysqli_real_escape_string($connect,$_POST['password']);


$query = "SELECT * FROM stations where station_id='$username' AND password='" .md5($password)."'";
    $user= mysqli_query($connect,$query);
    $user_no=mysqli_num_rows($user);
    if($user_no==1){
    $user_data = mysqli_fetch_array($user);
    $_SESSION['station']=$username;
header("location:sm_login_home.php");
die();
    }
else {
 $error="Check your Login details";
    }
        

}


?>




<!DOCTYPE HTML>
<html lang="en">
<head>
<title>SM-Login </title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/form.css">
        <script src="js/modernizr-2.6.2.min.js"></script>
        <link rel="stylesheet" href="css/form-elements.css">
</head>
<body style="background-image: url('images/mt_1.jpg'); background-size: }">
<header class="main-header">    
        <nav class="navbar navbar-static-top">

            <div class="navbar-top">

              <div class="container-fluid">
                  <div class="row">

                    <div class="col-sm-12 col-xs-12 text-center">
                        <ul class="list-unstyled list-inline header-contact">
                                
                       </ul> 
                    </div>
                  </div>
              </div>
            </div>

            <div class="navbar-main">
              
              <div class="container-fluid">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                  </button>
                  
                       <h3> <span class="letter">KABURIYE & SONS NIG LTD</span><span></span></h3>
                 
                 
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a class="is-active"  href="sm_login.php">STATION MANAGER</a></li>
                  <li><a href="mm_login.php">MAINTENANCE MANAGER</a></li>
</ul>
                </div> 
              </div> 
              
            </div> 
        </nav> 

    </header> 
</div>
            <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h3><strong>STATION MANAGER </strong> </h3>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			
                            		<p align="center">Enter Login Details</p>
                                   <h5 align="center" style="color:red;"> <?php  if(isset($error)) echo $error;  ?></h5>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form"  method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="email" required placeholder="Station ID" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" required placeholder="Password" class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" name="submit"  class="btn2 form-control">Sign in!</button>  
			                    </form>
		                    </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            
        </div>


   







  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.1.min.js"><\/script>')</script>


<script src="js/scripts.js"></script>
 <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
