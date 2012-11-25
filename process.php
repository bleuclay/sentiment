<?php

function post_curl($uri, $fields) {
  $output = "";
  $fields_string = "";
  foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
  rtrim($fields_string,'&');
  try {
    $ch = curl_init($uri);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch,CURLOPT_POST,count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    $output = curl_exec($ch);
  } catch (Exception $e) {
  }
  return $output;
}

$fields = $_GET["txt"];
$url = "http://api.metalayer.com/s/datalayer/1/bundle";

$output = post_curl($url, $fields);
echo $output;

?>