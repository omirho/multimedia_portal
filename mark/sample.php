<?php
// Create connection
$con=mysqli_connect("localhost","root","","multimedia");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<html>
    <body>
         <?php
                                                      
                                                        
                                                        $result = mysqli_query($con,"SELECT * FROM multimedia.games WHERE genre='shooter'");
                                                        
                                                        while($row = mysqli_fetch_array($result))
                                                          {
                                                            $str="../games/shooter/images/".$row['image_location'];
                                                            echo '<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>';
                                                            //if($row['genre']=="shooter")
                                                                echo '<img src="'.$str.'"/>';
                                                            //echo '<img src="'.$str.'"/>';
                                                            
                                                          //echo $row['name'] . " " . $row['genre'];
                                                          //echo "<br>";
                                                          }
                                                        
                                                          //echo '<img src="/games/shooter/images/archerychallenge.jpg"/>';
                                                        /*for($x=1;$x<=4;$x++)
                                                        {  $st1 = "images/album/thumbs/";$x2 ="images/album/";
                                                            $f =$st1.(string)$x . ".jpg";
                                                            $st=$x2. (string)$x . ".jpg";
                                                            //echo "$st</br>";
                                                           // echo "$st1</br>";
                                                              echo '<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>';
                                                            //  echo '<img src="images/album/thumbs/1.jpg" alt="images/album/1.jpg"/>';
                                                            echo '<img src="'.$f.'"/>';
                                                        }*/
                                                        
                                                        
                                                        ?>
    </body>
</html>