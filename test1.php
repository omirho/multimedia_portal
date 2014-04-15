<?php 
	//session_start();
	//if(isset($_SESSION['userid']))
	//{
		//$userid = $_SESSION['userid'];
		$userid = "pulkit.arora";
		$type = $_REQUEST['type'];
		$value = $_REQUEST['value'];
		if($type == "video")
			$code = $_REQUEST['v'];
		else if($type == "image")
			$code = $_REQUEST['i'];
		if(($type == "video" or $type == "image") and ($value == 1 or $value == -1))
		{
			require 'mysql/class.MySQL.php';
			$data = new MySQL;
			$abc = array("type"=>$type,"code"=>$code,"userid"=$userid);
			$row = $data->Select("votes",$abc);
			if($data->records == 1)
			{
				$data1 = new MySQL;
				$abc1 = array("type"=>$type,"code"=>$code,"userid"=$userid);
				$row1 = $data->Update("votes",$abc);
			}
			else if($data->records == 0)
			{
				$data1 = new MySQL;
				$abc1 = array("type"=>$type,"code"=>$code,"userid"=$userid);
				$row1 = $data->Insert("votes",$abc);
			}
			else
				echo "No Success";
		}
		else
			echo "No Success";
	//}
	else
		echo "No Success";
?>
