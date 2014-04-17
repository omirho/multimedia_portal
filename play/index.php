    <?php
// Create connection
$con=mysqli_connect("localhost","root","","multimedia");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $id=$_GET["id"];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
                
                <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css" />
    
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
      
        
        



<!--menubar-->

<style>

@font-face {
    font-family: 'WebSymbolsRegular';
    src: url('websymbols/websymbols-regular-webfont.eot');
    src: url('websymbols/websymbols-regular-webfont.eot?#iefix') format('embedded-opentype'),
        url('websymbols/websymbols-regular-webfont.woff') format('woff'),
        url('websymbols/websymbols-regular-webfont.ttf') format('truetype'),
        url('websymbols/websymbols-regular-webfont.svg#WebSymbolsRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
.ca-menu{
    padding:0; margin-left: 10px;
   /* margin-top: 25px;
    //margin:20px auto;*/
    position: fixed;
    top: 150px;
    left: 10px;
    min-width: 1300px;
    width:20%;
}
.ca-menu li{
    width: 300px;
    height: 70px;
    overflow: hidden;
    position: relative;
    display: block;
    background-color: rgba(255,255,255,0.5);
    -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    -moz-box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    margin-bottom: 14px;
    -webkit-transition: all 300ms ease-in-out;
	-moz-transition: all 300ms ease-in-out;
	-o-transition: all 300ms ease-in-out;
	-ms-transition: all 300ms ease-in-out;
	transition: all 300ms ease-in-out;
}
.ca-menu li:last-child{
    margin-bottom: 0px;
}
.ca-menu li a{
    text-align: left;
    width: 100%;
    height: 100%;
    display: block;
    color: #333;
    position: relative;
}
.ca-icon{
    font-family: 'WebSymbolsRegular', cursive;
    font-size: 30px;
    color: #333;
    text-shadow: 0px 0px 1px #333;
    line-height: 90px;
    position: absolute;
    width: 90px;
    left: 20px;
    text-align: center;
    -webkit-transition: all 300ms linear;
	-moz-transition: all 300ms linear;
	-o-transition: all 300ms linear;
	-ms-transition: all 300ms linear;
	transition: all 300ms linear; 
}
.ca-content{
    position: absolute;
    left: 120px;
    width: 370px;
    height: 60px;
    top: 20px;
}
.ca-main{
    font-size: 17px;
    -webkit-transition: all 300ms linear;
	-moz-transition: all 300ms linear;
	-o-transition: all 300ms linear;
	-ms-transition: all 300ms linear;
	transition: all 300ms linear; 
}
.ca-sub{
    font-size: 14px;
    color: #666;
}
.ca-menu li:hover{
    background-color: #000;
}
.ca-menu li:hover .ca-icon{
    color: #f900b0;
    font-size: 120px;
    opacity: 0.2;
    left: -20px;
    -webkit-transform: rotate(20deg);
    -moz-transform: rotate(20deg);
    -ms-transform: rotate(20deg);
    transform: rotate(20deg);
}
.ca-menu li:hover .ca-main{
    color: #f900b0;
    opacity: 0.8;
}
.ca-menu li:hover .ca-sub{
    color: #fff;
    opacity: 0.8;
}
    
</style>
        

<!--rating-->
<style type="text/css">
  .star {
background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAKCAQAAADI+WwIAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAAJiS0dEAP+Hj8y/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAACXZwQWcAAAALAAAACgCF+qVAAAAAhUlEQVQI103NMQqCABgF4C+Fxg7QHDQ0JkFnaKqlKJBu4Np9hEDoBq2doCYP0B4UBKLYUKZvex+P/+9N/dJ3FXl9S9CopbF9U1pOkAgb3irVanOMlGqldeBoo9CmspMFOFmp/hzLmtuXzvrWvpwJFVJvLLqci8Qmzl8OhzBwcMdD6ilXfwAd9B9f78yTCQAAAABJRU5ErkJggg==);  
  }
 
  .unstar {
background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAKCAQAAADI+WwIAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAAJiS0dEAP+Hj8y/AAAACXBIWXMAAAsTAAALEwEAmpwYAAAACXZwQWcAAAALAAAACgCF+qVAAAAAo0lEQVQI1z2NMQrCQBRE32YxGFDwBGJnYZkll0ilpDISLO28k4lFwN7CTsTKSisbK8ELCJFI/BZJdn41j/kzSqiVuZ3r1yzeAAanoajpcOwsW2dxf+0yWGe6CaVzNmgY4VHyQKAiVsIlUlvc9otK4lXugNnJjKqlkpi86X6exIZfNztZBGhKUgr4hBZ3A3UX4ye/CYdeWHch7MOzJ9R3jFLt8we7izGyoi32iQAAAABJRU5ErkJggg==);
  }
 
  .half-star {
background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAKCAQAAADI+WwIAAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAACxIAAAsSAdLdfvwAAAAJdnBBZwAAAAsAAAAKAIX6pUAAAACTSURBVAjXTY0xCsJAEEVfdiEgpPAWFpYTvMRWSioDwdIuh7GydbEIeAM7sU1lo42tR1CEdSzMJk4178H/H7qTVK4+A0URTNTMmZhVhEHXMK69/UEiS3Z0sOGOQqBMQAr2pABbgKDlujHQHlgQYpdWeRO7z/0Cj8swOcPyxvOEl/vXN/K2+kw5Zq4PipNR/E+Ft8IX7yMjsFUGo0cAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAAAAElFTkSuQmCC);
  }
 
  .rating {
    float: left;
    width: 11px;
    height: 10px;
  }
</style>
        
</head>
<body background="white1.jpg" bgproperties="fixed" style="background-size:cover">

    
    
    
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff;">FunZone!</a>
   </div>
   
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
        
        
        <form method="post" action="search.php?" class="navbar-form navbar-left" role="search" style="height: 100px">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" style="width: 500px;" name="search">
        </div>
        <button type="submit" class="btn btn-default" style="width: 150px" name="button">Submit</button>
      </form>

   <div>
      <center><p class="navbar-text">Signed in as Thomas</p></center>
   </div>
        
        
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
        
 
    <div class="container">
           
            <div class="content">
               
                <ul class="ca-menu">
                    <li>
                        <a href="index.php?id=1">
                            <span class="ca-icon">A</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Action</h2>
                               
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=2">
                            <span class="ca-icon">P</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Puzzle</h2>
                               
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=3">
                            <span class="ca-icon">S</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Shooter</h2>
                              
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=4">
                            <span class="ca-icon">S&D</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Strategy and Defense</h2>
                            
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?id=5">
                            <span class="ca-icon">R</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Racing</h2>
                              
                            </div>
                        </a>
                    </li>
                    <li>
                        
                             
                            <div>
                            <p style="font-size:20px;margin-left: 80px;"> <a href="sort.php?id=0<?php echo "&gameid=".$id?>">Sort by ratings</a><a href="sort.php?id=1<?php echo "&gameid=".$id?>">Sort by views</a></p>
                          </div>
                        
                    </li>
                </ul>
            </div><!-- content -->
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
 
<script type="text/javascript" src="js/bootstrap/bootstrap-dropdown.js"></script>

     <div class="row" style="float:right;width:75%;margin-top:200px; margin-bottom:80px;">
    <?php
  // $id=$_GET["id"];
   if($id==1)
   {
       $result = mysqli_query($con,"SELECT * FROM multimedia.games WHERE genre='action'");
       while($row=mysqli_fetch_array($result))
       {
           echo'<div class="col-sm-3 col-md-3 col-lg-3">';
      echo '<div class="thumbnail">';
         echo '<img style="width:200px;height:200px;" src="';
         echo "../games/action/images/".$row['image_location'].'">';
      echo '</div>';
      echo'<div class="caption">';
         echo'<h3>'.$row['name'].'</h3>';
         $rating=$row['rating'];
         $temp=5;
         echo'<p>Rating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspViews</style></p>';
         while($temp!=0)
         {
             if($rating>=1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=$rating-1;
                 $temp=$temp-1;
             }
             else if($rating>0 && $rating<0.5)
             {
                 echo'<span class="rating half-star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else if($rating>=0.5 && $rating<1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else
             {
                 echo'<span class="rating unstar"></span>';
                 $temp=$temp-1;
             }
         }
         echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
         echo $row['views'];
         echo'<br><p>';
         
         echo'<a href="gameplay.php' ;
            //echo $row['game_location'];
                       echo'?gameid=';
                       echo $row['id'];
                       echo'"';
         
            echo' target="_newtab" class="btn btn-primary" role="button">';
            echo 'Play';
            echo'</a>'; 
            echo'<a href="../games/action/';
                echo $row['game_location'];
            echo'" download class="btn btn-default" role="button">';
               echo'Download';
            echo'</a>';
         echo'</p>';
      echo'</div>';
      echo'</div>';
       }
   }
   
   else if($id==2)
   {
       $result = mysqli_query($con,"SELECT * FROM multimedia.games WHERE genre='puzzle'");
       while($row=mysqli_fetch_array($result))
       {
           echo'<div class="col-sm-3 col-md-3 col-lg-3">';
      echo '<div class="thumbnail">';
         echo '<img style="width:200px;height:200px;" src="';
         echo "../games/puzzle/images/".$row['image_location'].'">';
      echo '</div>';
      echo'<div class="caption">';
         echo'<h3>'.$row['name'].'</h3>';
        $rating=$row['rating'];
         $temp=5;
         echo'<p>Rating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspViews</style></p>';
         while($temp!=0)
         {
             if($rating>=1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=$rating-1;
                 $temp=$temp-1;
             }
             else if($rating>0 && $rating<0.5)
             {
                 echo'<span class="rating half-star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else if($rating>=0.5 && $rating<1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else
             {
                 echo'<span class="rating unstar"></span>';
                 $temp=$temp-1;
             }
         }
         echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
         echo $row['views'];
         echo'<br><p>';
            echo'<a href="gameplay.php';
            //echo $row['game_location'];
                       echo'?gameid=';
                       echo $row['id'];
                       echo'"';
         
            echo' target="_newtab" class="btn btn-primary" role="button">';
            echo 'Play';
            echo'</a>'; 
            echo'<a href="../games/puzzle/';
                echo $row['game_location'];
            echo'" download class="btn btn-default" role="button">';
               echo'Download';
            echo'</a>';
         echo'</p>';
      echo'</div>';
      echo'</div>';
       }
   }
   
   else if($id==3)
   {
       $result = mysqli_query($con,"SELECT * FROM multimedia.games WHERE genre='shooter'");
       while($row=mysqli_fetch_array($result))
       {
           echo'<div class="col-sm-3 col-md-3 col-lg-3">';
      echo '<div class="thumbnail">';
         echo '<img style="width:200px;height:200px;" src="';
         echo "../games/shooter/images/".$row['image_location'].'">';
      echo '</div>';
      echo'<div class="caption">';
         echo'<h3>'.$row['name'].'</h3>';
         $rating=$row['rating'];
         $temp=5;
         echo'<p>Rating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspViews</style></p>';
         while($temp!=0)
         {
             if($rating>=1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=$rating-1;
                 $temp=$temp-1;
             }
             else if($rating>0 && $rating<0.5)
             {
                 echo'<span class="rating half-star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else if($rating>=0.5 && $rating<1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else
             {
                 echo'<span class="rating unstar"></span>';
                 $temp=$temp-1;
             }
         }
         echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
         echo $row['views'];
         echo'<br><p>';
            echo'<a href="gameplay.php';
            //echo $row['game_location'];
                       echo'?gameid=';
                       echo $row['id'];
                       echo'"';
         
            echo' target="_newtab" class="btn btn-primary" role="button">';
               echo'Play';
            echo'</a>'; 
            echo'<a href="../games/shooter/';
                echo $row['game_location'];
            echo'" download class="btn btn-default" role="button">';
               echo'Download';
            echo'</a>';
         echo'</p>';
      echo'</div>';
      echo'</div>';
       }
   }
   
   
   else if($id==4)
   {
       $result = mysqli_query($con,"SELECT * FROM multimedia.games WHERE genre='strategy'");
       while($row=mysqli_fetch_array($result))
       {
           echo'<div class="col-sm-3 col-md-3 col-lg-3">';
      echo '<div class="thumbnail">';
         echo '<img style="width:200px;height:200px;" src="';
         echo "../games/strategy/images/".$row['image_location'].'">';
      echo '</div>';
      echo'<div class="caption">';
         echo'<h3>'.$row['name'].'</h3>';
         $rating=$row['rating'];
         $temp=5;
         echo'<p>Rating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspViews</style></p>';
         while($temp!=0)
         {
             if($rating>=1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=$rating-1;
                 $temp=$temp-1;
             }
             else if($rating>0 && $rating<0.5)
             {
                 echo'<span class="rating half-star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else if($rating>=0.5 && $rating<1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else
             {
                 echo'<span class="rating unstar"></span>';
                 $temp=$temp-1;
             }
         }
         echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
         echo $row['views'];
         echo'<br><p>';
            echo'<a href="gameplay.php';
            //echo $row['game_location'];
                       echo'?gameid=';
                       echo $row['id'];
                       echo'"';
         
            echo' target="_newtab" class="btn btn-primary" role="button">';
               echo'Play';
            echo'</a>'; 
            echo'<a href="../games/strategy/';
                echo $row['game_location'];
            echo'" download class="btn btn-default" role="button">';
               echo'Download';
            echo'</a>';
         echo'</p>';
      echo'</div>';
      echo'</div>';
       }
   }
   
   
   else if($id==5)
   {
       $result = mysqli_query($con,"SELECT * FROM multimedia.games WHERE genre='racing'");
       while($row=mysqli_fetch_array($result))
       {
           echo'<div class="col-sm-3 col-md-3 col-lg-3">';
      echo '<div class="thumbnail">';
         echo '<img style="width:200px;height:200px;" src="';
         echo "../games/racing/images/".$row['image_location'].'">';
      echo '</div>';
      echo'<div class="caption">';
         echo'<h3>'.$row['name'].'</h3>';
         $rating=$row['rating'];
         $temp=5;
         echo'<p>Rating&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspViews</style></p>';
         while($temp!=0)
         {
             if($rating>=1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=$rating-1;
                 $temp=$temp-1;
             }
             else if($rating>0 && $rating<0.5)
             {
                 echo'<span class="rating half-star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else if($rating>=0.5 && $rating<1)
             {
                 echo'<span class="rating star"></span>';
                 $rating=0;
                 $temp=$temp-1;
             }
             else
             {
                 echo'<span class="rating unstar"></span>';
                 $temp=$temp-1;
             }
         }
         echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
         echo $row['views'];
         echo'<br><p>';
            echo'<a href="gameplay.php';
            //echo $row['game_location'];
                       echo'?gameid=';
                       echo $row['id'];
                       echo'"';
         
            echo' target="_newtab" class="btn btn-primary" role="button">';
               echo'Play';
            echo'</a>'; 
            echo'<a href="../games/racing/';
                echo $row['game_location'];
            echo'" download class="btn btn-default" role="button">';
               echo'Download';
            echo'</a>';
         echo'</p>';
      echo'</div>';
      echo'</div>';
       }
   }
   
   
        ?>
        </div>
    
   
	<script src="prefixfree.min.js" type="text/javascript"></script>
</body>
</html>
