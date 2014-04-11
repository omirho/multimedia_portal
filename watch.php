<?php require 'mysql/class.MySQL.php' ?>
<?php
	 if(isset ($_GET['v']))
	 {
	 	$v = $_GET["v"];
	 	//echo $v;
	 	$data = new MySQL();
	 	$abc = array("code"=>$v);
	 	$row = $data->Select("videos",$abc);
	 	//echo Count($row);
	 	//echo $data->records;
	 	//$count = 0;
	 	if($data->records == 1)
	 	{
	 		//echo "Fuck this";
	 		$vid = $row['hash'];
	 		$vide = $row['extention'];
	 	}
	 }
?>
<!DOCTYPE html5 PUBLIC "Online Multimedia Portal">
<html>
<head>
	<link href="video-js/video-js.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="video-js/video.js"></script>
	<script>
	  videojs.options.flash.swf = "video-js/video-js.swf"
	</script>
	<style type="text/css">
	#tabHeader_6{
	background: #FFFFFF; /* old browsers */
	background: -moz-linear-gradient(top, #FFFFFF 0%, #F3F3F3 10%, #F3F3F3 50%, #FFFFFF 100%); /* firefox */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FFFFFF), color-stop(10%,#F3F3F3), color-stop(50%,#F3F3F3), color-stop(100%,#FFFFFF)); /* webkit */
	cursor: pointer;
	color: #333;
	}
	
	</style>
</head>

<body>
	<div>
		<h1 id="main_heading">Online Multimedia Portal</h1>
	</div>
	<div id="videobox">
		<video id="video_1" class="video-js vjs-default-skin"
		  controls preload="auto" width="640" height="360"
		  data-setup='{"options":true}'
		  >
		  <?php
		 echo '<source src="videos/'.$vid.'.'.$vide.'" type="video/mp4" />';
		 ?>
		</video>
	</div>
	<br>
	<br>
	<section id="feedback_post"><section id="username_bar"><span id="post_name">pulkit.arora  </span>|<span id="post_roll">120101053</span><span id="idofpost">1</span></section>
	<div id="actual_post" class="wrap">Hello dude, how are you motherfucker...!</div></section>
</body>

</html>