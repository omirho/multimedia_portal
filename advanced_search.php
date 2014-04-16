<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Videos/Audio</title>
	<link rel="stylesheet" type="text/css" href="load.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script >
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

	<?php
		$languageArray = "";
            $useridArray = "";
            $allKeyWords = "";
            $fromUploadDate = "";
            $toUploadDate = "";
            $anyKeyWords = "";
            $minUpvotes = 0;

            if( isset($_POST['language']) and !empty($_POST['language']) )
            {
                $languageArray = explode(" ",$_POST['language']);
            }

            if( isset($_POST['userid']) and !empty($_POST['userid']) )
            {
                $useridArray = explode(" ", $_POST['userid']);                
            }

            if( isset($_POST['fromUploadDate']) and !empty($_POST['fromUploadDate']) )
            {
                $fromUploadDate = $_POST['fromUploadDate'];
            }

            if( isset($_POST['toUploadDate']) and !empty($_POST['toUploadDate']) )
            {
                $toUploadDate = $_POST['toUploadDate'];
            }

            if( isset($_POST['anyKeyWords']) and !empty($_POST['anyKeyWords']) )
            {
                $anyKeyWords = explode(" ", $_POST['anyKeyWords']);                
            }

            if( isset($_POST['allKeyWords']) and !empty($_POST['allKeyWords']) )
            {
                $allKeyWords = explode(" ", $_POST['allKeyWords']);                
            }

            if( isset($_POST['minUpvotes']) and !empty($_POST['minUpvotes']) )
            {
                $minUpvotes = explode(" ", $_POST['minUpvotes']);                
            }

	?>
</head>
<body style="height:100%;width:100%;position:absolute;left:0%;top:0%;" >

<div id="bar" style="height:15%;width:100%;position:absolute;background-color:#006666;top:5%;left:0%;font-size:50px;font-family:'verdana';color:white;" >VIDEOS
<div id="homebutton" style="left:90%;position:absolute;top:7%;"><a href="main.php"><img src="images/homebutton.png" height="50%" width="50%"></a></div>
 <div id="searchbar" >
 	<form action="search_vid.php" method="POST" name = "searchForm" >

                <input type="text" name = "query" id = 'search_bar' class="twitterStyleTextbox"  onfocus="if(this.value == 'Enter search here') this.value=''"
                        onblur="if(this.value =='') this.value='Enter search here'"
                        onblur="fill(this.value)" style="left:60%;width:16%;height:20%;top:20%;position:absolute;">
                <input type="submit" name="searchButton" class="button-search" value="search" style="left:76.5%;width:8%;height:28%;top:20%;position:absolute;" />
            </form>
 </div>       
 

 <div id="options" style="left:25%;width:30%;height:30%;top:20%;position:absolute;float:left;">
 	<div id="menu"  style="left:0%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick="$('#entertainment').slideDown('slow');" >Entertainment</div>
 	<div id="menu"  style="left:30%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick ="$('#sports').slideDown('slow');">Sports</div>
 	<div id="menu" style="left:40%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick="$('#education').slideDown('slow');">Education</div>
 	<div id="menu" style="left:60%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick ="$('#language').slideDown('slow');">Language</div>
 </div>       
              
</div>


<div id="menu" style="left:0%;top:22%;height:50%;background-color:#006666;width:20%;position:absolute;color:white;">
	<a href="./videos.php?v=upvotes"><div id="component1" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:white;cursor:pointer;" onclick="">UPVOTES</div></a>
	<a href= "./videos.php?v=recommendations"><div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:green;text-align:white;">VIEWS</div></a>
	<a href="./videos.php?v=views"><div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:white;">RECOMMENDATIONS</div></a>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:green;text-align:white;"></div>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:white;"></div>
</div>
<div style="background-color:#EDEDE5">
<div id="background" style="left:20%;position:absolute;top:20%;width:80%;background-color:#EDEDE5;height:100%;background-repeat:repeat-y;">
	<div id="maincontent" style="left:10%;top:5%;width:85%;height:95%;position:relative;background-color:white;overflow:scroll;">
	<!-- code for advanced search-->
		<?php include 'advancedSearch.php';?>
		<?php
			// $useridArray = "";
			// $languageArray = "";
			// $fromUploadDate = "";
			// $toUploadDate = "";
			// $keyWords = "";
			// $anyKeyWord = "";
			// $minUpvotes = 0;
			$languageArray = "";
            $useridArray = "";
            $allKeyWords = "";
            $fromUploadDate = "";
            $toUploadDate = "";
            $anyKeyWords = "";
            $minUpvotes = 0;

			$data = search($anyKeyWords, $allKeyWords, $languageArray , $fromUploadDate, $toUploadDate, $useridArray, $minUpvotes);
			if($data=="")
			{
				echo "NO QUERY FOUND\n";
			}
			else{
				$count = count($data);
				$i=0;
				$str = "pic.jpg";
				while($i<$count)
				{
					/*echo'<div class="video">
					<a href="./watch.php?v='.$data[$i]->code.'">
					<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail">
					</a><br>
					<a href="./watch.php?v='.$data[$i]->code.'"><b>' . $data[$i]->name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
					<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
					<p>'.$data[$i]->description.'</p>
					<br>
					</div>';*/
					echo '<div class="videos">
							<a href="./watch.php?v='.$data[$i]->code.'">
						<img src= "' .$str. ' " alt = "Pic of video" class="videopic" alt="Thumbnail"></a></div>
						<div id="data"><a href="./watch.php?v='.$data[$i]->code.'"><b>' . $data[$i]->name.'</b></a> <p>Views:- ' .$data[$i]->views. ' </p>
						<p>Upvotes:- <b>'.$data[$i]->upvotes. '</b></p>
						<p>'.$data[$i]->description.'</p>
						<br>
						</div>

					';
					$i++;
				}
			}

		?>


	<!--end of GUI for dvanced search-->	
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

</body>
</html>
