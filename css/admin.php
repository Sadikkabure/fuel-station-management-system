
<?php
session_start();

if(isset($_POST['submit'])){
 require "dbcon.php";
$email=mysqli_real_escape_string($connect,$_POST['email']);
$password=($_POST['password']);
$password=mysqli_real_escape_string($connect,$password);
$query = "SELECT * FROM admin where email='$email' AND password='$password'";
	$user= mysqli_query($connect,$query);
	$user_no=mysqli_num_rows($user);
	if($user_no==1){
	$user_data = mysqli_fetch_array($user);
	
	$_SESSION['data']=$email;
header("location:ahome.php");
die();
	}
else {
 $error = "Check your Login details";
	} 	
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	 <link rel="stylesheet" href="css/font-awesome.min.css">
<title>Login </title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="css/admin.css" type="text/css" media="all" /> 
<link rel="stylesheet" href="css/font-awesome.css"> 

</head>
<body>
<div class="center-container">

	<div class="header-w3l">
		<h1>Admin Login</h1>
	</div>

	<div class="main-content-agile">
		<div class="sub-main-w3">	
			<div class="wthree-pro">
				<h2>Enter Login Details</h2>
              <h5 style="color:yellow;" align="center"><b> <?php  if(isset($error)) echo $error;  ?></b> </h5> 
			</div>
			<form  method="post">
				<div class="pom-agile">
					<input placeholder="E-mail" name="email" class="user" type="email" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
				</div>
                
				<div class="pom-agile">
					<input  placeholder="Password" name="password" class="pass" type="password" required="">
					<span class="icon2"><i class="fa fa-key" aria-hidden="true"></i></span>
				</div>
				<div class="sub-w3l">
				
					<div class="right-w3l">
						<input type="submit" name="submit" value="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
	
</div>
</body>
</html>