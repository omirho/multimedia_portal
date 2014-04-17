<?php
 $con=mysqli_connect("localhost","root","","multimedia");
       // echo $_POST['rate'];
 $user='kushal';
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $gameid=$_GET['id'];
  
?>


<?php
$result= mysqli_query($con,"Select * from multimedia.users where id='".$user."'");
$text="";
$row=  mysqli_fetch_array($result);
$text=$row['favourites'];
$array=  explode(';', $text);
if(!in_array($gameid,$array))
{
    $text=$text.$gameid.";";
    mysqli_query($con, "UPDATE multimedia.users set favourites = '".$text."' where id='".$user."' ");
}
mysqli_query($con, "UPDATE multimedia.games SET views=views-1 WHERE id=$gameid");
header('Location: gameplay.php?gameid='.$gameid);

?>