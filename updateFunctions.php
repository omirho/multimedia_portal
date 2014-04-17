<?php
    /*if(!isset($_SESSION['userid']))
    {
        header('Location: login.php');
    }
    else
    {
        session_start();
        $userid = $_SESSION['userid'];
    }*/
    $userid = "pulkit.arora";
?>
<?php
include "config.php";

function updateAvgRelevance()
{
	if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {
    	$sql = "SELECT AVG(relevance) As rel, tag
    			FROM videos
    			GROUP BY tag";
    	$query_run = mysql_query($sql);
    	while( $row = mysql_fetch_assoc($query_run) )
    	{
    		$tag = $row['tag'];
    		$rel = $row['rel'];
    		$GLOBALS[$tag.'Rel'] = $rel;

    		$query = "SELECT id
    				  FROM videoavgrelevance
    				  WHERE tag = '".mysql_real_escape_string($tag)."'";
    		$run = mysql_query($query);
    		if ( mysql_num_rows($run) )
    		{
	    		$query = "UPDATE multimedia_portal.`videoavgrelevance`
						  SET `relevance` = '".$rel."'
	    			  	  WHERE `tag` = '".mysql_real_escape_string($tag)."'";
	    		
	    		$run = mysql_query($query);
	    	}
	    	else	
	    	{
	    		$query = "INSERT INTO multimedia_portal.`videoavgrelevance` (`tag`, `relevance`)
					      VALUES('".mysql_real_escape_string($tag)."', 
				   			    ".mysql_real_escape_string($rel).") ";

	 			mysql_query($query);
	 		}
    		echo mysql_error();
    	}
    }
    mysql_close($con);
}



function updatetagImportance()
{
	if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {
    	$sql = "SELECT AVG(upvotes - downvotes + 5*recommendations + 0.04*views) As importance, tag
    			FROM videos
    			GROUP BY tag";
    	$query_run = mysql_query($sql);
    	while( $row = mysql_fetch_assoc($query_run) )
    	{
    		$GLOBALS[$row["tag"]] = $row["importance"];
    		$tag = $row['tag'];
    		$importance = $row['importance'];

    		$query = "SELECT id
    				  FROM videotagimportance
    				  WHERE tag = '".mysql_real_escape_string($tag)."'";
    		$run = mysql_query($query);
    		if ( mysql_num_rows($run) )
    		{
	    		$query = "UPDATE multimedia_portal.`videotagimportance`
						  SET `importance` = '".$importance."'
	    			  	  WHERE `tag` = '".mysql_real_escape_string($tag)."'";
	    		
	    		$run = mysql_query($query);
	    	}
	    	else	
	    	{
	    		$query = "INSERT INTO multimedia_portal.`videotagimportance` (`tag`, `importance`)
					      VALUES('".mysql_real_escape_string($tag)."', 
				   			    ".mysql_real_escape_string($importance).") ";

	 			mysql_query($query);
	 		}
    		echo mysql_error();
    	}
    		
    }
    mysql_close($con);
}




function insertGeneral_queries($name,$language,$userid)
{
    
    if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {
        
        $sql = "INSERT INTO general_queries(query)
                values ('".mysql_real_escape_string($userid)." ".mysql_real_escape_string($name)."'),
                       ('".mysql_real_escape_string($name)."')
                       ";
        $run = mysql_query($sql);
        echo mysql_error();


        if (strpos($name, $language) == false) 
        {
            //If name of video does n't contain langauge,
            $sql = "INSERT INTO general_queries(query)
                values ('".mysql_real_escape_string($name)." in ".mysql_real_escape_string($language)."')
                       
                       ";
            $run = mysql_query($sql);
            echo mysql_error();
            echo "adfed";
        }

    }
    mysql_close($con);
}


//insertGeneral_queries("visual c++ tutorials", "english", "krishna");


?>
