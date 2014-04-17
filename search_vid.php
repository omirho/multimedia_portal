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
            // function suggest()
            // {
            //     try
            //     {
            //         var query = document.getElementById("searchBox").value;
            //         //document.write(query);
            //         var xmlhttp;
                    
            //         if (window.XMLHttpRequest)
            //         {// code for IE7+, Firefox, Chrome, Opera, Safari
            //             xmlhttp=new XMLHttpRequest();
            //         }
            //         else
            //         {// code for IE6, IE5
            //             xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            //         }
                    
            //         var url = "suggest.php";
            //         var params = "query="+query;
            //         xmlhttp.open("POST", url, true);
            //         //Send the proper header information along with the request
            //         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //         xmlhttp.setRequestHeader("Content-length", params.length);
            //         xmlhttp.setRequestHeader("Connection", "close");
                    
            //         xmlhttp.onreadystatechange=function()
            //         {
            //         	document.getElementById("status").innerHTML=xmlhttp.status;

            //             if (xmlhttp.readyState==4 && xmlhttp.status==200)
            //             {
            //                 document.getElementById("results").innerHTML=xmlhttp.responseText;
            //             }
            //         }
            //         xmlhttp.send(params);
            //     }
            //     catch(err)
            //     {
            //         alert(err);
            //     }
            // }

            // function incrementFrequency()
            // {
            //     try
            //     {
            //         var query = document.getElementById("searchBox").value;
            //         if ( query == "" || query == "Enter search here" )
            //             return;

            //         //document.write(query);
            //         var xmlhttp;
                    
            //         if (window.XMLHttpRequest)
            //         {// code for IE7+, Firefox, Chrome, Opera, Safari
            //             xmlhttp=new XMLHttpRequest();
            //         }
            //         else
            //         {// code for IE6, IE5
            //             xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            //         }
                    
            //         var url = "incrementFrequency.php";
            //         var params = "query="+query;
            //         xmlhttp.open("POST", url, true);

            //         xmlhttp.send(params);
            //         //Send the proper header information along with the request
            //         xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            //         xmlhttp.setRequestHeader("Content-length", params.length);
            //         xmlhttp.setRequestHeader("Connection", "close");
                    
            //         xmlhttp.onreadystatechange=function()
            //         {
            //             document.getElementById("results").innerHTML = xmlhttp.status;
            //             if (xmlhttp.readyState==4 && xmlhttp.status==200)
            //             {
            //                 document.getElementById("results").innerHTML += xmlhttp.responseText;
            //             }
            //         }
            //     }
            //     catch(err)
            //     {
            //         alert(err);
            //     }
            // }


            // function fill(value)
            // {
            //     document.getElementById("searchBox").value = value;
            // }
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
            $tags = "";

            //When filtering is submitted, this code gets executed
            if ( isset($_POST['checkboxarray']) )
            {
                $tags=$_POST['checkboxarray'];
                foreach ($tags AS $val) 
                {
                  echo $val."<br>";
                }
            }
            $language = '';
            if ( isset($_POST['languagearray']) )
            {
                $language=$_POST['languagearray'];
                foreach ($language AS $val) 
                {
                  echo $val."<br><br>";
                }
            }
            if(isset($_POST['query']))
            {
                $query = $_POST['query'];
                //echo $query;
            }
            else
            {
                $query = "";
            }
            //When search form is submitted, this code gets executed.
           
           /* if ( isset($_POST['search']) and !empty($_POST['search']) )//$_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $x++;
                echo $x;
            }
           */ 
        ?> 
</head>
<body style="height:100%;width:100%;position:absolute;left:0%;top:0%;" >

<div id="bar" style="height:15%;width:100%;position:absolute;background-color:#006666;top:5%;left:0%;font-size:50px;font-family:'verdana';color:white;" >VIDEOS
<div id="homebutton" style="left:90%;position:absolute;top:7%;"><a href="main.php"><img src="images/homebutton.png" height="50%" width="50%"></a></div>
 <div id="searchwrap" >
 	<form action="search_vid.php" method="POST" name = "searchForm" >
 				
                <!--<input type = "text" name="query" id="searchBox" class="twitterStyleTextbox" value="Enter search here" onkeyup="suggest()" onfocus="if(this.value == 'Enter search here') this.value=''" onblur="if(this.value =='') this.value='Enter search here'" style="left:60%;width:16%;height:20%;top:20%;position:absolute;" />
                <div id="results"></div>-->
                <input type="text" name = "query" id = 'search_bar' class="twitterStyleTextbox"  onfocus="if(this.value == 'Enter search here') this.value=''"
                        onblur="if(this.value =='') this.value='Enter search here'"
                        onblur="fill(this.value)" style="left:60%;width:16%;height:20%;top:20%;position:absolute;">
                <div id="results" style="left:60%;width:16%;height:20%;top:21%;position:relative;" border="1px solid #A5ACB2"></div>
       
                <input type="submit" name="searchButton" class="button-search" value="search" style="left:76.5%;width:8%;height:28%;top:20%;position:absolute;" />
           
 </div>       
 

 <div id="options" style="left:25%;width:30%;height:30%;top:20%;position:absolute;float:left;">
 	<div id="menu"  style="left:0%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick="$('#entertainment').slideDown('slow');" >Entertainment</div>
 	<div id="menu"  style="left:30%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick ="$('#sports').slideDown('slow');">Sports</div>
 	<div id="menu" style="left:40%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick="$('#education').slideDown('slow');">Education</div>
 	<div id="menu" style="left:60%;width:10%;height:100%;position:relative;top:0%;font-size:15px;float:left;text-align:left;" onclick ="$('#language').slideDown('slow');">Language</div>
 </div>       
              
</div>
 </form>


<div id="menu" style="left:0%;top:22%;height:50%;background-color:#006666;width:20%;position:absolute;color:white;">
<a href="./videos.php?v=upvotes">	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:center;cursor:pointer;" onclick="">Upvotes</div></a>
<a href="./videos.php?v=recommendations">	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:green;text-align:center;cursor:pointer;" onclick="">Recommendations</div></a>
<a href="./videos.php?v=views">	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:center;cursor:pointer;" onclick="">Views</div></a>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:green;text-align:center;cursor:pointer;" onclick=""></div>
	<div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:center;cursor:pointer;" onclick=""></div>
</div>
<div style="background-color:#EDEDE5">
<div id="background" style="left:20%;position:absolute;top:20%;width:80%;background-color:#EDEDE5;height:100%;background-repeat:repeat-y;">
	<div id="maincontent" style="left:10%;top:5%;width:80%;height:95%;position:relative;background-color:white;overflow:scroll;">
		<?php include 'searchFunctions.php';?>
		<?php
            // foreach ($tags AS $val) 
            //     {
            //       echo $val."<br>";
            //     }
            //     foreach ($language AS $val) 
            //     {
            //       echo $val."<br><br>";
            //     }
			$data = "NULL";
			$str = "pic.jpg";
			$data = search($query,$tags,$language);
			if($data=="")
			{
				echo "NO RESULTS FOUND\n";
			}
			else{
				$count = count($data);
				$i=0;
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
	</div>
</div>
</div>
    <form action="search_vid.php" method="POST" name = "searchForm1" >
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
