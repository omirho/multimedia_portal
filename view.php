<?php require 'mysql/class.MySQL.php' ?>
<?php
	 if(isset ($_GET['v']) && !empty($_GET['v']))
	 {
	 	$v = $_GET["v"];
	 	//echo $v;
	 	$data = new MySQL();
	 	$abc = array("code"=>$v);
	 	$row = $data->Select("videos",$abc);
	 	if($data->records == 1)
	 	{
	 		$data1 = new MySQL();
		 	$abc1 = array("userid"=>$row['userid']);
		 	$row1 = $data1->Select("users",$abc1);
	 		$vid = $row['hash'];
	 		$vide = $row['extention'];
	 	}
	 	else
	 		header("Location: http://172.16.25.158/multimedia_portal/");
	 }
	 else
	 	header("Location: http://172.16.25.158/multimedia_portal/");
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<link href="video-js/video-js.css" rel="stylesheet">
	<script src="video-js/video.js"></script>
	<script>
	  videojs.options.flash.swf = "video-js/video-js.swf"
	</script>
	<title>fetch the video name</title>
</head>
<body style="height:100%;width:100%;position:absolute;left:0%;top:0%;" >

<div id="bar" style="height:15%;width:100%;position:absolute;background-color:#006666;top:5%;left:0%;font-size:50px;font-family:'verdana';color:white;" >VIDEOS
<div id="homebutton" style="left:90%;position:absolute;top:7%;"><a href="main.php"><img src="images/homebutton.png" height="50%" width="50%"></a></div>
</div>
<div id="videobox" style="left:15%;top:22%;height:70%;width:70%;position:absolute;">
	<video id="video_1" class="video-js vjs-default-skin vjs-big-play-centered"
		  controls preload="auto" width=100% height=100%
		  data-setup='{"options":true}'
		  >
		  <?php
		 echo '<source src="videos/'.$vid.'.'.$vide.'" type="video/mp4" />';
		 ?>
	</video>
</div>
<br>
<br>


<div id="butt" style="left:5%;top:95%;height:80%;position:absolute;width:60%;background-color:grey;">
<?php echo'<div id="name" style="width:100%;left:0%;height:10%;position:absolute;top:0%;background-color:red;">'.$row['name'].'</div>
<div id="uploader" style="width:30%;left:0%;height:10%;position:absolute;top:10%;background-color:blue;">'.$row1['name'].' ( '.$row['userid'].' )</div>
<div id="views" style="width:30%;left:60%;height:10%;position:absolute;top:10%;">'.$row['views'].'</div>
<div id="likes" style="width:20%;left:60%;height:10%;position:absolute;top:20%;background-color:violet;">likes</div>
<div id="dislikes" style="width:20%;left:80%;height:10%;position:absolute;top:20%;background-color:green;">dislikes</div>
<div id="download" style="width:20%;left:5%;height:10%;position:absolute;top:30%;background-color:white">downlad - onclick funtion call</div>
<div id="comments" style="width:100%;left:0%;height:5%;position:absolute;top:40%;background-color:lightblue">Comments</div>
<div id="comment" style="width:100%;left:0%;height:15%;position:absolute;top:50%;background-color:blue">
<div id="username" style="width:100%;left:0%;height:30%;position:absolute;top:0%;background-color:red">name</div>
<div id="text" style="width:100%;left:0%;height:70%;position:absolute;top:30%;background-color:blue">text</div>
</div>


 </div>
<div id="recommendations" style="left:70%;top:95%;height:80%;position:absolute;width:20%;background-color:yellow;">recommendations</div>'
?>
</body>
</html>