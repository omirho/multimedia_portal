<?php


function minimumVal($i, $j, $k)
{
	if ( $i < $j )
		$minimum = $i;
	else
		$minimum = $j;

	if ( $minimum > $k )
		$minimum = $k;

	return $minimum;
}

function compare($query, $entry)
{
	$query_length = strlen($query);
	$entry_length = strlen($entry);

	$query = strtolower($query);
	$entry = strtolower($entry);
	$gapValue = 1.5;
	$difValue = 3;

	//$temp = array();
	$sol = array();
	$i = 0;
	$j = 0;
	for($i = 0; $i <= $entry_length; $i++)
		$temp[$i] = $gapValue * $i;

	for($i = 1; $i <= $query_length; $i++)
	{
		$sol[0] = $i*$difValue;
		for($j = 1; $j <= $entry_length; $j++)
		{
			if ($entry[$j-1] == $query[$i-1])
				$sol[$j] = minimumVal( $temp[$j-1] , $temp[$j] + $gapValue , $sol[$j-1] + $gapValue );
			else
				$sol[$j] = minimumVal( $temp[$j-1] + $difValue, $temp[$j] + $gapValue, $sol[$j-1] + $gapValue );
		}
		for($j = 0; $j <= $entry_length; $j++ )
			$temp[$j] = $sol[$j];
	}
	return $sol[$entry_length];
}

function record_sort($records, $field, $reverse=true)
{
    $hash = array();
   
    foreach($records as $record)
    {
        $hash[$record->$field] = $record;
    }
   
    ($reverse)? krsort($hash) : ksort($hash);
   
    $records = array();
   
    foreach($hash as $record)
    {
        $records []= $record;
    }
   
    return $records;
}
?>
