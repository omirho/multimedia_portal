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
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Videos/Audio</title>
	<link rel="stylesheet" type="text/css" href="load.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
            /*function suggest()
            {
                try
                {
                    var query = document.getElementById("searchBox").value;
                    //document.write(query);
                    var xmlhttp;
                    
                    if (window.XMLHttpRequest)
                    {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    }
                    else
                    {// code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    
                    var url = "suggest.php";
                    var params = "query="+query;
                    xmlhttp.open("POST", url, true);
                    //Send the proper header information along with the request
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.setRequestHeader("Content-length", params.length);
                    xmlhttp.setRequestHeader("Connection", "close");
                    
                    xmlhttp.onreadystatechange=function()
                    {
                    	document.getElementById("status").innerHTML=xmlhttp.status;

                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            document.getElementById("maincontent").innerHTML=xmlhttp.responseText;
                        }
                    }
                    xmlhttp.send(params);
                }
                catch(err)
                {
                    alert(err);
                }
            }

            function incrementFrequency()
            {
                try
                {
                    var query = document.getElementById("searchBox").value;
                    if ( query == "" || query == "Enter search here" )
                        return;

                    //document.write(query);
                    var xmlhttp;
                    
                    if (window.XMLHttpRequest)
                    {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                    }
                    else
                    {// code for IE6, IE5
                        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    
                    var url = "incrementFrequency.php";
                    var params = "query="+query;
                    xmlhttp.open("POST", url, true);

                    xmlhttp.send(params);
                    //Send the proper header information along with the request
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.setRequestHeader("Content-length", params.length);
                    xmlhttp.setRequestHeader("Connection", "close");
                    
                    xmlhttp.onreadystatechange=function()
                    {
                        document.getElementById("results").innerHTML = xmlhttp.status;
                        if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                            document.getElementById("results").innerHTML += xmlhttp.responseText;
                        }
                    }
                }
                catch(err)
                {
                    alert(err);
                }
            }


            function fill(value)
            {
                document.getElementById("searchBox").value = value;
            }*/
            $(function() {
    
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


</head>
<body style="height:100%;width:100%;position:absolute;left:0%;top:0%;" >

<div id="bar" style="height:15%;width:100%;position:absolute;background-color:#006666;top:5%;left:0%;font-size:50px;font-family:'verdana';color:white;" ><a href="./videos.php">VIDEOS</a>
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
	<?php
		if(isset($_GET["v"]))
			{
				$query = $_GET["v"];
				//echo $query;
			}
		else{
			$query="";
		}
	?>
	<?php include 'abc.php';?> 

 <div id="options" style="left:25%;width:30%;height:30%;top:20%;position:absolute;float:left;">
 	<div id="menu"  style="left:0%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick="$('#entertainment').slideDown('slow');" >Entertainment</div>
 	<div id="menu"  style="left:30%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick ="$('#sports').slideDown('slow');">Sports</div>
 	<div id="menu" style="left:40%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick="$('#education').slideDown('slow');">Education</div>
 	<div id="menu" style="left:60%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick ="$('#language').slideDown('slow');">Language</div>
 </div>       
  </div>



<div id="menu" style="left:0%;top:22%;height:50%;background-color:#006666;width:20%;position:absolute;color:white;">
	<div id="menu" style="left:0%;top:30%;background-color:#006666;width:20%;position:relative;float:left;height:20%;"   >
	<div id="edit" style="left:0%;top:0%;background-color:#006666;position:absolute;width:100%;height:20%;color:white;text-size:50px;text-align:center;font-family: 'Freckle Face', cursive;cursor:pointer;float:center;" onclick="location.href='gallery.php'">VIDEOS</div>
	<div id="edit" style="left:0%;top:25%;background-color:#006666;position:absolute;width:100%;height:20%;color:white;text-size:50px;text-align:center;font-family: 'Freckle Face', cursive;cursor:pointer;float:center" onclick="location.href='upload.php'">UPLOAD</div>
	<div id="edit" style="left:0%;top:50%;background-color:#006666;position:absolute;width:100%;height:20%;color:white;text-size:50px;text-align:center;font-family: 'Freckle Face', cursive;cursor:pointer;float:center" onclick="location.href='edit.php'">VIEW</div>
	<div id="edit" style="left:0%;top:75%;background-color:#006666;position:absolute;width:100%;height:20%;color:white;text-size:50px;text-align:center;font-family: 'Freckle Face', cursive;cursor:pointer;float:center" onclick="$('#sort').slideDown('fast');">SORT IMAGES</div>
</div>
</div>

<!-- <div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color::#006666;text-align:center;cursor:pointer;" onclick="location.href='./videos.php?v=upvotes'">Upvotes</div></a>
<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color::#006666;text-align:center;cursor:pointer;" onclick="./videos.php?v=views">Views</div>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color::#006666;text-align:center;cursor:pointer;" onclick="location.href='./videos.php?v=recommendations'">Recommendations</div>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color::#006666;text-align:center;cursor:pointer;" onclick=""></div>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color::#006666;text-align:center;cursor:pointer;" onclick=""></div>
</div> -->
<div style="background-color:#EDEDE5">
<div id="background" style="left:20%;position:absolute;top:20%;width:90%;background-color:#EDEDE5;height:100%;background-repeat:repeat-y;">
	<div id="maincontent" style="left:10%;top:5%;width:80%;height:95%;position:relative;background-color:white;overflow:scroll;">
		
		<div class="sr1" >
			
		<?php
		//order by upvotes
		//echo $query;
		if($query=="")
		{
			echo '<div style="margin-left:20px;margin-top:20px;width:100%">UPVOTES</div>';
			//echo '<div id="sr1" ><span class="module"><b><p>Upvotes</p></b></span>';
			
			$x = 0; 
			$data = getList("upvotes");
			$count = count($data);
			$i = $count-1;
			$j=0;
			if(is_array($data)==1)
			{
			while($j < $count && $j <8)
			{
				$name = substr($data[$i]->name,0,20);
				$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}
			$i = $count-1;
			/*while($j<8)
			{
				$name = substr($data[$i]->name,0,20);
				echo $i, $j, $data[$i]->description;
				$len = strlen($data[$i]->description);
				$description = $data[$i]->description;
				if($len >=19)
					$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}*/
			}
			else{
				$name = substr($data->name,0,20);
				$description = substr($data->description,0,20);
				$str = "pic.jpg";
				echo'<div class="video">
				<a href="./watch.php?v='.$data->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a></br>
				<a href="./watch.php?v='.$data->code.'"><b>' . $name.'</b></a> <p>Upvotes:- ' .$data->views. ' </p>
				<p>Upvotes:-'.$data->upvotes.'</p>
				<p>'.$description.'</p>
				<br>
				</div>';
			}
			//echo '</div>';
			echo '</div>';
		}
		//echo '<br>';
		?>
		
		<br>
		
		<div class="sr1">
			
		<?php
		//order by views
		//echo $query;
		if($query=="")
		{
			echo '<div style="margin-left:18px;width:100%">VIEWS</div>';
			//echo '<div id="sr1"><span class="module"><b><p>Views</p></span>';
			$x = 0; 
			$data = getList("views");
			$count = count($data);
			$i = $count-1;
			$j = 0;
			if(is_array($data)==1)
			{
			while($j < $count && $j <8)
			{
				$name = substr($data[$i]->name,0,20);
				$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}
			$i = $count-1;
			/*while($j<8)
			{
				$name = substr($data[$i]->name,0,20);
				$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}*/
			}
			else{
				$name = substr($data->name,0,20);
				$description = substr($data->description,0,20);
				$str = "pic.jpg";
				echo'<div class="video">
				<a href="./watch.php?v='.$data->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a></br>
				<a href="./watch.php?v='.$data->code.'"><b>' . $name.'</b></a> <p>Upvotes:- ' .$data->views. ' </p>
				<p>Upvotes:-'.$data->upvotes.'</p>
				<p>'.$description.'</p>
				<br>
				</div>';
			}
			echo '</div>';
			//echo '</div>';
		}
		//echo '<br>';
		?>
		
		<!-- <div>TIME</div> -->
		<!--<div class="sr1">
		<?php
		//order by time		
		/*if($query=="")
		{
			//echo '<div id="sr1">';
			$x = 0; 
			$data = getList("time");
			$count = count($data);
			$i = $count-1;
			$j=0;
			echo '<div>Time</div>';
			if(is_array($data)==1)
			{
			while($j < $count && $j <8)
			{
				$name = substr($data[$i]->name,0,20);
				$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}
			$i = $count-1;
			while($j<8)
			{
				$name = substr($data[$i]->name,0,20);
				$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}
			}
			else{
				$name = substr($data->name,0,20);
				$description = substr($data->description,0,20);
				$str = "pic.jpg";
				echo'<div class="video">
				<a href="./watch.php?v='.$data->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a></br>
				<a href="./watch.php?v='.$data->code.'"><b>' . $name.'</b></a> <p>Upvotes:- ' .$data->views. ' </p>
				<p>Upvotes:-'.$data->upvotes.'</p>
				<p>'.$description.'</p>
				<br>
				</div>';
			}
			//echo '</div>';
		}
		*/
		?>
		</div>-->

		<!--New portion of code-->
		<br>
		
		<div class="sr1">
			
		<?php
		//order by views
		//echo $query;
		if($query=="")
		{
			echo '<div style="margin-left:20px;width:100%">UPLOAD TIME</div>';
			//echo '<div id="sr1"><span class="module"><b><p>Views</p></span>';
			$x = 0; 
			$data = getList("views");
			$count = count($data);
			$i = $count-1;
			$j = 0;
			if(is_array($data)==1)
			{
			while($j < $count && $j <8)
			{
				$name = substr($data[$i]->name,0,20);
				$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}
			$i = $count-1;
			/*while($j<8)
			{
				$name = substr($data[$i]->name,0,20);
				$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}*/
			}
			else{
				$name = substr($data->name,0,20);
				$description = substr($data->description,0,20);
				$str = "pic.jpg";
				echo'<div class="video">
				<a href="./watch.php?v='.$data->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a></br>
				<a href="./watch.php?v='.$data->code.'"><b>' . $name.'</b></a> <p>Upvotes:- ' .$data->views. ' </p>
				<p>Upvotes:-'.$data->upvotes.'</p>
				<p>'.$description.'</p>
				<br>
				</div>';
			}
			//echo '</div>';
			echo '</div>';
		}
		//echo '<br>';
		
		?>
		
	<!-- code for the page when a button has been clicked -->

	
		<?php
			//order by query undertaken
			if($query!="")
			{
				echo '<div id="sr">';
				echo '<div style="margin-left:20px">'.strtoupper($query).'</div>';
				//echo "gwhiguw\n";
				$x = 0;
			$data = "NULL"; 
			$data = getList($query);
			//echo "hwkjk";
			$count = count($data);
			$i = $count-1;
			$j=0;
			if(is_array($data)==1)
			{
			while($j < $count && $j <28)
			{
				$name = substr($data[$i]->name,0,20);
				$description = substr($data[$i]->description,0,20);
				//$name = "12345678900987654321";
				$str = "pic.jpg";//instead do it $data[$i]->image
				echo'<div class="video">
				<a href="./watch.php?v='.$data[$i]->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a><br>
				<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
				<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
				<p>'.$description.'</p>
				<br>
				</div>';
				$i--;
				$j++;
			}
			}
			else if($data->name == "")
			{
				echo '<p><b>NO RESULT FOUND</p>';				
			}
			else{
				$name = substr($data->name,0,20);
				$description = substr($data->description,0,20);
				$str = "pic.jpg";
				echo'<div class="video">
				<a href="./watch.php?v='.$data->code.'">
				<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
				</a></br>
				<a href="./watch.php?v='.$data->code.'"><b>' . $name.'</b></a> <p>Upvotes:- ' .$data->views. ' </p>
				<p>Upvotes:-'.$data->upvotes.'</p>
				<p>'.$description.'</p>
				<br>
				</div>';
			}
			echo '</div>';
			}
			
		?>

	</div>
</div>
</div>
<form action="search_vid.php" method="POST" name = "searchForm" >
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
</form>

<div id="sort" style="left:0%;top:50%;position:absolute;background-color:#006666;width:20%;height:20%;display:none;">
	
	<div id="edit" style="left:0%;top:0%;background-color:#006666;position:absolute;width:100%;height:25%;color:white;text-size:50px;text-align:center;font-family: 'Freckle Face', cursive;cursor:pointer;float:center" onclick="window.open('./videos.php?v=upvotes','_self')">UPVOTES</div>
	<div id="edit" style="left:0%;top:25%;background-color:#006666;position:absolute;width:100%;height:25%;color:white;text-size:50px;text-align:center;font-family: 'Freckle Face', cursive;cursor:pointer;float:center" onclick="window.open('./videos.php?v=views','_self')">VIEWS</div>
</div>


</body>
</html>
