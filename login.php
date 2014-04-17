<?php
	if(!isset($_SESSION['userid']))
	{
		if(isset($_COOKIE['userid']))
		{
			$userid = $_COOKIE['userid'];
			require 'mysql/class.MySQL.php';
			$data = new MySQL();
		 	$abc = array("userid"=>$userid);
		 	$row = $data->Select("users",$abc);
		 	if($data->records == 1)
		 	{
		 		session_start();
		 		$_SESSION['userid'] = $userid;
		 		$_SESSION['username'] = $row['name'];
		 		header('Location: videos.php');
		 	}
		}
	}
	else
	{
		header('Location: videos.php');
	}
?>
<!DOCTYPE>
<html>
<head>
<!-- add a favicon -->
<title>Login</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Metal+Mania' rel='stylesheet' type='text/css'>

</head>
<body style="height:100%;width:100%;position:absolute;left:0%;top:0%;">

<div id="loginpage" style="height:100%;width:100%;position:absolute;">

<div id="bar" style="height:15%;width:100%;position:absolute;background-color:#006666;top:5%;left:0%;font-family: 'Freckle Face', cursive;;font-size:75px;color:white;"> LOGIN 
<div id="homebutton" style="left:90%;position:absolute;top:7%;"><img src="images/homebutton.png" height="50%" width="50%"></div>
</div>

<div id="sideimage" style="left:50%;top:22%;position:absolute"><img src="images/loginicons.png" height="65%" width="65%"></div>



<div id="login" style="height:50%;width:20%;top:30%;left:10%;position:absolute;">
	

	<form action="input.php" method="post">
	
	<!-- taking username -->
	<div id="username" style="height:10%;top:10%;width:100%;position:absolute;font-family: 'Freckle Face', cursive;;font-size:20px;">
	 USERNAME
	 <br>
	 <input type="text" name="username" style="box-shadow:5px 5px 5px 2px grey;height:100%;position:relative;width:100%;border-radius:25px">
	</div>
	
	<!-- taking the password -->
	<div id="password" style="height:10%;top:37%;width:100%;position:absolute;font-family: 'Freckle Face', cursive;;font-size:20px;">
	 PASSWORD
	 <br>
	 <input type="password" name="password" style="box-shadow:5px 5px 5px 2px grey;height:100%;position:relative;width:100%;border-radius:25px;">
	 </div>
	
	<!-- submit button and the forgotpassword tab -->
	 <div id="submit" style="height:10%;top:68%;width:100%;position:absolute;font-family: 'Freckle Face', cursive;;">

	 	<input type="submit" value="Submit" style="box-shadow:5px 5px 5px 2px grey;height:100%;position:relative;font-family: 'Freckle Face', cursive;;width:50%;border-radius:25px;font-size:20px;">
	 	<br>
	 	<div id="forgot" style="float:right;"><a href="">Forgot Password?</a></div>
	 	<br>
	 	<div id="button" style="float:right;cursor:pointer" onclick="$('#registertab').fadeIn();" >Register</div>
	</div>
	</form>
	
</div>
</div>

<div id="registertab" style="height:60%;width:20%;background-color:#006666;bottom:20%;left:10%;position:fixed;display:none;font-family: 'Freckle Face', cursive;;box-shadow:5px 5px 5px 2px grey;color:white;">
	
 <div id="header" style="height:10%;width:100%;text-align:center;">
	CREATE A NEW ACCOUNT
	<div id="close" style="height:50%;width:5%;float:right;left:95%;top:0%;cursor:pointer;" onclick=""><img src="images/close1.png" height="30" width="30" onclick="$('#registertab').fadeOut();"></div>
	<br>
	Fields marked with an asterisk (*) are required.
	<br>
	<br>
	<br>
	<br>
 </div>
	<form id="detailsform" action="demo.asp">

	<div  style="text-align:center;height:5%;width:100%;">
	<input id="name" type="text" name="name" value="" style="box-shadow:5px 5px 5px 2px grey;height:5%;position:absolute;width:50%;top:20%;border-radius:25px;left:0%;font-family: 'Freckle Face', cursive;"></div>
	<br>
	<div style="text-align:center;height:5%;width:100%">
	<input type="text" name="username" value="USERNAME " style="box-shadow:5px 5px 5px 2px grey;height:5%;position:absolute;width:50%;border-radius:25px;left:0%;font-family: 'Freckle Face', cursive;top:30%"></div>
	<br>
	<div style="text-align:center;height:5%;width:100%">
	<input type="password" name="password" value="PASSWORD" style="box-shadow:5px 5px 5px 2px grey;height:5%;position:absolute;width:50%;border-radius:25px;left:0%;font-family: 'Freckle Face', cursive;top:40%"></div>
	<br>
	<div style="text-align:center;height:5%;width:100%">
	<input type="password" name="verifypassword" value="VERIFY PASSWORD" style="box-shadow:5px 5px 5px 2px grey;height:5%;position:absolute;width:50%;border-radius:25px;left:0%;font-family: 'Freckle Face', cursive;top:50%"></div>
	<br>
	<div style="text-align:center;height:5%;width:100%">
	 <input type="email" name="email" value="EMAIL" style="box-shadow:5px 5px 5px 2px grey;height:5%;position:absolute;width:50%;border-radius:25px;left:0%;font-family: 'Freckle Face', cursive;top:60%"></div>
	<br>
	<div style="text-align:center;height:5%;width:100%">
	 <input type="email" name="email" value="VERIFY EMAIL" style="box-shadow:5px 5px 5px 2px grey;height:5%;position:absolute;width:50%;border-radius:25px;left:0%;font-family: 'Freckle Face', cursive;top:70%"></div>
	<br>
	<div style="text-align:center;height:5%;width:100%"> 
	<input type="integer" name="mobile" value="MOBILE"style="box-shadow:5px 5px 5px 2px grey;height:5%;position:absolute;width:50%;border-radius:25px;left:0%;font-family: 'Freckle Face', cursive;top:80%"></div>
	<br>
	</form>
</div>
</body>
</html>