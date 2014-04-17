<?php
// Create connection
$con=mysqli_connect("localhost","root","","multimedia");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  //$user="rajat";
  }
?>


<?php
$user='rajat';
if (($_FILES["file"]["type"] == "application/x-shockwave-flash") &&
 ($_FILES["file"]["size"] < 20000000000) && ($_FILES["image"]["type"] == "image/jpeg") && ($_FILES["image"]["size"] < 500000000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
    else if($_FILES["image"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["image"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    $hash=md5_file($_FILES["file"]["tmp_name"]);
    echo $hash;
    if (file_exists("../games/".$_POST['genre']."/". $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " name already exists. ";
      }
       else if (file_exists("../games/".$_POST['genre']."/images/" . $_FILES["image"]["name"]))
      {
      echo $_FILES["image"]["name"] . " name already exists. ";
      }
      else if(!$_POST['game_name'])
      {
          echo 'Please enter a game name.';
      }
      else
      { echo '<br>';
          $result=  mysqli_query($con, "SELECT * FROM multimedia.games WHERE hashval='".$hash."'");
          $r=  mysqli_fetch_array($result);
          if(empty($r)){
      move_uploaded_file($_FILES["file"]["tmp_name"],
          "../games/".$_POST['genre']."/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      
      
      move_uploaded_file($_FILES["image"]["tmp_name"],
      "../games/".$_POST['genre']."/images/" . $_FILES["image"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["image"]["name"];
      
      
      $game_name=$_POST['game_name'];
      $file=$_FILES["file"]["name"];
      $image=$_FILES["image"]["name"];
      $genre=$_POST['genre'];
      $x=  mysqli_query($con, "INSERT INTO multimedia.games (name,game_location,image_location,author,genre,hashval) VALUES ('$game_name', '$file', '$image', '$user', '$genre', '$hash')");
          }
         else {echo'File already exists';}
      } 
    }
  }
else
  {
  echo "Invalid file";
  }

?>