<?php
	//session_start();
	//if(isset($_SESSION['userid']))
	//{
		//$userid = $_SESSION['userid'];
		require 'mysql/class.MySQL.php';
		$userid = "pulkit.arora";
		$text = $_REQUEST["text"];
		$type = $_REQUEST["type"];
		$code = $_REQUEST["code"];
		$data = new MySQL;
		$abc = array("type"=>$type,"code"=>$code,"userid"=>$userid,"description"=>$text);
		$row = $data->Insert($abc,"comments");
	//}
	//else
	//	echo "No Success";
?>