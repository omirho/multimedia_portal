<?php
	
	//require "config.php";
	function recommendations($userid)
	{
		$videos = "";

		if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        	$result = "DBCONNECTION_ERROR";
	    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
	        $result = "DBCONNECTION_ERROR";
	    else 
	    {
	    	$languages = getLanguages($userid);
	    	$tags = getTags($userid);

	    	//calculating language search string
	    	if ( $languages == '' )
	    		$languageSearch = true;
	    	else
	    	{
		    	$langvars = array();
				foreach ($languages as $var)
				{	
				    if(!empty($var))
				    	$langvars[] = " language = '".$var."'";
				}
				$languageSearch = join(" OR ", $langvars);
				$languageSearch = " ( ".$languageSearch." ) ";
			}
			////echo $languageSearch;
			
			
			//getting all tags by adding some more tags.
			$totalVotes = 0;
			
			if ($tags == "")
			{
				//user haven't upvoted any video as of now.
				//randomnly select 12 tags	
				$tags = getRandomTags(12);
			}
			else
			{
				foreach ($tags as $key) {
					$totalVotes += $key->count;
				}
			}

			if ( $totalVotes < 6 )
			{
				$additionalTags = getRandomTags( 12 - $totalVotes );
				$tags = array_merge($tags, $additionalTags);
			}

/*				foreach ($tags as $key ) {
					//echo $key->tag. "     ".$key->count."<br>";
				}
				//echo "<br><br>";
*/			

			//Tags have been formed upto now. Now, group tags
			for ($i = 0; $i < count($tags); $i++)
			{
				if ( $tags[$i]->count > 0 )
				{
					for ($j = $i + 1; $j < count($tags); $j++)
					{
						if ($tags[$j]->tag == $tags[$i]->tag)
						{
							$tags[$i]->count += $tags[$j]->count;
							$tags[$j]->count = 0;
						}
					}
					$finalTags[] = $tags[$i];
				}
			}
			$tags = $finalTags;


				foreach ($tags as $key ) {
					//echo $key->tag. "     ".$key->count."<br>";
				}
			


				//Prepare for tag search where clause
				$tagvars = array();
				foreach ($tags as $var)
				{
				    if(!empty($var) and !empty($var))
				    	$tagvars[] = " tag = '".$var->tag."' ";
				}

				$tagSearch = join(" OR ", $tagvars);
				$tagSearch = " (".$tagSearch.") ";
				////echo $tagSearch;
				////echo '<br>';
				////echo $languageSearch;
				
				$sql = "SELECT *
						from videos
						where ".$languageSearch." and ".$tagSearch."
						group by hash
						ORDER BY (upvotes-downvotes) DESC
						LIMIT 6";

				$query_run = mysql_query($sql);
				if ($query_run)
				{
					$counter = 0;
					while($row = mysql_fetch_assoc($query_run))
					{
						$videos[$counter] = new video;
						//echo $row["name"].'<br>';
						$videos[$counter]->upvotes = $row["upvotes"];
		        		$videos[$counter]->downvotes = $row["downvotes"];
		        		$videos[$counter]->views = 	$row["views"];
		        		$videos[$counter]->userid = $row["userid"];
		        		$videos[$counter]->hash = $row["hash"];
		        		$videos[$counter]->name = $row["name"];
		        		$videos[$counter]->recommendations = $row["recommendations"];
		        		$videos[$counter]->description = $row["description"];
		        		$videos[$counter]->extention = $row["extention"];
		                $videos[$counter]->code = $row["code"];
		        		
						$counter++;
					}
				}
				else
					//echo mysql_error();
			
	    	mysql_close($con);
		}
		return $videos;

	}


	function getTags($userid)
	{
		$tags = '';
		if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        	$result = "DBCONNECTION_ERROR";
	    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
	        $result = "DBCONNECTION_ERROR";
	    else 
	    {
	    	$sql = "SELECT tag, count(tag) as cnt
	    			from votes
	    			where userid = '".mysql_real_escape_string($userid)."' and vote = 1
	    			group by tag";

	    	$run = mysql_query($sql);
	    	$count = 0;
	    	while ( $row = mysql_fetch_assoc($run) )
	    	{
	    		$tags[$count] = new tagClass;
	    		$tags[$count]->count = $row["cnt"];
	    		$tags[$count]->tag = $row["tag"];
	    		//echo $row["tag"]. '   '.$row["cnt"].'<br>';
	    		$count++;
	    	}
	    }
	    return $tags;	
	}


	function getLanguages($userid)
	{
		$languages = '';
		if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        	$result = "DBCONNECTION_ERROR";
	    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
	        $result = "DBCONNECTION_ERROR";
	    else 
	    {
	    	$sql = "SELECT language
	    			from votes
	    			where userid = '".mysql_real_escape_string($userid)."' and vote = 1
	    			group by language";

	    	$run = mysql_query($sql);
	    	$count = 0;
	    	while ( $row = mysql_fetch_assoc($run) )
	    	{
	    		$languages[$count] = $row["language"];
	    		//echo '<br>'.$row["language"].'<br>';
	    		$count++;
	    	}
	    }
	    return $languages;
	}

	function getMaxId()
	{
		$maxId = 10;
		if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        	$result = "DBCONNECTION_ERROR";
	    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
	        $result = "DBCONNECTION_ERROR";
	    else 
	    {
				$sql_query = "SELECT MAX(id) as maxId 
							  from videokeywords";
				
				$query_run = mysql_query($sql_query);
				if ($query_run)
				{
					while($row = mysql_fetch_assoc($query_run))
						$maxId = $row["maxId"];
				}
				else
				{	//echo mysql_error();
				}
				
		}
		//echo "maxId = ".$maxId;
		return $maxId;
	}

	function getRandomTags($number)
	{
		$tags = "";
		if (!($con = mysql_connect(constant("HOSTNAME"), constant("USERNAME"), constant("PASS"))))
        	$result = "DBCONNECTION_ERROR";
	    else if (!($select = mysql_select_db(constant("DBNAME"), $con)))
	        $result = "DBCONNECTION_ERROR";
	    else 
	    {
	    		//calucalate max number of id in videokeywords videosbase
				$maxId = getMaxId();

				$count = 0;					
				for( $i = 0; $i < $number; $i++ )
				{
					$id = 1 + rand()%$maxId;
					$sql = "SELECT tag
							from multimedia_portal.videokeywords
							where id = ".$id;
					$query_run = mysql_query($sql);
					if ($query_run and mysql_num_rows($query_run))
					{
						$row = mysql_fetch_assoc($query_run);
						$tags[$count] = new tagClass;
						$tags[$count]->tag = $row["tag"];
						$tags[$count]->count = 1;
						$count++;
					}
					else
					{	//echo mysql_error();
				}
			}
/*
				foreach ($tags as $key ) {
					//echo $key->tag. "     ".$key->count."<br>";
				}*/
		}
		return $tags;
	}

	//getMaxId();
	recommendations("satya");
	/*getTags("satya");
	getLanguages("satya");*/
	
	class tagClass
	{
		public $tag, $count;
	}
	class video {
    public $upvotes, $downvotes, $views, $hash, $name,
    	   $userid, $totalRelevance, $description, $extention,$code;
}

?>