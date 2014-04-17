<?php
	include "config.php";


    if ( isset($_POST['hash']) and !empty($_POST['hash']) )
    {
		if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
	        $result = "DBCONNECTION_ERROR";
	    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
	        $result = "DBCONNECTION_ERROR";
	    else 
	    {
	    	$hash = $_POST['hash'];
	    	$sql = "SELECT relevance
	    			from videos
	    			where hash = '".mysql_real_escape_string($hash)."'";
	    	$query_run = mysql_query($sql);
	    	if ( $query_run )
	    	{
	    		while ($row = mysql_fetch_assoc($query_run))
	    		{
	    			$relevance = $row['relevance'];
	    			$newRelevance = $relevance + 1;

	    			$query = "UPDATE videos
	    					  SET relevance = " . $newRelevance ;
	    			
	    		}		
	    	}

	    	mysql_close($con);
	    }

?>