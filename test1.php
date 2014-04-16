<?php 
	//session_start();
	//if(isset($_SESSION['userid']))
	//{
		//$userid = $_SESSION['userid'];
		$userid = "pulkit.arora";
		$type = $_REQUEST['type'];
		$value = $_REQUEST['value'];
		$lang = $_REQUEST['language'];
		$tag = $_REQUEST['tag'];
		if($type == "videos")
			$code = $_REQUEST['v'];
		else if($type == "images")
			$code = $_REQUEST['i'];
		if(($type == "videos" or $type == "images") and ($value == 1 or $value == -1))
		{
			require 'mysql/class.MySQL.php';
			$data = new MySQL;
			$abc = array("type"=>$type,"code"=>$code,"userid"=>$userid);
			$row = $data->Select("votes",$abc);
			if($data->records == 1)
			{
				$data1 = new MySQL;
				$abc1 = array("vote"=>$value);
				$row1 = $data1->Update("votes",$abc1,$abc);
				if($value == 1)
				{
					$data2 = new MySQL;
					$tem = $data2->Select($type,array("code"=>$code));
					$temp1 = $tem['upvotes']+1;
					$temp2 = $tem['downvotes']-1;
					$abc2 = array("upvotes"=>$temp1,"downvotes"=>$temp2);
					$row2 = $data->Update($type,$abc2,array("code"=>$code));
				}
				else
				{
					$data2 = new MySQL;
					$tem = $data2->Select($type,array("code"=>$code));
					$temp1 = $tem['upvotes']-1;
					$temp2 = $tem['downvotes']+1;
					$abc2 = array("upvotes"=>$temp1,"downvotes"=>$temp2);
					$row2 = $data->Update($type,$abc2,array("code"=>$code));
				}
				echo "Success";
			}
			else if($data->records == 0)
			{
				$data1 = new MySQL;
				$abc1 = array("type"=>$type,"code"=>$code,"userid"=>$userid,"vote"=>$value,"tag"=>$tag,"language"=>$lang);
				$row1 = $data1->Insert($abc1,"votes");
				if($value == 1)
				{
					$data2 = new MySQL;
					$tem = $data2->Select($type,array("code"=>$code));
					$temp1 = $tem['upvotes']+1;
					$temp2 = $tem['downvotes'];
					$abc2 = array("upvotes"=>$temp1,"downvotes"=>$temp2);
					$row2 = $data->Update($type,$abc2,array("code"=>$code));
				}
				else
				{
					$data2 = new MySQL;
					$tem = $data2->Select($type,array("code"=>$code));
					$temp1 = $tem['upvotes'];
					$temp2 = $tem['downvotes']+1;
					$abc2 = array("upvotes"=>$temp1,"downvotes"=>$temp2);
					$row2 = $data->Update($type,$abc2,array("code"=>$code));
				}
				echo "Success";
			}
			else
				echo "No Success";
		}
		else
			echo "No Success";
	//}
	//else
	//	echo "No Success";
?>
