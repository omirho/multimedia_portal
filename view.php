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
		 	$data3 = new MySQL();
		 	$abc3 = array("views"=>($row['views']+1));
		 	$row3 = $data3->Update("videos",$abc3,$abc);
	 	}
	 	else
	 	{
	 		//header("Location: login.php");
	 		echo "Fuck this";
	 	}
	 }
	 else
 	{
 		//header("Location: login.php");
 		echo "Fuck You";
 	}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#li").click(function(){
			$.post("test1.php",
		  	{
		    	name:"Donald Duck",
		    	city:"Duckburg"
		  	},
		  	function(data,status){
		    	if(status == "success")
		    	{
		    		alert(data);
		    		$("#li").attr('disabled',true);
		    		$("#dli").attr('disabled',false);
		    	}
		  	});
		});
		$("#dli").click(function(){
			$.post("test1.php",
		  	{
		    	name:"DuckDonald",
		    	city:"Durg"
		  	},
		  	function(data,status){
		    	if(status == "success")
		    	{
		    		alert(data);
		    		$("#li").attr('disabled',false);
		    		$("#dli").attr('disabled',true);
		    	}
		  	});
		});
	});
	</script>
	<link href="video-js/video-js.css" rel="stylesheet">
	<script src="video-js/video.js"></script>
	<script>
	  videojs.options.flash.swf = "video-js/video-js.swf"
	</script>
	<title>fetch the video name</title>
</head>
<body style="height:100%;width:100%;position:absolute;left:0%;top:0%;" >

<div id="bar" style="height:8%;width:100%;position:absolute;background-color:#006666;top:0%;left:0%;font-size:50px;font-family:'verdana';color:white;" >VIDEOS
<div id="homebutton" style="left:90%;position:absolute;top:2%;"><a href="login.php"><img src="images/homebutton.png" height="50%" width="50%"></a></div>
</div>
<div id="videobox" style="left:15%;top:12%;height:60%;width:70%;position:absolute;">
	<video id="video_1" class="video-js vjs-default-skin vjs-big-play-centered"
		  controls preload="auto" width=100% height=100%
		  data-setup='{"options":true}'
		  >
		  <?php
		 echo '<source src="videos/'.$row['hash'].'.'.$row['extention'].'" type="video/mp4" />';
		 ?>
	</video>
</div>
<br>
<br>


<div id="butt" style="left:5%;top:75%;height:80%;position:absolute;width:60%;background-color:grey;">
<?php echo'<div id="name" style="width:100%;left:0%;height:10%;position:absolute;top:0%;background-color:red;">'.$row['name'].'</div>
<div id="uploader" style="width:30%;left:0%;height:10%;position:absolute;top:10%;background-color:blue;">'.$row1['name'].' ( '.$row['userid'].' )</div>
<div id="views" style="width:30%;left:60%;height:10%;position:absolute;top:10%;">'.($row['views']+1).'</div>
<div id="likes" style="width:20%;left:60%;height:10%;position:absolute;top:20%;background-color:violet;">'.$row['upvotes'].'</div>
<div id="dislikes" style="width:20%;left:80%;height:10%;position:absolute;top:20%;background-color:green;">'.$row['downvotes'].'</div>
<div id="download" style="width:30%;left:5%;height:10%;position:absolute;top:30%;background-color:white">
	<button id="li">Like Me!</button>
	<button id="dli">DisLike Me!</button>
	<button id="down">Download Me!</button>
</div>
<div id="comments" style="width:100%;left:0%;height:5%;position:absolute;top:40%;background-color:lightblue">Comments</div>
<textarea rows="4" cols="50" style="top:50%;position:absolute;left:10%;width:80%;height:10%">Enter Comment Here..!</textarea>
<button style="top:63%;position:absolute;left:70%;width:10%;height:5%">Submit</button>
<div id="list" style="width:100%;position:relative;top:70%;height:100%">';
$data2 = new MySQL();
$abc2 = array("code"=>$v,"type"=>"video");
$row2 = $data2->Select("comments",$abc2,"time DESC");
if($data2->records>0)
{
	if($data2->records==1)
	{
		echo '<div id="comment" style="width:100%;height:15%;position:relative;background-color:blue;">
		<div id="username" style="width:100%;left:0%;height:30%;position:absolute;top:0%;background-color:red">'.$row2['userid'].'</div>
		<div id="text" style="width:100%;left:0%;height:70%;position:absolute;top:30%;background-color:blue">'.$row2['description'].'</div>
		</div>
		<br>';
	}
	else
	{
		for ($i = 0; $i < $data2->records; $i++)
		{
			echo '<div id="comment" style="width:100%;height:15%;position:relative;background-color:blue;">
			<div id="username" style="width:100%;left:0%;height:30%;position:absolute;top:0%;background-color:red">'.$row2[$i]['userid'].'</div>
			<div id="text" style="width:100%;left:0%;height:70%;position:absolute;top:30%;background-color:blue">'.$row2[$i]['description'].'</div>
			</div>
			<br>';
		}
	}
}
else
{
	echo "<br>No Comments<br>";
}
echo '</div>

</div>
<div id="recommendations" style="left:70%;top:75%;height:80%;position:absolute;width:20%;background-color:yellow;">recommendations</div>';
?>
</body>
</html>