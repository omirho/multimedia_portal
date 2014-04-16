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
            //             document.getElementById("status").innerHTML=xmlhttp.status;

            //             if (xmlhttp.readyState==4 && xmlhttp.status==200)
            //             {
            //                 document.getElementById("maincontent").innerHTML=xmlhttp.responseText;
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


            // function checkValidity()
            // {
            //     document.write("sridhar is bond");
            //     var upvotes = document.getElementById("upvotes").value;
            //     document.write(upvotes);
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


        <style>
                        label{
            display:inline-block;
            width:200px;
            margin-right:30px;
            text-align:right;
            }

            input{

            }
            table{
                     border-bottom: 6px solid #104A7B;
                    border-right: 6px solid #104A7B;
                    border-left: 6px solid #104A7B;
                    border-top:6px solid #104A7B;
            padding-top:16px;
            padding-bottom: 35px; 
            padding-right: 50px;
            margin-left: 50px;
                    margin-top: 140px;
                    margin-left: 420px;     
                    }

            fieldset{
            border:none;
            width:500px;
            margin:0px auto;
            }

              .textbox{ 
            padding: 1px 20px; 
            border: 0; 
                height:25px; 
                width: 275px; 
            border-radius: 10px; 
            -moz-border-radius: 10px; 
            -webkit-border-radius: 10px; 
            box-shadow: 1px 1px 0 0 #FFF, 5px 5px 40px 2px #BBB inset; 
            -moz-box-shadow: 1px 1px 0 0 #FFF, 5px 5px 40px 2px #BBB inset; 
            -webkit-box-shadow: 1px 1px 0 0 #FFF, 5px 5px 40px 2px #BBB inset; 
            -webkit-background-clip: padding-box; 
                outline:0; 
            }


            .button-search{
            background-image:url('search-button.png');
            border-radius: 10px;
            margin-right: 240px;
            margin-left: 360px;
            margin-top: 20px;
            width:165px;
            height:45px;
        }
        .button-search:hover {
           background-image:url('search-button.png');   
        } 
        </style>

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
                echo $query;
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

            // $languageArray = "";
            // $useridArray = "";
            // $allKeyWords = "";
            // $fromUploadDate = "";
            // $toUploadDate = "";
            // $anyKeyWords = "";
            // $minUpvotes = 0;

            // if( isset($_POST['language']) and !empty($_POST['language']) )
            // {
            //     $languageArray = explode(" ",$_POST['language']);
            // }

            // if( isset($_POST['userid']) and !empty($_POST['userid']) )
            // {
            //     $useridArray = explode(" ", $_POST['userid']);                
            // }

            // if( isset($_POST['fromUploadDate']) and !empty($_POST['fromUploadDate']) )
            // {
            //     $fromUploadDate = $_POST['fromUploadDate'];
            // }

            // if( isset($_POST['toUploadDate']) and !empty($_POST['toUploadDate']) )
            // {
            //     $toUploadDate = $_POST['toUploadDate'];
            // }

            // if( isset($_POST['anyKeyWords']) and !empty($_POST['anyKeyWords']) )
            // {
            //     $anyKeyWords = explode(" ", $_POST['anyKeyWords']);                
            // }

            // if( isset($_POST['allKeyWords']) and !empty($_POST['allKeyWords']) )
            // {
            //     $allKeyWords = explode(" ", $_POST['allKeyWords']);                
            // }

            // if( isset($_POST['minUpvotes']) and !empty($_POST['minUpvotes']) )
            // {
            //     $minUpvotes = explode(" ", $_POST['minUpvotes']);                
            // }

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
                        onblur="fill(this.value)" style="left:60%;width:16%;height:20%;top:20%;position:absolute;" />

       
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
<a href="./videos.php?v=upvotes">  <div id="component1" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:white;cursor:pointer;" onclick="">UPVOTES</div></a>
<a href="./videos.php?v=recommendations">    <div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:green;text-align:white;">RECOMMENDATIONS</div></a>
 <a href="./videos.php?v=views">   <div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:white;">VIEWS</div></a>
    <div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:green;text-align:white;"></div>
    <div id="component" style="left:0%;top:0%;position:relative;width:100%;height:20%;background-color:lightgreen;text-align:white;"></div>
</div>


<!--  ************background color*********/////////////////////////////
<div style="background-color:#EDEDE5">
<div id="background" style="left:20%;position:absolute;top:20%;width:80%;background-color:#EDEDE5;height:100%;background-repeat:repeat-y;">
    <div id="maincontent" style="left:10%;top:5%;width:80%;height:95%;position:relative;background-color:white;overflow:scroll;">
    /////////////////////////////////////////////////////////////////////   
-->
     <!--//////////////////////function for search -->
     
    </div>
</div>
</div>
        <!--  ////  Advanced search GUI// -->


<form action = "advanced_search.php" method="POST">    
    <table>

        <tr>
        <td align="centre" style="height: 20%; padding-left: 2%"> 
        

        <label> <strong>This exact word or phrase:</strong></label><input class="textbox" type="text" name="exactPhrase"><br>

        <br> <label> <strong> All these words:</strong> </label> <input class="textbox" type="text" name="allKeyWords"> <br>

        <br> <label> <strong> Any of these words:</strong> </label><input class="textbox" type="text" name="anyKeyWords"><br> 

        <!-- <br> <label> <strong> None of these words:</strong> </label><input class="textbox"type="text" name="language"><br> -->

        <br> <label> <strong> Minimum number of upvotes:</strong> </label> <input class="textbox" id = "upvotes" onkeypress = "if (isNaN(this.value)) document.getElementById('error').innerHTML = 'Please enter a valid integer.'; else document.getElementById('error').innerHTML = '';" type="text" name="minUpvotes"><br><br>

        <label> <strong>Language:</strong></label><input class="textbox" type="text" name="language"><br> 

        <br> <label> <strong> From upload date:</strong> </label><input class="textbox" type="text" name="fromUploadDate"><br>
        <br><label> <strong> To upload Date:</strong> </label><input class="textbox" type="text" name="toUploadDate"><br>

        <br> <label> <strong> User name:</strong> </label><input class="textbox" type="text" name="userid"><br>

</td>
    
</tr>  
    
    <tr id="searchwrap">
        <td id="search">  
            <input type="submit" class="button-search" value="Advanced Search" />
        </td></tr>

    </table>       
                
</form>

    <div id = "error" style="color:red">
        
    </div>
<!--
<body>
    <div id="searchwrap">
    <li id="search">
       
        
        <input type="submit" class="button-search" value="" />
      </form>
    </li>
   </div>
</body> -->






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
