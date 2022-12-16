<?php

// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "http://localhost/sanja/allWordsJson.php");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

curl_close($ch);
$output = json_decode($output);

$json = json_encode($output->data);

//write json to file
if (!file_put_contents("data.json", $json)){
 header("location: admin.php?p=Error");
 exit();
}
header("location: admin.php?p=Updated JSON successfuly");


// close curl resource to free up system resources
