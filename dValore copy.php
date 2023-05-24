<?php

include "./hash.php";

$iii = curl_init();

curl_setopt_array($iii, array(
  CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/tracker/list',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"hash": "'.$hashed.'"}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$asdasd = curl_exec($iii);


$json = json_decode($asdasd);

$lista=$json->list;
$i=0;

foreach ($lista as $item){

   $patente=$item->label ;
   $id_tracker=$item->id ;

  $patentes[$i]=$patente;
  $id_trackers[$i]=$id_tracker;

  $i++;

}

var_dump($patentes);
var_dump($id_trackers);

