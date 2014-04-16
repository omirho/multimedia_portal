<?php
	//session_start();
	//$userid = $_SESSION["userid"];
	$userid = "pulkit.arora";
?>
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
		 	$data4 = new MySQL();
		 	$abc4 = array("code"=>$v,"type"=>"videos","userid"=>$userid);
		 	$row4 = $data4->Select("votes",$abc4);
		 	if($data4->records == 1)
		 		$likeval = $row4["vote"];
		 	else if($data4->records == 0)
		 		$likeval = 0;
	 	}
	 	else
	 	{
	 		header("Location: login.php");
	 	}
	 }
	 else
 	{
 		header("Location: login.php");
 	}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		var vv = $("#vl").val();
		var ll = $("#lv").val();
		var abcde = $("#use").val();
		var tagg = $("#tagg").val();
		var lang = $("#lang").val();
		//alert(abcde);
		if(ll == 1)
			$("#li").attr('disabled',true);
		else if(ll == -1)
			$("#dli").attr('disabled',true);
		$("#sc").click(function(){
			var comtext = $("#cd").val();
			if(comtext!=""){
				$.post("test2.php",
				{
					text: comtext,
					type: "videos",
					code: vv
				},
				function(data,status){
					if(status == "success")
					{
						alert(data);
						var commentlist = $("#list").html();
						var temp1 = '<div id="comment" style="width:100%;height:15%;position:relative;background-color:blue;"><div id="username" style="width:100%;left:0%;height:30%;position:absolute;top:0%;background-color:red">';
						var temp2 = '</div><div id="text" style="width:100%;left:0%;height:70%;position:absolute;top:30%;background-color:blue">';
						var temp3 = '</div></div><br>';
						//alert(commentlist);
						if(commentlist!="<br>No Comments<br>")
							var temp4 = temp1+abcde+temp2+comtext+temp3+commentlist;
						else
							var temp4 = temp1+$("#username").val()+temp2+comtext+temp3;
						$("#list").html(temp4);
						$("#cd").val = "Enter Comment Here!";
					}
				});
			}
		});
		$("#li").click(function(){
			$.post("test1.php",
		  	{
		    	type:"videos",
		    	value: 1,
		    	v: vv,
		    	language: lang,
				tag: tagg
		  	},
		  	function(data,status){
		    	if(status == "success")
		    	{
		    		alert(data);
		    		$("#li").attr('disabled',true);
		    		$("#dli").attr('disabled',false);
		    		var lik = Number($("#likes").html());
		    		var dlik = Number($("#dislikes").html());
		    		alert(lik, dlik);
		    		$("#likes").html(lik+1);
		    		if(ll != 0)
		    			$("#dislikes").html(dlik-1);
		    		else
		    		{
		    			$("#lv").attr("value","1");
		    		}
		    	}
		  	});
		});
		$("#dli").click(function(){
			$.post("test1.php",
		  	{
		    	type:"videos",
		    	value: -1,
		    	v: vv,
		    	language: lang,
				tag: tagg

		  	},
		  	function(data,status){
		    	if(data == "Success")
		    	{
		    		alert(data);
		    		$("#li").attr('disabled',false);
		    		$("#dli").attr('disabled',true);
		    		var lik = Number($("#likes").html());
		    		var dlik = Number($("#dislikes").html());
		    		alert(lik, dlik);
		    		if(ll !=0 )
		    			$("#likes").html(lik-1);
		    		else
		    		{
		    			$("#lv").attr("value","-1");
		    		}
		    		$("#dislikes").html(dlik+1);
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
	<?php echo'<title>'.$row["name"].'</title>';
	?>
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
<?php echo'<input id="tagg" type="hidden" value="'.$row['tag'].'" ><input id="lang" type="hidden" value="'.$row['language'].'" ><input id="use" type="hidden" value="'.$userid.'" ><input id="lv" type="hidden" value="'.$likeval.'" ><input id="vl" type="hidden" value="'.$v.'" ><div id="name" style="width:100%;left:0%;height:10%;position:absolute;top:0%;background-color:red;">'.$row['name'].'</div>
<div id="uploader" style="width:30%;left:0%;height:10%;position:absolute;top:10%;background-color:blue;">'.$row1['name'].' ( '.$row['userid'].' )</div>
<div id="views" style="width:30%;left:60%;height:10%;position:absolute;top:10%;">'.($row['views']+1).'</div>
<div id="likes" style="width:20%;left:60%;height:10%;position:absolute;top:20%;background-color:violet;">'.$row['upvotes'].'</div>
<div id="dislikes" style="width:20%;left:80%;height:10%;position:absolute;top:20%;background-color:green;">'.$row['downvotes'].'</div>
<div id="download" style="width:30%;left:5%;height:10%;position:absolute;top:30%;background-color:white">
	<button id="li">Upvote!</button>
	<button id="dli">Downvote!</button>
	<button id="down">Download Me!</button>
</div>
<div id="comments" style="width:100%;left:0%;height:5%;position:absolute;top:40%;background-color:lightblue">Comments</div>
<textarea id="cd" rows="4" cols="50" style="top:50%;position:absolute;left:10%;width:80%;height:10%">Enter Comment Here..!</textarea>
<button id="sc" style="top:63%;position:absolute;left:70%;width:10%;height:5%">Submit</button>
<div id="list" style="width:100%;position:relative;top:70%;height:100%">';
$data2 = new MySQL();
$abc2 = array("code"=>$v,"type"=>"videos");
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
<div id="recommendations" style="left:70%;top:75%;height:80%;position:absolute;width:20%;background-color:yellow;">
';
require 'recommendFunctions.php';
$str = "pic.jpg";
$data = "NULL";
$data = recommendations($userid);
$count = count($data);
$i=0;
if(is_array($data) == 1)
{
	while($i<8 && $i<$count){
		echo '<div class="video" >
			<a href="./watch.php?v='.$data[$i]->code.'"><img src= "' .$str. ' " alt = "Pic of video" class="videopic" style="height:125px;width:125px" alt="Thumbnail"></a><br>
			<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $data[$i]->name.'</b></a> <p>Upvotes:- ' .$data[$i]->upvotes. ' </p>

			<br>
			<br>
		</div>';
		$i++;
	}
}
else if($data == "NULL"){
	echo 'NO RESULTS FOUND';
}
/*else{
	echo  '<div class="video" >
			<a href="./watch.php?v='.$data->code.'"><img src= "' .$str. ' " alt = "Pic of video" class="videopic" style="height:125px;width:125px" alt="Thumbnail"></a><br>
			<a href="./watch.php?v='.$data->code.'"><b>' . $data->name.'</b></a> <p>Upvotes:- ' .$data->upvotes. ' </p>

			<br>
			<br>
		</div>';
}*/
echo '</div>';
?>
</body>
</html>