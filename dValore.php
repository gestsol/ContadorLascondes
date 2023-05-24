<?php

//include "./hash.php";

$hashed="68d5c08e6e4d5b6c33ce47cc488a62e7";

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



$Fechafinal = preg_split("/\:/", $asdasd);

print_r($Fechafinal);
//Vamos a capturar los datos a la mitad


$idVehiculo1 = $Fechafinal[17];
$Patente1 = $Fechafinal[18];

$idVehiculo2 = $Fechafinal[32];
$Patente2 = $Fechafinal[33];

$idVehiculo3 = $Fechafinal[47];
$Patente3 = $Fechafinal[48];

$idVehiculo4 = $Fechafinal[62];
$Patente4 = $Fechafinal[63];

$idVehiculo5 = $Fechafinal[77];
$Patente5 = $Fechafinal[78];

$idVehiculo6 = $Fechafinal[92];
$Patente6 = $Fechafinal[93];

$idVehiculo7 = $Fechafinal[107];
$Patente7 = $Fechafinal[108];

$idVehiculo8 = $Fechafinal[122];
$Patente8 = $Fechafinal[123];

echo $idVehiculo9 = $Fechafinal[137];
echo $Patente9 = $Fechafinal[138];
echo "******";
echo $idVehiculo10 = $Fechafinal[152];
echo $Patente10 = $Fechafinal[153];

//Filtro final

$Valor1 = preg_split("/\,/", $idVehiculo1);

$Valor2 = preg_split("/\"/", $Patente1);

$Valor3 = preg_split("/\,/", $idVehiculo2);

$Valor4 = preg_split("/\"/", $Patente2);

$Valor5 = preg_split("/\,/", $idVehiculo3);

$Valor6 = preg_split("/\"/", $Patente3);

$Valor7 = preg_split("/\,/", $idVehiculo4);

$Valor8 = preg_split("/\"/", $Patente4);

$Valor9 = preg_split("/\,/", $idVehiculo5);

$Valor10 = preg_split("/\"/", $Patente5);

$Valor11 = preg_split("/\,/", $idVehiculo6);

$Valor12 = preg_split("/\"/", $Patente6);

$Valor13 = preg_split("/\,/", $idVehiculo7);

$Valor14 = preg_split("/\"/", $Patente7);

$Valor15 = preg_split("/\,/", $idVehiculo8);

$Valor16 = preg_split("/\"/", $Patente8);

$Valor17 = preg_split("/\,/", $idVehiculo9);

$Valor18 = preg_split("/\"/", $Patente9);

$Valor19 = preg_split("/\,/", $idVehiculo10);

$Valor20 = preg_split("/\"/", $Patente10);

//asignar valores

$IdTracker = $Valor1[0];
$PatenteTraker= $Valor2[1];

$IdTracker2 = $Valor3[0];
$PatenteTraker2= $Valor4[1];

$IdTracker3 = $Valor5[0];
$PatenteTraker3= $Valor6[1];

$IdTracker4 = $Valor7[0];
$PatenteTraker4= $Valor8[1];

$IdTracker5 = $Valor9[0];
$PatenteTraker5= $Valor10[1];

$IdTracker6 = $Valor11[0];
$PatenteTraker6= $Valor12[1];

$IdTracker7 = $Valor13[0];
$PatenteTraker7= $Valor14[1];

$IdTracker8 = $Valor15[0];
$PatenteTraker8= $Valor16[1];

$IdTracker9 = $Valor17[0];
$PatenteTraker9= $Valor18[1];

$IdTracker10 = $Valor19[0];
$PatenteTraker10= $Valor20[1];
