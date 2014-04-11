<?php include 'mysql/class.MySQL.php';?>
<?php
   function getList(){
   		$dat = new MySQL();
   		$row =  $dat->Select('videos',"","views,upvotes");
   		$count=0;
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
    		$count++;
       	}
   		  return $data;

   }
   class videos{
	public $upvotes, $downvotes, $views, $hash, $name, $userid, $description,$code;

	}
?>