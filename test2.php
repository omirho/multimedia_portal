<?php
	//session_start();
	//if(isset($_SESSION['userid']))
	//{
		//$userid = $_SESSION['userid'];
		if(isset($_REQUEST["text"]) and isset($_REQUEST["type"]) and isset($_REQUEST["code"]))
		{
			require 'mysql/class.MySQL.php';
			$userid = "pulkit.arora";
			$text = $_REQUEST["text"];
			$type = $_REQUEST["type"];
			$code = $_REQUEST["code"];
			$data = new MySQL;
			$abc = array("type"=>$type,"code"=>$code,"userid"=>$userid,"description"=>$text);
			$row = $data->Insert($abc,"comments");
			echo "Success";
		}
		else
			echo "No Success";
	//}
	//else
	//	echo "No Success";
?>