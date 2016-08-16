<?PHP
	/* META+Lab Challenge 
	 * Ivan Chacon
	 *  
	 * RUN IN TERMINAL USING: ' curl http://www.csun.edu/~iuc73663/META+challenge/flat_file.php?id=N' where N is some number between 1-9
	 */
	
	
	$statusCode = http_response_code();
	$success = false;
	if($statusCode == 200){
		$success = true;
	}

	$id = $_GET["id"] - 1; //grab 'id' from url
	

	$firstName = null;
	$lastName = null;
	$persona = null;
	$sex = null;

	$myList = array(); //array of arrays that reads off document
	
	//$file = fopen('../../list.csv', 'r'); //used for ftp.csun.edu
	$file = fopen('list.csv', 'r'); //used for localhost
	while (($line = fgetcsv($file)) !== FALSE) { 
		array_push($myList, $line); //each line holds an array of each individual id
	}
	fclose($file);

	if($id >= 0 and $id < 9){
		$firstName = $myList[$id][1];
		$lastName = $myList[$id][2];
		$persona = $myList[$id][3];
		$sex = $myList[$id][4];
		$id = $id + 1;
	}
	else{
		$id = null;
	}

	$array = [
	    "id" => $id,
	    "first-name" => $firstName,
	    "last-name" => $lastName,
	    "persona" => $persona,
	    "sex" => $sex
	];
	
	
 	$theData = array('status' => $statusCode,
				  'success' => $success,
				  'version' => "JSON-Flat-File-0.1",
				  'hero' => (object)$array
	); 
	
	echo json_encode($theData, JSON_PRETTY_PRINT)."\n"; //JSON print
?>