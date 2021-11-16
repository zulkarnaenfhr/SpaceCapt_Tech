<?php

// Initializing curl
$curl = curl_init();
	
// Sending GET request to reqres.in
// server to get JSON data
curl_setopt($curl, CURLOPT_URL,
	"http://localhost/phpDasar/6.%20Tugas%20Rest%20Api/Function%20API/Pegawai/readPegawai.php");
	
// Telling curl to store JSON
// data in a variable instead
// of dumping on screen
curl_setopt($curl,
	CURLOPT_RETURNTRANSFER, true);
	
// Executing curl
$response = curl_exec($curl);

// Checking if any error occurs
// during request or not
if($e = curl_error($curl)) {
	echo $e;
} else {
	
	// Decoding JSON data
	$decodedData =
		json_decode($response, true);
		
	// Outputing JSON data in
	// Decoded form
	var_dump($decodedData);
}

// Closing curl
curl_close($curl);
?>

