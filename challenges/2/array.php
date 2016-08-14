<?PHP
	/* META+Lab Challenge 
	 * Ivan Chacon
	 * 
	 */
	 
	$post_num = substr($_SERVER[REQUEST_URI], 36);//substrings my file directory past '?'

	$myList = array();
	$first = 0;
	$second = 1;
	array_push($myList, $first);
	array_push($myList, $second);
	
	for($i = 2; $i < $post_num; $i++){
		$third = $first + $second;
		array_push($myList, $third);
		$first = $second;
		$second = $third;
	}	
	
 	$theData = array('status' => http_response_code(),
				  'success' => "true",
				  'version' => "JSON-Array-0.1",
				  'Fibonacci' => $post_num,
				  'numbers' => $myList
	); 

	echo json_encode($theData, JSON_PRETTY_PRINT);
?>
