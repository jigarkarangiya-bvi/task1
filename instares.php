<?php
$url = 'https://www.instagram.com/jigar_ahir_jigs/?__a=1'; // path to your JSON file
$response = json_decode(file_get_contents($url), true);
//echo "<pre>";
//print_r($response);
$profilePage = $response['logging_page_id'];
$bio = $response['graphql']['user']['biography'];
echo $bio;
?>