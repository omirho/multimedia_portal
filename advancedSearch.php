<?php

include "config.php";
include "compareFunctions.php";


$language = '';
$userid = '';/*
$userid[0] = 'satya';
$userid[1] = 'kiran';*/
$anyOfkeyWords[0] = 'C';
$anyOfkeyWords[1] = "auto";

$allOfkeyWords[0] = 'theory';
$anyOfkeyWords[1] = "auto";

//search($anyOfkeyWords, $allOfkeyWords, '', '', '', $userid, 0 );


//supply '' or an array of keywords for $anyOfKeyWords
//supply either "" or an array for $language
//Date format is yyyy/mm/dd. supply "" if not required.
//supply either "" or an array of userids for userid. 
//supply $upvotes as 0 if not required

function search( $anyOfkeyWords, $allOfKeyWords, $language , $fromUploadDate, $toUploadDate, $userid, $upvotes )
{

    		//
    		//Preparing language search where clause
    		//
    		$langvars = array();
    		if ( $language == '')
    			$languageSearch = true;
    		else
    		{
				foreach ($language as $var)
				{	
				    if(!empty($var))
				    	$langvars[] = " language = '".addslashes($var)."' ";
				}
				$languageSearch = join(" OR ", $langvars);
			}
			$languageSearch = " (".$languageSearch.") ";
			//echo $languageSearch;


			//
			//Preparing date of upload query where clause
			//
			if ($fromUploadDate != '')
			 	$dateSearch = " time >= '".$fromUploadDate."' ";
			else $dateSearch = true;

			if ($toUploadDate != '')
				$dateSearch .= " and time <= '".$toUploadDate."' ";
			$dateSearch = " (".$dateSearch.") ";
			//echo $dateSearch;


			//
			//Preparing userid search where clause
			//
			if ($userid != '')
			{
				$uservars = array();
				foreach ($userid as $var)
				{	
				    if(!empty($var))
				    	$uservars[] = " userid = '".addslashes($var)."' ";
				}
				$useridSearch = join(" OR ", $uservars);
			}
			else
				$useridSearch = true;
			$useridSearch = " (".$useridSearch.") ";

			//echo $useridSearch;


			//
			//upvotes search where clause
			//
			$upvotesSearch = " ( upvotes >= ".$upvotes.") ";
			//echo $upvotesSearch;


			//
			//anyOfKeyWords search where clause
			//
			if ($anyOfkeyWords != '')
			{
				$keyWordvars = array();
				foreach ($anyOfkeyWords as $var)
				{	
				    if(!empty($var))
				    	$keyWordvars[] = " ( name LIKE '%".addslashes($var)."%' ) ";
				}
				$anyOfKeyWordsSearch = join(" OR ", $keyWordvars);
			}
			else
				$anyOfKeyWordsSearch = true;
			$anyOfKeyWordsSearch = " (".$anyOfKeyWordsSearch.") ";


			//
			//allOfKeyWords search where clause
			//
			if ($allOfKeyWords != '')
			{
				$keyWordvars = array();
				foreach ($allOfKeyWords as $var)
				{	
				    if(!empty($var))
				    	$keyWordvars[] = " ( name LIKE '%".addslashes($var)."%' ) ";
				}
				$allOfKeyWordsSearch = join(" AND ", $keyWordvars);
			}
			else
				$allOfKeyWordsSearch = true;
			$allOfKeyWordsSearch = " (".$allOfKeyWordsSearch.") ";



//			echo $anyOfKeyWordsSearch."<br>";
//			echo $allOfKeyWordsSearch."<br>";

//	echo $languageSearch." and ".$dateSearch." and ".$useridSearch." and ".$upvotesSearch. " and ".$anyOfKeyWordsSearch." and ".$allOfKeyWordsSearch;
		

		$sql = "SELECT  *
				FROM videos
                where ".$languageSearch." and 
                	  ".$dateSearch." and 
                	  ".$useridSearch." and 
                	  ".$upvotesSearch." and
                	  ".$anyOfKeyWordsSearch." and
                	  ".$allOfKeyWordsSearch."
				group by hash";

//////////////////////////////////////////////////////////
//Database query
/////////////////////////////////////////////////////////

	$data = "";
    if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        $result = "DBCONNECTION_ERROR";
    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
        $result = "DBCONNECTION_ERROR";
    else 
    {
    	$query_run = mysql_query($sql);
        mysql_error();
        $counter = 0;

        if ( mysql_num_rows($query_run) != 0 )
	    {
	        while ($row = mysql_fetch_assoc($query_run)) 
	        {
	        	$data[$counter] = new video();
	        	$data[$counter]->upvotes = $row["upvotes"];
        		$data[$counter]->downvotes = $row["downvotes"];
        		$data[$counter]->views = 	$row["views"];
        		$data[$counter]->userid = $row["userid"];
        		$data[$counter]->hash = $row["hash"];
        		$data[$counter]->name = $row["name"];
        		$data[$counter]->description = $row["description"];
        		$data[$counter]->extention = $row["extention"];
        		$data[$counter]->code = $row["code"];
        		$data[$counter]->totalRelevance = $row["upvotes"]-$row["downvotes"];
        		$counter++;
	        }
	        $data = record_sort($data, "totalRelevance");
	        $result = "SUCCESS";
	        /*foreach($data as $var)
	        	echo $var->name."<br>";
	    */}
	    else $result = "NO RESULTS FOUND";
    }

    /*if ( session_status() == PHP_SESSION_NONE )
            session_start();
    */$_SESSION['getResultsResult'] = $result;
        

    mysql_close($con);
    return $data;


		
}


class video {
    public $upvotes, $downvotes, $views, $hash, $name,
    	   $userid, $recommendations, $totalRelevance, $description, $extention,$code;
}



?>