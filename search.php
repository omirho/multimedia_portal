<!DOCTYPE html>
<html>
<head>
	<title>Videos/Audio</title>
	<?php include 'searchFunctions.php';?>
</head>
<body style="height:100%;width:100%;position:absolute;left:0%;top:0%;">


<div id="bar" style="height:15%;width:100%;position:absolute;background-color:#006666;top:5%;left:0%;font-size:60px;font-family:'verdana';color:white;">VIDEOS
<div id="homebutton" style="left:90%;position:absolute;top:7%;"><a href="main.php"><img src="images/homebutton.png" height="50%" width="50%"></a></div>
</div>
<div id="menu" style="left:0%;top:22%;height:50%;background-color:#006666;width:20%;position:absolute;color:white;">
<a href="./videos.php?v=upvotes">	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:center;cursor:pointer;" onclick="">Upvotes</div></a>
<a href="./videos.php?v=recommendations">	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:green;text-align:center;cursor:pointer;" onclick="">Recommendations</div></a>
<a href="./videos.php?v=views">	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:center;cursor:pointer;" onclick="">Views</div></a>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:green;text-align:center;cursor:pointer;" onclick=""></div>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:center;cursor:pointer;" onclick=""></div>
</div>
<div id="background" style="left:20%;position:absolute;top:20%;width:80%;background-color:#EDEDE5;height:100%;">
	<div id="maincontent" style="left:10%;top:5%;width:80%;height:95%;position:relative;background-color:white;">
		<?php

			/*$data;
			$count = count($data);
			$i=0;
			while($i<$count)
			{
				echo '<div id="tr">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src="pic.jpg" class="pic" alt="Image pic"></a>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $data[$i]->name.'</b></a>
				';
			}*/

		?>
	</div>
</div>


</body>
</html>
