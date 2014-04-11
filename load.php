<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="load.css" />
	</head>
<body>
	<div id="search">
		<form id="videosearch" method="POST" action="">
			<input type="text" class="textinput" name="q" size="50" maxlength="120">
			<input type="submit" value="search" class="searchbutton">
		</form>
		<div class="tfclear"></div>
	</div>

	<?php include 'abc.php';?>
	<div class="try">
	<?php
	$x = 0; 
	$data = getList();
	$count = count($data);
	$i = 0;
	while($i < $count && $i <50)
	{
		//echo $data[$i]->name;
		$str = "pic.jpg";
		echo'<div class="video">
		<a href="./watch.php?v='.$data[$i]->code.'"><img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail"></a><br>
		<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $data[$i]->name.'</b></a> <p>Upvotes:- ' .$data[$i]->upvotes. ' </p>

		<br>
	</div>';
		$i++;
	}
	/*<div class="video">
		<a href="www.youtube.com"><img src="pic.jpg" class="videopic" alt="Thumbnail"></a><br>
		<a href="www.youtube.com"><b>This is the video name</b></a>
		<br>
	</div>
	<div class="video">
		<a href="www.youtube.com"><img src="pic.jpg" class="videopic" alt="Thumbnail"></a><br>
		<a href="www.youtube.com"><b>This is the video name</b></a>
		<br>
	</div>
	<div class="video">
		<a href="www.youtube.com"><img src="pic.jpg" class="videopic" alt="Thumbnail"></a><br>
		<a href="www.youtube.com"><b>This is the video name</b></a>
		<br>
	</div>


	<div class="video">
		<a href="www.youtube.com"><img src="pic.jpg" class="videopic" alt="Thumbnail"></a><br>
		<a href="www.youtube.com"><b>This is the video name</b></a>
		<br>
	</div>
	<div class="video">
		<a href="www.youtube.com"><img src="pic.jpg" class="videopic" alt="Thumbnail"></a><br>
		<a href="www.youtube.com"><b>This is the video name</b></a>
		<br>
	</div>
	<div class="video">
		<a href="www.youtube.com"><img src="pic.jpg" class="videopic" alt="Thumbnail"></a><br>
		<a href="www.youtube.com"><b>This is the video name</b></a>
		<br>
	</div>*/
?>
</div>

</body>
</html>