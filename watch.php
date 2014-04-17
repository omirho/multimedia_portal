<?php
	/*if(!isset($_SESSION['userid']))
	{
		header('Location: login.php');
	}
	else
	{
		session_start();
		$userid = $_SESSION['userid'];
	}*/
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
	<!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="js/jquery-2.1.0.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	
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
					if(data == "Success")
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
						$("#cd").val("Enter Comment Here..!");
					}
				});
			}
		});
		$("#cd").click(function(){
			var abcdef = $("#cd").val();
			if(abcdef == "Enter Comment Here..!" )
				$("#cd").val("");
		});
		$("#li").click(function(){
			ll = $("#lv").val();
			$.post("test1.php",
		  	{
		    	type:"videos",
		    	value: 1,
		    	v: vv,
		    	language: lang,
				tag: tagg
		  	},
		  	function(data,status){
		    	if(data == "Success")
		    	{
		    		alert(data);
		    		$("#li").attr('disabled',true);
		    		$("#dli").attr('disabled',false);
		    		var lik = Number($("#likes").html());
		    		var dlik = Number($("#dislikes").html());
		    		//alert(lik, dlik);
		    		$("#likes").html(lik+1);
		    		if(ll != 0)
		    			$("#dislikes").html(dlik-1);
		    		else
		    		{
		    			$("#lv").val("1");
		    		}
		    	}
		  	});
		});
		$("#dli").click(function(){
			ll = $("#lv").val();
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
		    		//alert(lik, dlik);
		    		if(ll !=0 )
		    			$("#likes").html(lik-1);
		    		else
		    		{
		    			$("#lv").val("-1");
		    		}
		    		$("#dislikes").html(dlik+1);
		    	}
		  	});
		});
		$( "#search_bar" ).autocomplete({
      source: function(request,response){
	            $.ajax({
	                url: "suggest.php",
	                dataType: "json",
	                type: "GET",
	                data: {query : request.term},
	                success: function(response_data){
	                    response(response_data);
                	}
            	});
       		}
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
	<style type="text/css">
	#comment{
		width:100%;
		height:15%;
		position:relative;
		background-color:white;
		font-size:20px;
		font-family:'Freckle Face', cursive;

	}
	#butt{

		 left:5%;
		 top:75%;
		 height:80%;
		 position:absolute;
		 width:60%;
		 background-color:#EDEDE5;
		 font-size:40px;
		font-family:'Freckle Face', cursive;
	}
	#name{
		width:100%;
		left:0%;
		height:10%;
		position:absolute;
		top:0%;
		background-color:#EDEDE5;
		 font-size:40px;
		font-family:'Freckle Face', cursive;
	}
	#uploader{
		width:50%;
		left:0%;
		height:10%;
		position:absolute;
		top:10%;
		text-align: center;
		font-size:30px;
		font-family:'Freckle Face', cursive;
	}
	#views{
		 width:20%;
		 left:60%;
		 height:10%;
		 position:absolute;
		 top:10%;
		 font-size:20px;
		font-family:'Freckle Face', cursive;
		text-align: center;
	}
	#likes{
	width:19%;
	left:60%;
	height:10%;
	position:absolute;
	top:20%;
	 font-size:20px;
		font-family:'Freckle Face', cursive;
		text-align: center;

	}
	#dislikes{
	width:22%;
	left:79%;
	height:10%;
	position:absolute;
	top:20%;
	font-size:20px;
	font-family:'Freckle Face', cursive;
		text-align: center;
	}
	#download{
		width:100%;
		left:0%;
		height:10%;
		position:absolute;
		top:30%;
		font-size:40px;
		font-family:'Freckle Face', cursive;
		text-align: center;
		background-color: #EDEDE5;

	}
	#comments{
		width:100%;
		left:0%;
		height:5%;
		position:absolute;
		top:40%;
		font-family:'Freckle Face', cursive;
		
	}
	#cd{
		top:50%;
		position:absolute;
		left:10%;
		width:80%;
		height:10%;
		font-family:'Freckle Face', cursive;
		
	}
	#sc{
		top:63%;
		position:absolute;
		left:70%;
		width:10%;
		height:5%;
		font-family:'Freckle Face', cursive;
		
	}
	#list{
		width:100%;
		position:relative;
		top:70%;
		height:100%;
	}
	#recommendations{
		left:70%;
		top:75%;
		height:80%;
		position:absolute;
		width:20%;
		background-color:#EDEDE5;;
	}
	#comment{
		width:100%;
		height:15%;
		position:relative;
	}
	#username{
		width:100%;
		left:0%;
		height:30%;
		position:absolute;
		font-size: 18px;
		top:0%;
		/*background-color:red;*/
	}
	#text{
		 width:100%;
		 left:0%;
		 height:70%;
		 position:absolute;
		 top:30%;
		 font-size: 15px;
		 /*background-color:blue*/
	}
	#li{
	width:20%;
	left:10%;
	height:50%;
	position: absolute;
	/*appearance:button;
	-moz-appearance:button; 
	-webkit-appearance:button;*/
	top:30%;
	 font-size:10px;
		font-family:'Freckle Face', cursive;
		text-align: center;

	}
	#dli{
		width:20%;
	left:40%;
	/*appearance:button;
	-moz-appearance:button;  
	-webkit-appearance:button;*/
	height:50%;
	position:absolute;
	top:30%;
	 font-size:10px;
		font-family:'Freckle Face', cursive;
		text-align: center;

	}
	#down{
		width:20%;
	left:70%;
	height:50%;
	position:absolute;
	top:30%;
	 font-size:10px;
		font-family:'Freckle Face', cursive;
		text-align: center;

	}
	}
	</style>
</head>
<body style="height:100%;width:100%;position:absolute;left:0%;top:0%;" >
	

<div id="bar" style="height:8%;width:100%;position:absolute;background-color:#006666;top:0%;left:0%;font-size:50px;font-family:'verdana';color:white;" >VIDEOS
<div id="homebutton" style="left:90%;position:absolute;top:7%;"><a href="main.php"><img src="images/homebutton.png" height="50%" width="50%"></a></div>
 <div id="searchwrap" >
 	<form action="search_vid.php" method="POST" name = "searchForm" >

                <input type="text" name = "query" id = 'search_bar' class="twitterStyleTextbox"  onfocus="if(this.value == 'Enter search here') this.value=''"
                        onblur="if(this.value =='') this.value='Enter search here'"
                        onblur="fill(this.value)" style="left:60%;width:16%;height:20%;top:20%;position:absolute;">
                <input type="submit" name="searchButton" class="button-search" value="search" style="left:76.5%;width:8%;height:28%;top:20%;position:absolute;" />
            </form>
 </div>       
	<!-- <div style="left:76.5%;width:8%;height:32%;top:20%;position:absolute;"><a href="advan_UI.php">Advanced Search</a></div> -->

 <div id="options" style="left:25%;width:30%;height:30%;top:20%;position:absolute;float:left;">
 	<div id="menu"  style="left:0%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick="$('#entertainment').slideDown('slow');" >Entertainment</div>
 	<div id="menu"  style="left:30%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick ="$('#sports').slideDown('slow');">Sports</div>
 	<div id="menu" style="left:40%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick="$('#education').slideDown('slow');">Education</div>
 	<div id="menu" style="left:60%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick ="$('#language').slideDown('slow');">Language</div>
 </div>
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


<div id="butt">
<?php echo'<input id="tagg" type="hidden" value="'.$row['tag'].'" ><input id="lang" type="hidden" value="'.$row['language'].'" ><input id="use" type="hidden" value="'.$userid.'" ><input id="lv" type="hidden" value="'.$likeval.'" ><input id="vl" type="hidden" value="'.$v.'" >
<div id="name" >'.$row['name'].'</div>
<div id="uploader" >'.$row1['name'].' ( '.$row['userid'].' )</div>
<div id="views">Views:'.($row['views']+1).'</div>
<div id="likes" >'.$row['upvotes'].'</div>
<div id="dislikes" >'.$row['downvotes'].'</div>
<div id="download" >
	<button id="li">Upvote!</button>
	<button id="dli">Downvote!</button>
	<a href="videos/'.$row['hash'].'.'.$row['extention'].'" download="'.$row['name'].' - OsHelf.com"><button id="down">Download Me!</button></a>
</div>
<div id="comments" >Comments</div>
<textarea id="cd" rows="4" cols="50" >Enter Comment Here..!</textarea>
<button id="sc" >Submit</button>
<div id="list" >';
$data2 = new MySQL();
$abc2 = array("code"=>$v,"type"=>"videos");
$row2 = $data2->Select("comments",$abc2,"time DESC");
if($data2->records>0)
{
	if($data2->records==1)
	{
		echo '<div id="comment">
		<div id="username" >'.$row2['userid'].'</div>
		<div id="text">'.$row2['description'].'</div>
		</div>
		<br>';
	}
	else
	{
		for ($i = 0; $i < $data2->records; $i++)
		{
			echo '<div id="comment" >
			<div id="username" >'.$row2[$i]['userid'].'</div>
			<div id="text" >'.$row2[$i]['description'].'</div>
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
<div id="recommendations" >
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
<div id="entertainment" style="left:25%;width:10%;height:20%;top:11%;position:absolute;background-color:#006666;font-family:'verdana';color:white;display:none;" onmouseup="$('#entertainment').slideUp('slow');">
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="comedy">Comedy scenes<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="movies">Movies<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="songs">Songs<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="sports">Sports<br>
</div>
<div id="sports" style="left:37%;width:10%;height:20%;top:11%;position:absolute;background-color:#006666;display:none;font-family:'verdana';color:white;" onmouseup="$('#sports').slideUp('slow');">
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="comedy">Football<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="movies">Cricket<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="songs">Tennis<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="sports">Badminton<br>
</div>
<div id="education" style="left:43%;width:10%;height:20%;top:11%;position:absolute;background-color:#006666;display:none;font-family:'verdana';color:white;" onmouseup="$('#education').slideUp('slow');">
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="comedy">Tutorials<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="movies">Lectures<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="songs">Problems<br>
	<input type="checkbox" name="checkboxarray[]" onchange = "searchSelector()" value="sports">Solutions<br>
</div>
<div id="language" style="left:52%;width:10%;height:20%;top:11%;position:absolute;background-color:#006666;display:none;font-family:'verdana';color:white;" onmouseup="$('#language').slideUp('slow');">
	<input type="checkbox" name="languagearray[]" onchange = "searchSelector()" value="comedy">English<br>
	<input type="checkbox" name="languagearray[]" onchange = "searchSelector()" value="movies">Hindi<br>
	<input type="checkbox" name="languagearray[]" onchange = "searchSelector()" value="songs">Telugu<br>
	<input type="checkbox" name="languagearray[]" onchange = "searchSelector()" value="sports">Japanese<br>
</div>
</body>
</html>