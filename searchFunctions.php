
<!-- 
similar to updateTagImportance, make similar one to relevances.
include probabilities for tags
 -->


<?php

//include "config.php";
include "updateFunctions.php";
include "compareFunctions.php";

function getTags($query)
{
	$tags = "";
	$query = strtolower($query);
    //echo "query = ".$query."<br>"; 
	if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {
    	$sql = "SELECT * 
    			FROM videokeywords
    			WHERE '".mysql_real_escape_string($query)."' LIKE CONCAT('%', keyWord , '%')
    			group by groupById";
    
    	$query_run = mysql_query($sql);
    	$count = 0;

    	while( $row = mysql_fetch_assoc($query_run) )
    	{
            //echo "tag found = ".$row['tag']."<br>";
    		$tags[$count] = $row["tag"];
    		$count++;
    	}
    	if( $count == 0 )
    		$result = "NO TAGS FOUND";
    	else
    		$result = "SUCCESS";
    }
    	
    /*if ( session_status() == PHP_SESSION_NONE )
        session_start();*/
    $_SESSION['getTagsResult'] = $result;

    mysql_close($con);
	return $tags;    
}





function getTokens($query)
{
    
    $queryTokens = explode(" ", $query);
    
    if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {

        if ( $query != '' )
        {
            foreach($queryTokens as $var)
            {
                if(!empty($var))
                    $newvars[] = " token = '".addslashes($var)."' ";
            }
        
           $tokenSearch = join(" OR ", $newvars);
        }
        else $tokenSearch = 0;

        //echo $tokenSearch."<br>";

        $sql = "SELECT token
                from commontokens
                where ".$tokenSearch;

        $run = mysql_query($sql);

        $count = 0;
        while ( $row = mysql_fetch_assoc($run) )
        {
            //echo $row['token']."<br>";
            $removeTokens[$count] = $row['token'];
            $count++;
        }

        mysql_close($con);

        if ($count > 0)
        {

            $found = false; //stores if atleast non common token is found.
            //If useless tokens are found....
            for( $i = 0; $i < count($queryTokens); $i++ )
            {
                for( $j = 0; $j < $count; $j++ )
                {
                    if ( $queryTokens[$i] == $removeTokens[$j] )
                        break;
                }
                if ( $j == $count )
                {
                    $found = true;
                    $returnTokens[] = $queryTokens[$i];
                }
            }
            
            if ($found)
                return $returnTokens;
            else
                return "";  //returns an empty string if no key word is extracted.
        }
        else return $queryTokens;
    }
}

//getTokens("by and");

function search($query, $tags, $language)
{
	
	$tagsByKeyWords = getTags($query);
	if( $_SESSION['getTagsResult'] == "SUCCESS" )
	{
		if ( $tags == "" )
			$tags = $tagsByKeyWords;
		else	
			$tags = array_merge($tags, $tagsByKeyWords);
	}

    if ($query != '')
        $queryTokens = getTokens($query);
    else $queryTokens = '';

    updateAvgRelevance();
	updatetagImportance();
	clcAvgRelevance();
	clcImportanceOfTags();
    /*foreach ($tags as $i)
        echo $i;
	*/return getResults($query, $tags, $queryTokens, $language);
}



function getResults($query, $tags, $queryTokens, $language )
{
	$result;
	$data = "";

    if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {

		$newvars = array();
		
        //Extracting tag search query
        $tagSearch = "";
        if ( $tags != '' )
        {
            foreach($tags as $var)
    		{
    		    if(!empty($var))
    		    	$newvars[] = " tag = '".addslashes($var)."'";
    		}
        
	   	   $tagSearch = join(" OR ", $newvars);
		}
        else $tagSearch = 0;


        //Doing substring search in name
        if ( $tags == "" or count($tags) < 3 )
        {
            //If no tags are found, then do substring search
            if ( $queryTokens != '' )
            {
                foreach($queryTokens as $var)
                {
                    if(!empty($var))
                        $newvars[] = " name LIKE '%".addslashes($var)."%' ";
                }
               $tagSearch .= " OR ";
               $tagSearch .= join(" OR ", $newvars);
            }
            else
                $tagSearch = 0;
        }

        //echo "tag search = ".$tagSearch."<br>";



        //extracting language search query
		if ( $language == '' )
		{	
            $languageSearch = true;
        }
        else
        {
            $langvars = array();
            foreach ($language as $var)
            {   
                if(!empty($var))
                    $langvars[] = " language = '".$var."'";
            }
            $languageSearch = join("OR", $langvars);
        }    
		//	echo "language search = ".$languageSearch."<br>";


		
        $sql = "SELECT  * , sum( relevance ) as rel, datediff(NOW(), time) as diffDate 
				FROM videos
                where ".$languageSearch." and ( (".$tagSearch.") or '".mysql_real_escape_string($query)."' LIKE CONCAT('%', userid , '%') ) 
				group by hash";
		
                
		$query_run = mysql_query($sql);
        mysql_error();
        $counter = 0;
        while ($row = mysql_fetch_assoc($query_run)) 
        {
           // echo $row['name']."  ".$row['rel']."<br><br>";
        	if ($query == '' or $query == 'Enter search here')
        		$dpValue = '50';
        	else
        		$dpValue = compare($query, $row['name']);
        	
        	//if ( $dpValue < 60 )
        	{	
        		$importance = $row["upvotes"] - $row["downvotes"] + (0.04)*$row["views"] + 5*$row["recommendations"];
        		$daysImportance = 100/( pow(1.2,$row["diffDate"]) + 2);

                
            		if ( $dpValue < 4 )
            			$dpValue = 500;
            		else $dpValue = -120 * log10( $dpValue / 50 );
                
        		$data[$counter] = new video;
        		
        		//
        		//Make sure to delete objects after usage
        		//
        		
        		$data[$counter]->upvotes = $row["upvotes"];
        		$data[$counter]->downvotes = $row["downvotes"];
        		$data[$counter]->views = 	$row["views"];
        		$data[$counter]->userid = $row["userid"];
        		$data[$counter]->hash = $row["hash"];
        		$data[$counter]->name = $row["name"];
        		$data[$counter]->recommendations = $row["recommendations"];
        		$data[$counter]->description = $row["description"];
        		$data[$counter]->extention = $row["extention"];
                $data[$counter]->code = $row["code"];
        		
        		$data[$counter]->totalRelevance = $dpValue + $daysImportance;

                //echo "tag = ".$row['tag']."<br>";
        		if ( $GLOBALS[$row["tag"]] == 0 )
        			$data[$counter]->totalRelevance += $importance/100 ;
        		else
        			$data[$counter]->totalRelevance += $importance*100/$GLOBALS[$row["tag"]] ;

        		if ( $GLOBALS[$row["tag"]."Rel"] == 0 )
        			$data[$counter]->totalRelevance += $row["rel"]/100;
        		else
        			$data[$counter]->totalRelevance += $row["rel"]*100/$GLOBALS[$row["tag"]."Rel"];

        		//echo $row["name"]. " ". $importance. " ". $importance*100/$GLOBALS[$row["tag"]]. " ". $dpValue."<br>";
            	$counter++;
            }
        }

        mysql_error();
        if ( $counter == 0 )
        	$result = "NO RESULTS FOUND";
        else
        {

			$data = record_sort($data, "totalRelevance");
        	//echo "<br><br>";
        	//foreach ($data as $i)
        	//	echo $i->name . " " . $i->totalRelevance ."<br>";
        	//echo "<br><br>";
        	$result = "SUCCESS";
        }

    }

    /*if ( session_status() == PHP_SESSION_NONE )
            session_start();*/
    $_SESSION['getResultsResult'] = $result;
        
    mysql_close($con);
    return $data;
}

class video {
    public $upvotes, $downvotes, $views, $hash, $name,
    	   $userid, $recommendations, $totalRelevance, $description, $extention,$code;
}



function clcImportanceOfTags()
{
    if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {
    	$sql = "SELECT *
    			FROM videotagimportance";

    	$query_run = mysql_query($sql);
    	while( $row = mysql_fetch_assoc($query_run) )
    	{
    		$GLOBALS[$row["tag"]] = $row["importance"];
    	}
    }
    mysql_close($con);
}


function clcAvgRelevance()
{
    if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {
    	$sql = "SELECT *
    			FROM videoavgrelevance";

    	$query_run = mysql_query($sql);
    	while( $row = mysql_fetch_assoc($query_run) )
    	{
    		$GLOBALS[$row["tag"]."Rel"] = $row["relevance"];
    	}
    }
    mysql_close($con);
}


//search("finite automata");

?>