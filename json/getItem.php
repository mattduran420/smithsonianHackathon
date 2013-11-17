<?php header('Access-Control-Allow-Origin: *'); ?>
<?

$url = "http://edan-api.si.edu:80/metadataService?q=record_ID%3" . $_GET['id']. "&wt=json";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, 'HACK' . ":" . "hackme2013!");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_request);
 
// Execute & get variables
$api_response = curl_exec($ch); 
$curlError = curl_error($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
// Test if there was a cURL problem (request didn't go through)
if($curlError){
 
	 echo "There was a problem making the API Call. cURL problem: $curlError"; 
 
// Tet if there is a 4XX error (request went through but erred). 
} else if(intval($http_code / 100) >=4){
 
	$decoded = json_decode($api_response); 
 
	$msg = (is_object($decoded) && isset($decoded->error->message))?$decoded->error->message:"No message reported."; 
	$msg.= " Error ID: "; 
	$msg.= (is_object($decoded) && isset($decoded->error->errorId) && !empty($decoded->error->errorId))?$decoded->error->errorId:'None provided';  
 
	echo "The API Server responded with ".$http_code.". Message was: $msg"; 
 
// Else you have a successful response. 
} else {
 	$response = json_decode($api_response);
	$response = get_object_vars($response);
	$response = $response['response'];
	$response = get_object_vars($response);
	$response = $response["docs"][0];
	$response = get_object_vars($response);
	$images = get_object_vars($response['descriptiveNonRepeating']);
	$text = get_object_vars($response['freetext']);
	$response = array("images" => $images,
		"text" => $text);
	$response['images']['online_media'] = get_object_vars($response['images']['online_media']);
	$response['images']['online_media']['media'] = get_object_vars($response['images']['online_media']['media'][0]);
	$response['images']['title'] = get_object_vars($response['images']['title']);
	$response['images']['title'] = ($response['images']['title']['content']);
	$response['text']['notes'] = get_object_vars($response['text']['notes'][0]);
	/*
	$keys = array_keys($response['text']);
	var_dump($keys);
	echo "<br/><br/>";
	var_dump($response['text']['notes']);
	*/
	echo json_encode($response);
 
}
;
?>	