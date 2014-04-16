<?php

	include "config.php";

	if ( isset($_REQUEST["query"]) and (!empty($_REQUEST["query"])) )
	{
		//$suggestion = '<ul><li>NO RESULTS FOUND</li></ul>';
		//$suggestion[] = "NO RESULTS FOUND";
		if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
	        $result = "DBCONNECTION_ERROR";
	    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
	        $result = "DBCONNECTION_ERROR";
	    else 
	    {
	    	$query = $_REQUEST["query"];
		    	
		if ( strlen($query) <= 4 )
		{
			$sql = "SELECT * 
	    			from general_queries
	    			where query LIKE '".mysql_real_escape_string($query)."%'
				ORDER BY frequency DESC ";
		}
		else
		{
			$sql = "SELECT * 
	    			from general_queries
	    			where query LIKE '%".mysql_real_escape_string($query)."%'
				ORDER BY frequency DESC ";	
		}

	    	$run = mysql_query($sql);
	    	if ( mysql_num_rows($run) )
	    	{
			$count = 0;
	    		//$suggestion = '<ul>';
	    		while( $row = mysql_fetch_assoc($run) )
	    		{
				if ( $count < 5 )
						$suggestion[] = $row['query'];
	    				//$suggestion .= "<li onClick=\"fill('".$row['query']."');\">".$row['query']."</li>";
				else
					break;
				$count++;   		
			}
	    		//$suggestion .= '</ul>';
	    	}
	    	
	    }	
	    echo json_encode($suggestion);
	}

?>
