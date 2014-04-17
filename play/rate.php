<?php
        $con=mysqli_connect("localhost","root","","multimedia");
       // echo $_POST['rate'];
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$user=$_GET['uid'];
$game=$_GET['id'];
//echo $user;
?>


<?php 
//if($_GET['id2']==1)

    $gamerating=$_POST['numericRating'];
    $result=  mysqli_query($con, "SELECT * FROM multimedia.ratings WHERE user_id='".$user."' AND game_id=$game");
    if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
    $row=  mysqli_fetch_array($result);
    echo 'kushal';
    $res=mysqli_query($con, "SELECT * FROM multimedia.games WHERE id=$game");
    $row2=  mysqli_fetch_array($res);
    $cur_rate=$row2['rating'];
    $num_rated=$row2['times_rated'];
    if(!$row)
    {
        $result2=  mysqli_query($con, "INSERT INTO multimedia.ratings (game_id,user_id,user_rating) values($game,'".$user."',$gamerating)");
        $new_rate=($cur_rate*$num_rated+$gamerating)/($num_rated+1);
        $num_rated+=1;
        mysqli_query($con, "UPDATE multimedia.games SET rating=$new_rate,times_rated=$num_rated WHERE id=$game");
    }
 else {
     $prev_rate=$row['user_rating'];
       $result2=  mysqli_query($con, "UPDATE multimedia.ratings SET user_rating=$gamerating where game_id=$game and user_id='".$user."' "); 
          $new_rate=($cur_rate*$num_rated+$gamerating-$prev_rate)/($num_rated);
           mysqli_query($con, "UPDATE multimedia.games SET rating=$new_rate WHERE id=$game");
    }


mysqli_query($con, "UPDATE multimedia.games SET views=views-1 WHERE id=$game");
header('Location: gameplay.php?gameid='.$game);
?>