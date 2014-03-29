<?php
$con=mysqli_connect("localhost","root","","software");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_close($con);
?> 


<!DOCTYPE html PUBLIC "Online Multimedia Portal">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Online Multimedia Portal</title>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" />
  
	<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.backgroundPosition.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/startstop-slider.js"></script>
	<script type="text/javascript">
		$(function(){
		
		  $('#midground').css({backgroundPosition: '0px 0px'});
		  $('#foreground').css({backgroundPosition: '0px 0px'});
		  $('#background').css({backgroundPosition: '0px 0px'});
		
			$('#midground').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 240000, 'linear');
			
			$('#foreground').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 120000, 'linear');
			
			$('#background').animate({
				backgroundPosition:"(-10000px -2000px)"
			}, 480000, 'linear');
			
		});
	</script>
	
</head>

<body>

    <div id="background"></div>
	<div id="midground"></div>
	<div id="foreground"></div>
	
	<div id="page-wrap">
		
		<h1 id="main_heading">Online Multimedia Portal</h1>
		<div id='cssmenu'>
			<ul>
			<li><a href='#'><span>Home</span></a></li>
			<li><a href='video/index.php'><span>Videos</span></a></li>
			<li><a href='gallery/index.html'><span>Images</span></a></li>
			<li><a href='audio/index.php'><span>Audio / Mp3</span></a></li>
			<li><a href='#'><span>Ebooks</span></a></li>
			<li><a href='#'><span>Flash greetings</span></a></li>
			<li><a href='#'><span>Contact us</span></a></li>
			</ul>
		</div>
		<div>
			<form id="login_form" class="center_form" method="post" action="login.php">
			<table class="login_table" >
				<tr>
					<td id="sign_in">Sign in</td>
				</tr>
				<tr>
					<td id="user_nm1">Username :</td> 
					<td><input type="text" id="user_nm" name="user_nm"></td>
				</tr>
				<br>
				
				<tr>
					<td id="pass1">Password :</td>
					<td><input type="password" id="pass" name="pass"></td>
				</tr>
				<tr>
					<td><br></td>
					<td><br></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="image" src="images/send-button.jpg" name="submit" id="submit_1" value="Submit" class="submit-button"></td>
				</tr>
				<tr>
					<td><br></td>
					<td id="forget_pass"><a href="forget_password.php">Forget paasword</a> / <a href="signup.php">Signup</a> / <a href="ContactForm/index.html">Contact us</a></td>
				</tr>
				<br>
			</table>
			</form>
		</div>
	</div>

</body>

</html>