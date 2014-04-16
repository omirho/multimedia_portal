<?php include 'class.MySQL.php';?>
<?php
   function getList($query){
   		$dat = new MySQL();
   		$row =  $dat->Select('videos',"",$query);
   		$count=0;
   		if(is_array($row)==1)
   		{
   			while($count<$dat->records)//$row = mysql_fetch_assoc($result))
    		{
    			$data[$count] = new videos;
    			$flag = true;
    		
    			//description of the each entry related to the video
    			$data[$count]->upvotes = $row[$count]['upvotes'];
    			$data[$count]->downvotes = $row[$count]['downvotes'];
    			$data[$count]->views = $row[$count]['views'];
	    		$data[$count]->userid = $row[$count]['userid'];
    			$data[$count]->name = $row[$count]['name'];
    			$data[$count]->hash = $row[$count]['hash'];
	    		$data[$count]->description = $row[$count]['description'];
    			$data[$count]->code = $row[$count]['code'];
    			$data[$count]->image = $row[$count]['hash'];
          $data[$count]->time = $row[$count]['time'];
    			$count++;
       		}
       		return $data;
       	}
       	else{
       		$data = new videos;
       		$data->upvotes = $row['upvotes'];
       		$data->downvotes = $row['downvotes'];
       		$data->views = $row['views'];
       		$data->userid = $row['userid'];
       		$data->name = $row['name'];
       		$data->hash = $row['hash'];
       		$data->description = $row['description'];
       		$data->code = $row['code'];
       		$data->image = $row['hash'];
          $data->time = $row['time'];
       		return $data;
       	}
   		  

   }
   class videos{
	public $upvotes, $downvotes, $views, $hash, $name, $userid, $description,$code,$image,$time;

	}
?>