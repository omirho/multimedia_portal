

<html>
    <head>
        
        <title>
            Play!
        </title>
        
        <style type="text/css">
        article {
            padding-left: 50px; /* arbitrary, to expose the "zero stars" area half a star to the left of the first star.*/
        }

        .star-rating {
            margin: 0 auto;
            display:inline-block;
        }
            /* radio button stars */

            /* you can easily stuff the generation of these repetitive chunks of CSS into a server-side language like ASP */
        .rb0:checked ~ .rating,
        label.rb0l:hover ~ .rating
        {
            width: 0px; /* no stars */
        }

        .rb1:checked ~ .rating,
        label.rb1l:hover ~ .rating
        {
            width: 16px; /* half a star */
        }

        .rb2:checked ~ .rating,
        label.rb2l:hover ~ .rating
        {
            width: 32px; /* a star */
        }

        .rb3:checked ~ .rating,
        label.rb3l:hover ~ .rating
        {
            width: 48px; /* 1.5 stars */
        }

        .rb4:checked ~ .rating,
        label.rb4l:hover ~ .rating
        {
            width: 64px; /* 2 stars */
        }
        .rb5:checked ~ .rating,
        label.rb5l:hover ~ .rating
        {
            width: 80px;
        }
        .rb6:checked ~ .rating,
        label.rb6l:hover ~ .rating
        {
            width: 96px;
        }
        .rb7:checked ~ .rating,
        label.rb7l:hover ~ .rating
        {
            width: 112px;
        }
        .rb8:checked ~ .rating,
        label.rb8l:hover ~ .rating
        {
            width: 128px;
        }
        .rb9:checked ~ .rating,
        label.rb9l:hover ~ .rating
        {
            width: 144px;
        }
        .rb10:checked ~ .rating,
        label.rb10l:hover ~ .rating
        {
            width: 160px; /* 5 stars */
        }

        .star-rating label.star {
            width: 16px; /* half star */
            left: -16px; /* half star */
            padding: 0;
            height: 40px; /* whole star + 2x padding (4px each for top and bottom) */
            position: relative;
            z-index: 3;
            float: left;
        }

        .star-rating label.star.last {
            width: 32px;
        }

            /* hide inputs (RBs and their labels) */
        .star-rating input[type=radio],
        .star-rating label.rb
        {
            display: none;
        }

            /* using icons found at http://www.easyicon.cn/language.en/icondetail/523835/ */
        .rating {
            background: url(http://cdn-img.easyicon.cn/png/5238/523834.gif) repeat-x top left;
            position: relative;
            z-index: 2;
            top: 4px; /* 1x padding */
            height: 32px; /* whole star */
            width:0px;
        }

        .rating-bg {
            background: url(http://cdn-img.easyicon.cn/png/5238/523835.gif) repeat-x top left;
            position: relative;
            z-index: 1;
            top: -28px; /* 1 whole star - 1x padding */
            height: 32px; /* whole star */
            width: 160px;
        }

            /* IE8 fallback to radio buttons */
        .ie8 .star-rating input,
        .ie8 .star-rating label.rb
        {
            display: inline-block;
        }

        .ie8 .rating,
        .ie8 .rating-bg,
        .ie8 .star-rating label.star {
            display: none;
        }

    </style>
    </head>
    <body background='darkgameplay.jpg' bgproperties='fixed'>
        <!--div id="bar" style="height:15%;width:100%;position:absolute;background-color:#006666;top:5%;left:0%;font-size:60px;font-family:'verdana';color:white;">GAMES
<div id="homebutton" style="left:90%;position:absolute;top:7%;"><a href="main.php"><img src="images/homebutton.png" height="50%" width="50%"></a></div>
</div-->
        
        <!--form method="post" action="rate.php?id=">
           Rating:(between 0 and 5) <input type='number' name='rate' id='rate' min='0' max='5'>
           <input type='submit' name='submit' value='SUBMIT'>
        </form-->
        
        
        
        
        
        
  
        
        
        
        
        
        
        
        
        
        
        
        <?php
        $con=mysqli_connect("localhost","root","","multimedia");
       // echo $_POST['rate'];
 $user='kushal';
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $gameid=$_GET['gameid'];
  
  $res = mysqli_query($con,"SELECT * FROM multimedia.users WHERE id='kushal'");
  /*$text="";
  while($roe=mysqli_fetch_array($res)){
      $text=$roe['playlist'];
      $text=$text.$gameid.';';  
  }*/
  echo '<a href="favourites.php?id=';
      echo $gameid;
      echo '">';
      echo '<button name="playlist" type="button" onclick="">Add to playlist</button></a>';
  /*if(isset($_POST['playlist']))
  {
      echo "Kusjh";
  }*/
        //$sql="UPDATE multimedia.games SET views=views+1 WHERE id=4";
        $y=mysqli_query($con,"UPDATE multimedia.games SET views=views+1 WHERE id=$gameid");
        $result = mysqli_query($con,"SELECT * FROM multimedia.games WHERE id=$gameid");
        while($row=mysqli_fetch_array($result)){
       // echo '<p style="margin-top:500px;margin-right:500px;">';
        echo'<embed src="../games/';
        echo $row['genre'];
        echo '/';
        echo $row['game_location'];
        echo '" style="width:800px;height:600px;margin-top:200px;margin-left:200px;">';
       // $x=$row['views']+1;
       // echo '</p>';
        
        
        }
        //mysql_close($con);
        ?>
        
        
       
        <article>
    <form style="margin-left:300px;;" method="post" name="input" action="rate.php?id=<?php echo $_GET['gameid'] ; echo '&uid=Kushal'; ?>">
    <div class="star-rating">

        <input class="rb0" id="Ans_1" name="numericRating" type="radio" value="0" checked="checked" />
        <input class="rb1" id="Ans_2" name="numericRating" type="radio" value="0.5" />
        <input class="rb2" id="Ans_3" name="numericRating" type="radio" value="1" />
        <input class="rb3" id="Ans_4" name="numericRating" type="radio" value="1.5" />
        <input class="rb4" id="Ans_5" name="numericRating" type="radio" value="2" />
        <input class="rb5" id="Ans_6" name="numericRating" type="radio" value="2.5" />
        <input class="rb6" id="Ans_7" name="numericRating" type="radio" value="3" />
        <input class="rb7" id="Ans_8" name="numericRating" type="radio" value="3.5" />
        <input class="rb8" id="Ans_9" name="numericRating" type="radio" value="4" />
        <input class="rb9" id="Ans_10" name="numericRating" type="radio" value="4.5" />
        <input class="rb10" id="Ans_11" name="numericRating" type="radio" value="5" />
        <label for="Ans_1" class="star rb0l" onclick=""></label>
        <label for="Ans_2" class="star rb1l" onclick=""></label>
        <label for="Ans_3" class="star rb2l" onclick=""></label>
        <label for="Ans_4" class="star rb3l" onclick=""></label>
        <label for="Ans_5" class="star rb4l" onclick=""></label>
        <label for="Ans_6" class="star rb5l" onclick=""></label>
        <label for="Ans_7" class="star rb6l" onclick=""></label>
        <label for="Ans_8" class="star rb7l" onclick=""></label>
        <label for="Ans_9" class="star rb8l" onclick=""></label>
        <label for="Ans_10" class="star rb9l" onclick=""></label>
        <label for="Ans_11" class="star rb10l last" onclick=""></label>

        <label for="Ans_1" class="rb" onclick="">0</label>
        <label for="Ans_2" class="rb" onclick="">1</label>
        <label for="Ans_3" class="rb" onclick="">2</label>
        <label for="Ans_4" class="rb" onclick="">3</label>
        <label for="Ans_5" class="rb" onclick="">4</label>
        <label for="Ans_6" class="rb" onclick="">5</label>
        <label for="Ans_7" class="rb" onclick="">6</label>
        <label for="Ans_8" class="rb" onclick="">7</label>
        <label for="Ans_9" class="rb" onclick="">8</label>
        <label for="Ans_10" class="rb" onclick="">9</label>
        <label for="Ans_11" class="rb" onclick="">10</label>

        <div class="rating"></div>
        <div class="rating-bg"></div>

        <input type="submit" value="submit">

    </div>
        
    </form>
            <?php
            echo '<div>';
        echo '<a style="margin-left:1000px; margin-top:-1000px;" href="../games/';
        echo $row['genre'];
        echo '/';
        echo $row['game_location'];
        echo '">Play fullscreen</a>';
        echo '</div>';
        ?>
</article>
        
    </body>
</html>