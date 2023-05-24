<?php
//include "hash.php";

$hashed="68d5c08e6e4d5b6c33ce47cc488a62e7";

include "dValore.php";


//confirmacion de datos
echo $IdTracker . "<br>";
echo $PatenteTraker . "<br>";

echo $IdTracker2 . "<br>";
echo $PatenteTraker2 . "<br>";

echo $IdTracker3 . "<br>";
echo $PatenteTraker3 . "<br>";

echo $IdTracker4 . "<br>";
echo $PatenteTraker4 . "<br>";

echo $IdTracker5 . "<br>";
echo $PatenteTraker5 . "<br>";

echo $IdTracker6 . "<br>";
echo $PatenteTraker6 . "<br>";


echo $IdTracker7 . "<br>";
echo $PatenteTraker7 . "<br>";


echo $IdTracker8 . "<br>";
echo $PatenteTraker8 . "<br>";

echo $IdTracker9 . "<br>";
echo $PatenteTraker9 . "<br>";

echo $IdTracker10 . "<br>";
echo $PatenteTraker10 . "<br>";



for ($i=10177116; $i <= 10177125 ; $i++) { 

  include "conexion.php";

    $curll = curl_init();
    
    curl_setopt_array($curll, array(
      CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/tracker/get_state',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{"hash": "'.$hashed.'", "tracker_id": '.$i.'}',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    
    $respuestas = curl_exec($curll);
  
    $json = json_decode($respuestas);

    $summary=$json->state;
    
    //echo $summary->source_id.PHP_EOL;

  $item = $summary->gps;
  
 // echo $item->updated.PHP_EOL;
  
  $Objetooo = $item->location;
  
    //echo $Objetooo->lat . PHP_EOL;
  //  echo $Objetooo->lng . PHP_EOL . "<br>" ;
    
  $fecha= $item->updated.PHP_EOL;
  $lat= $Objetooo->lat.PHP_EOL;
  $long= $Objetooo->lng.PHP_EOL;

 //Api de LAT Y LONG PARA DIRECCION


$DIRECCION = curl_init();

curl_setopt_array($DIRECCION, array(
  CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/geocoder/search_location',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"location":{"lat":'.$lat.',"lng":'.$long.'},"lang":"es","hash":"'.$hashed.'"}',
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json, text/plain, */*',
    'Accept-Language: es-419,es;q=0.9,en;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/json',
    'Cookie: _ga=GA1.2.728367267.1665672802; _gid=GA1.2.343013326.1670594107; locale=es; session_key=7ceae24d013dd694bdbaa06dd8bac781; check_audit=7ceae24d013dd694bdbaa06dd8bac781',
    'Origin: http://www.trackermasgps.com',
    'Referer: http://www.trackermasgps.com/',
    'User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36'
  ),
));

$VALORES = curl_exec($DIRECCION);

$Definicion = json_decode($VALORES);

$valuee=$Definicion->value.PHP_EOL;

echo $valuee;

curl_close($DIRECCION);

date_default_timezone_set('America/Santiago');
$hoy = date("Y-m-d");

$hoylog = date("Y-m-d  H:i:s");




//BIEN
  if ($i == $IdTracker) {
    
  $Contadores = curl_init();

  curl_setopt_array($Contadores, array(
    CURLOPT_URL => 'http://3.236.38.223/iklab/ikcount/api/countingdataV2?appKey=JDJiJDEwJFBPNjVzUmFTQktmMmE2aEwuZ3lqU08wLkllL2RUNzV6blhKS2xuVms2VURISDZ4SEpML1Z1OmFkbWluOklLTEFCMDA1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"dataType":"summary","locations":["WITCL001A1L4"],"filterType":1,"day":"'.$hoy.'","detailed":false,"adjEvents":false}',
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json, text/javascript, */*; q=0.01',
      'Accept-Language: es-ES,es;q=0.9',
      'Connection: keep-alive',
      'Content-Type: application/json; charset=UTF-8',
      'Cookie: iklab_session=kjdf2ovkjh098fnpod60tfjq52cljere',
      'Origin: http://3.236.38.223',
      'Referer: http://3.236.38.223/ikcount/home',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
      'X-Requested-With: XMLHttpRequest'
    ),
  ));
  
  $response = curl_exec($Contadores);
  

  $json=json_decode($response);
foreach ($json->data as $item) {
  //  echo $item->id.PHP_EOL;
   // echo $item->location_name.PHP_EOL;
    $summary=$item->summary;
    echo $summary->counting_in.PHP_EOL; #También puedes acceder así: $item->summary->counting_in
    echo $summary->counting_out.PHP_EOL;
  //  echo $summary->day.PHP_EOL.PHP_EOL;

$entrada=$summary->counting_in.PHP_EOL;
$salida=$summary->counting_out.PHP_EOL;
echo "<br>";

$aforo = $entrada - $salida;
if ($aforo < 0){
  $aforo=0;

}
}
$consulta="SELECT MAX(entrada) as maximo FROM trakers  WHERE patente= '$PatenteTraker' AND fechaConsulta='$hoy'" ;

$consultasalida="SELECT MAX(salida) as maximoS FROM trakers  WHERE patente= '$PatenteTraker' AND fechaConsulta='$hoy'" ;

    include 'Maximo.php';
    include 'maximosalidas.php';

    $entraAcumula = $entrada - $maxi;
    $salidaAcumula = $salida - $maxisalidas;

    $query = "INSERT INTO trakers(trakerId,latitud,longitud,direccion,fecha,patente,entrada,entradaT,salida,salidaT,aforo,fechaConsulta,fechafiltro) VALUES ('$i','$lat','$long','$valuee','$fecha','$PatenteTraker','$entrada','$entraAcumula','$salida','$salidaAcumula','$aforo','$hoy',' $hoylog')";
   


if ($maxi != $entrada || $maxisalidas != $salida ){
  
  $ejecutar = mysqli_query($conex, $query);

}else{

  //no hace nada
}



    curl_close($Contadores);

  }



//BIEN 

  if ($i == $IdTracker2) {

  $Contadores = curl_init();

  curl_setopt_array($Contadores, array(
    CURLOPT_URL => 'http://3.236.38.223/iklab/ikcount/api/countingdataV2?appKey=JDJiJDEwJFBPNjVzUmFTQktmMmE2aEwuZ3lqU08wLkllL2RUNzV6blhKS2xuVms2VURISDZ4SEpML1Z1OmFkbWluOklLTEFCMDA1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"dataType":"summary","locations":["WITCL001A1L2"],"filterType":1,"day":"'.$hoy.'","detailed":false,"adjEvents":false}',
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json, text/javascript, */*; q=0.01',
      'Accept-Language: es-ES,es;q=0.9',
      'Connection: keep-alive',
      'Content-Type: application/json; charset=UTF-8',
      'Cookie: iklab_session=kjdf2ovkjh098fnpod60tfjq52cljere',
      'Origin: http://3.236.38.223',
      'Referer: http://3.236.38.223/ikcount/home',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
      'X-Requested-With: XMLHttpRequest'
    ),
  ));
  
  $response = curl_exec($Contadores);
  

  $json=json_decode($response);
foreach ($json->data as $item) {
  //  echo $item->id.PHP_EOL;
   // echo $item->location_name.PHP_EOL;
    $summary=$item->summary;
    echo $summary->counting_in.PHP_EOL; #También puedes acceder así: $item->summary->counting_in
    echo $summary->counting_out.PHP_EOL;
  //  echo $summary->day.PHP_EOL.PHP_EOL;

$entrada=$summary->counting_in.PHP_EOL;
$salida=$summary->counting_out.PHP_EOL;
echo "<br>";

$aforo = $entrada - $salida;

if ($aforo < 0){
  $aforo=0;

}

}
$consulta="SELECT MAX(entrada) as maximo FROM trakers  WHERE patente= '$PatenteTraker2' AND fechaConsulta='$hoy'" ;

$consultasalida="SELECT MAX(salida) as maximoS FROM trakers  WHERE patente= '$PatenteTraker2' AND fechaConsulta='$hoy'" ;

    include 'Maximo.php';
    include 'maximosalidas.php';

    $entraAcumula = $entrada - $maxi;
    $salidaAcumula = $salida - $maxisalidas;

    $query = "INSERT INTO trakers(trakerId,latitud,longitud,direccion,fecha,patente,entrada,entradaT,salida,salidaT,aforo,fechaConsulta,fechafiltro) VALUES ('$i','$lat','$long','$valuee','$fecha','$PatenteTraker2','$entrada','$entraAcumula','$salida','$salidaAcumula','$aforo','$hoy',' $hoylog')";
 
 


    if ($maxi != $entrada || $maxisalidas != $salida ){
  
      $ejecutar = mysqli_query($conex, $query);
    
    }else{
    
      //no hace nada
    }
    
    
    curl_close($Contadores);

  }




  if ($i == $IdTracker4) {
    
    
  $Contadores = curl_init();

  curl_setopt_array($Contadores, array(
    CURLOPT_URL => 'http://3.236.38.223/iklab/ikcount/api/countingdataV2?appKey=JDJiJDEwJFBPNjVzUmFTQktmMmE2aEwuZ3lqU08wLkllL2RUNzV6blhKS2xuVms2VURISDZ4SEpML1Z1OmFkbWluOklLTEFCMDA1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"dataType":"summary","locations":["WITCL001A1L5"],"filterType":1,"day":"'.$hoy.'","detailed":false,"adjEvents":false}',
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json, text/javascript, */*; q=0.01',
      'Accept-Language: es-ES,es;q=0.9',
      'Connection: keep-alive',
      'Content-Type: application/json; charset=UTF-8',
      'Cookie: iklab_session=kjdf2ovkjh098fnpod60tfjq52cljere',
      'Origin: http://3.236.38.223',
      'Referer: http://3.236.38.223/ikcount/home',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
      'X-Requested-With: XMLHttpRequest'
    ),
  ));
  
  $response = curl_exec($Contadores);
  

  $json=json_decode($response);
foreach ($json->data as $item) {
  //  echo $item->id.PHP_EOL;
   // echo $item->location_name.PHP_EOL;
    $summary=$item->summary;
    echo $summary->counting_in.PHP_EOL; #También puedes acceder así: $item->summary->counting_in
    echo $summary->counting_out.PHP_EOL;
  //  echo $summary->day.PHP_EOL.PHP_EOL;

$entrada=$summary->counting_in.PHP_EOL;
$salida=$summary->counting_out.PHP_EOL;
echo "<br>";

$aforo = $entrada - $salida;

if ($aforo < 0){
  $aforo=0;

}

}

$consulta="SELECT MAX(entrada) as maximo FROM trakers  WHERE patente= '$PatenteTraker4' AND fechaConsulta='$hoy'" ;

$consultasalida="SELECT MAX(salida) as maximoS FROM trakers  WHERE patente= '$PatenteTraker4' AND fechaConsulta='$hoy'" ;

    include 'Maximo.php';
    include 'maximosalidas.php';

    $entraAcumula = $entrada - $maxi;
    $salidaAcumula = $salida - $maxisalidas;

    $query = "INSERT INTO trakers(trakerId,latitud,longitud,direccion,fecha,patente,entrada,entradaT,salida,salidaT,aforo,fechaConsulta,fechafiltro) VALUES ('$i','$lat','$long','$valuee','$fecha','$PatenteTraker4','$entrada','$entraAcumula','$salida','$salidaAcumula','$aforo','$hoy',' $hoylog')";
 


    if ($maxi != $entrada || $maxisalidas != $salida ){
  
      $ejecutar = mysqli_query($conex, $query);
    
    }else{
    
      //no hace nada
    }
       
    
    curl_close($Contadores);


  }






  if ($i == $IdTracker5) {
    

  $Contadores = curl_init();

  curl_setopt_array($Contadores, array(
    CURLOPT_URL => 'http://3.236.38.223/iklab/ikcount/api/countingdataV2?appKey=JDJiJDEwJFBPNjVzUmFTQktmMmE2aEwuZ3lqU08wLkllL2RUNzV6blhKS2xuVms2VURISDZ4SEpML1Z1OmFkbWluOklLTEFCMDA1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"dataType":"summary","locations":["WITCL001A1L1"],"filterType":1,"day":"'.$hoy.'","detailed":false,"adjEvents":false}',
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json, text/javascript, */*; q=0.01',
      'Accept-Language: es-ES,es;q=0.9',
      'Connection: keep-alive',
      'Content-Type: application/json; charset=UTF-8',
      'Cookie: iklab_session=kjdf2ovkjh098fnpod60tfjq52cljere',
      'Origin: http://3.236.38.223',
      'Referer: http://3.236.38.223/ikcount/home',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
      'X-Requested-With: XMLHttpRequest'
    ),
  ));
  
  $response = curl_exec($Contadores);
  

  $json=json_decode($response);
foreach ($json->data as $item) {
  //  echo $item->id.PHP_EOL;
   // echo $item->location_name.PHP_EOL;
    $summary=$item->summary;
    echo $summary->counting_in.PHP_EOL; #También puedes acceder así: $item->summary->counting_in
    echo $summary->counting_out.PHP_EOL;
  //  echo $summary->day.PHP_EOL.PHP_EOL;

$entrada=$summary->counting_in.PHP_EOL;
$salida=$summary->counting_out.PHP_EOL;
echo "<br>";

$aforo = $entrada - $salida;

if ($aforo < 0){
  $aforo=0;

}

}
$consulta="SELECT MAX(entrada) as maximo FROM trakers  WHERE patente= '$PatenteTraker5' AND fechaConsulta='$hoy'" ;

$consultasalida="SELECT MAX(salida) as maximoS FROM trakers  WHERE patente= '$PatenteTraker5' AND fechaConsulta='$hoy'" ;

    include 'Maximo.php';
    include 'maximosalidas.php';

    $entraAcumula = $entrada - $maxi;
    $salidaAcumula = $salida - $maxisalidas;

    $query = "INSERT INTO trakers(trakerId,latitud,longitud,direccion,fecha,patente,entrada,entradaT,salida,salidaT,aforo,fechaConsulta,fechafiltro) VALUES ('$i','$lat','$long','$valuee','$fecha','$PatenteTraker5','$entrada','$entraAcumula','$salida','$salidaAcumula','$aforo','$hoy',' $hoylog')";
 


    if ($maxi != $entrada || $maxisalidas != $salida ){
  
      $ejecutar = mysqli_query($conex, $query);
    
    }else{
    
      //no hace nada
    }
     



    curl_close($Contadores);

  }


  if ($i == $IdTracker6) {
    

  $Contadores = curl_init();

  curl_setopt_array($Contadores, array(
    CURLOPT_URL => 'http://3.236.38.223/iklab/ikcount/api/countingdataV2?appKey=JDJiJDEwJFBPNjVzUmFTQktmMmE2aEwuZ3lqU08wLkllL2RUNzV6blhKS2xuVms2VURISDZ4SEpML1Z1OmFkbWluOklLTEFCMDA1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"dataType":"summary","locations":["WITCL001A1L6"],"filterType":1,"day":"'.$hoy.'","detailed":false,"adjEvents":false}',
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json, text/javascript, */*; q=0.01',
      'Accept-Language: es-ES,es;q=0.9',
      'Connection: keep-alive',
      'Content-Type: application/json; charset=UTF-8',
      'Cookie: iklab_session=kjdf2ovkjh098fnpod60tfjq52cljere',
      'Origin: http://3.236.38.223',
      'Referer: http://3.236.38.223/ikcount/home',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
      'X-Requested-With: XMLHttpRequest'
    ),
  ));
  
  $response = curl_exec($Contadores);
  

  $json=json_decode($response);
foreach ($json->data as $item) {
  //  echo $item->id.PHP_EOL;
   // echo $item->location_name.PHP_EOL;
    $summary=$item->summary;
    echo $summary->counting_in.PHP_EOL; #También puedes acceder así: $item->summary->counting_in
    echo $summary->counting_out.PHP_EOL;
  //  echo $summary->day.PHP_EOL.PHP_EOL;

$entrada=$summary->counting_in.PHP_EOL;
$salida=$summary->counting_out.PHP_EOL;
echo "<br>";

$aforo = $entrada - $salida;

if ($aforo < 0){
  $aforo=0;

}

}


$consulta="SELECT MAX(entrada) as maximo FROM trakers  WHERE patente= '$PatenteTraker6' AND fechaConsulta='$hoy'" ;

$consultasalida="SELECT MAX(salida) as maximoS FROM trakers  WHERE patente= '$PatenteTraker6' AND fechaConsulta='$hoy'" ;

    include 'Maximo.php';
    include 'maximosalidas.php';

    $entraAcumula = $entrada - $maxi;
    $salidaAcumula = $salida - $maxisalidas;

    $query = "INSERT INTO trakers(trakerId,latitud,longitud,direccion,fecha,patente,entrada,entradaT,salida,salidaT,aforo,fechaConsulta,fechafiltro) VALUES ('$i','$lat','$long','$valuee','$fecha','$PatenteTraker6','$entrada','$entraAcumula','$salida','$salidaAcumula','$aforo','$hoy',' $hoylog')";
  


    if ($maxi != $entrada || $maxisalidas != $salida ){
  
      $ejecutar = mysqli_query($conex, $query);
    
    }else{
    
      //no hace nada
    }
     


    curl_close($Contadores);

  }






  if ($i == $IdTracker7) {

  $Contadores = curl_init();

  curl_setopt_array($Contadores, array(
    CURLOPT_URL => 'http://3.236.38.223/iklab/ikcount/api/countingdataV2?appKey=JDJiJDEwJFBPNjVzUmFTQktmMmE2aEwuZ3lqU08wLkllL2RUNzV6blhKS2xuVms2VURISDZ4SEpML1Z1OmFkbWluOklLTEFCMDA1',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"dataType":"summary","locations":["WITCL001A1L7"],"filterType":1,"day":"'.$hoy.'","detailed":false,"adjEvents":false}',
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json, text/javascript, */*; q=0.01',
      'Accept-Language: es-ES,es;q=0.9',
      'Connection: keep-alive',
      'Content-Type: application/json; charset=UTF-8',
      'Cookie: iklab_session=kjdf2ovkjh098fnpod60tfjq52cljere',
      'Origin: http://3.236.38.223',
      'Referer: http://3.236.38.223/ikcount/home',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
      'X-Requested-With: XMLHttpRequest'
    ),
  ));
  
  $response = curl_exec($Contadores);
  

  $json=json_decode($response);
foreach ($json->data as $item) {
  //  echo $item->id.PHP_EOL;
   // echo $item->location_name.PHP_EOL;
    $summary=$item->summary;
    echo $summary->counting_in.PHP_EOL; #También puedes acceder así: $item->summary->counting_in
    echo $summary->counting_out.PHP_EOL;
  //  echo $summary->day.PHP_EOL.PHP_EOL;

$entrada=$summary->counting_in.PHP_EOL;
$salida=$summary->counting_out.PHP_EOL;
echo "<br>";

$aforo = $entrada - $salida;

if ($aforo < 0){
  $aforo=0;

}

}

$consulta="SELECT MAX(entrada) as maximo FROM trakers  WHERE patente= '$PatenteTraker7' AND fechaConsulta='$hoy'" ;

$consultasalida="SELECT MAX(salida) as maximoS FROM trakers  WHERE patente= '$PatenteTraker7' AND fechaConsulta='$hoy'" ;

    include 'Maximo.php';
    include 'maximosalidas.php';

    $entraAcumula = $entrada - $maxi;
    $salidaAcumula = $salida - $maxisalidas;

    $query = "INSERT INTO trakers(trakerId,latitud,longitud,direccion,fecha,patente,entrada,entradaT,salida,salidaT,aforo,fechaConsulta,fechafiltro) VALUES ('$i','$lat','$long','$valuee','$fecha','$PatenteTraker7','$entrada','$entraAcumula','$salida','$salidaAcumula','$aforo','$hoy',' $hoylog')";
   

 


    if ($maxi != $entrada || $maxisalidas != $salida ){
  
      $ejecutar = mysqli_query($conex, $query);
    
    }else{
    
      //no hace nada
    }
     
    

    curl_close($Contadores);

  }





  if ($i == $IdTracker9) {
    

    $Contadores = curl_init();

    curl_setopt_array($Contadores, array(
      CURLOPT_URL => 'http://3.236.38.223/iklab/ikcount/api/countingdataV2?appKey=JDJiJDEwJFBPNjVzUmFTQktmMmE2aEwuZ3lqU08wLkllL2RUNzV6blhKS2xuVms2VURISDZ4SEpML1Z1OmFkbWluOklLTEFCMDA1',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{"dataType":"summary","locations":["WITCL001A1L3"],"filterType":1,"day":"'.$hoy.'","detailed":false,"adjEvents":false}',
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json, text/javascript, */*; q=0.01',
        'Accept-Language: es-ES,es;q=0.9',
        'Connection: keep-alive',
        'Content-Type: application/json; charset=UTF-8',
        'Cookie: iklab_session=kjdf2ovkjh098fnpod60tfjq52cljere',
        'Origin: http://3.236.38.223',
        'Referer: http://3.236.38.223/ikcount/home',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
        'X-Requested-With: XMLHttpRequest'
      ),
    ));
    
    $response = curl_exec($Contadores);
    
  
    $json=json_decode($response);
  foreach ($json->data as $item) {
    //  echo $item->id.PHP_EOL;
     // echo $item->location_name.PHP_EOL;
      $summary=$item->summary;
      echo $summary->counting_in.PHP_EOL; #También puedes acceder así: $item->summary->counting_in
      echo $summary->counting_out.PHP_EOL;
    //  echo $summary->day.PHP_EOL.PHP_EOL;
    echo "<br>";

  $entrada=$summary->counting_in.PHP_EOL;
  $salida=$summary->counting_out.PHP_EOL;
  
  $aforo = $entrada - $salida;

  if ($aforo < 0){
    $aforo=0;
  
  }
  
  }

  

$consulta="SELECT MAX(entrada) as maximo FROM trakers  WHERE patente= '$PatenteTraker9' AND fechaConsulta='$hoy'" ;

$consultasalida="SELECT MAX(salida) as maximoS FROM trakers  WHERE patente= '$PatenteTraker9' AND fechaConsulta='$hoy'" ;

    include 'Maximo.php';
    include 'maximosalidas.php';

    $entraAcumula = $entrada - $maxi;
    $salidaAcumula = $salida - $maxisalidas;

    $query = "INSERT INTO trakers(trakerId,latitud,longitud,direccion,fecha,patente,entrada,entradaT,salida,salidaT,aforo,fechaConsulta,fechafiltro) VALUES ('$i','$lat','$long','$valuee','$fecha','$PatenteTraker9','$entrada','$entraAcumula','$salida','$salidaAcumula','$aforo','$hoy',' $hoylog')";
   



    if ($maxi != $entrada || $maxisalidas != $salida ){
  
      $ejecutar = mysqli_query($conex, $query);
    
    }else{
    
      //no hace nada
    }
    

    curl_close($Contadores);

  }


  
  if ($i == $IdTracker10) {
    
    $Contadores = curl_init();
  
    curl_setopt_array($Contadores, array(
      CURLOPT_URL => 'http://3.236.38.223/iklab/ikcount/api/countingdataV2?appKey=JDJiJDEwJFBPNjVzUmFTQktmMmE2aEwuZ3lqU08wLkllL2RUNzV6blhKS2xuVms2VURISDZ4SEpML1Z1OmFkbWluOklLTEFCMDA1',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{"dataType":"summary","locations":["WITCL001A1L8"],"filterType":1,"day":"'.$hoy.'","detailed":false,"adjEvents":false}',
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json, text/javascript, */*; q=0.01',
        'Accept-Language: es-ES,es;q=0.9',
        'Connection: keep-alive',
        'Content-Type: application/json; charset=UTF-8',
        'Cookie: iklab_session=kjdf2ovkjh098fnpod60tfjq52cljere',
        'Origin: http://3.236.38.223',
        'Referer: http://3.236.38.223/ikcount/home',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36',
        'X-Requested-With: XMLHttpRequest'
      ),
    ));
    
    $response = curl_exec($Contadores);
    
  
    $json=json_decode($response);
  foreach ($json->data as $item) {
    //  echo $item->id.PHP_EOL;
     // echo $item->location_name.PHP_EOL;
      $summary=$item->summary;
      echo $summary->counting_in.PHP_EOL; #También puedes acceder así: $item->summary->counting_in
      echo $summary->counting_out.PHP_EOL;
    //  echo $summary->day.PHP_EOL.PHP_EOL;
  
  $entrada=$summary->counting_in.PHP_EOL;
  $salida=$summary->counting_out.PHP_EOL;
  echo "<br>";
  
  $aforo = $entrada - $salida;
  if ($aforo < 0){
    $aforo=0;
  
  }
  }
  $consulta="SELECT MAX(entrada) as maximo FROM trakers  WHERE patente= '$PatenteTraker10' AND fechaConsulta='$hoy'" ;
  
  $consultasalida="SELECT MAX(salida) as maximoS FROM trakers  WHERE patente= '$PatenteTraker10' AND fechaConsulta='$hoy'" ;
  
      include 'Maximo.php';
      include 'maximosalidas.php';
  
      $entraAcumula = $entrada - $maxi;
      $salidaAcumula = $salida - $maxisalidas;
  
      $query = "INSERT INTO trakers(trakerId,latitud,longitud,direccion,fecha,patente,entrada,entradaT,salida,salidaT,aforo,fechaConsulta,fechafiltro) VALUES ('$i','$lat','$long','$valuee','$fecha','$PatenteTraker10','$entrada','$entraAcumula','$salida','$salidaAcumula','$aforo','$hoy',' $hoylog')";
     
  

if ($maxi != $entrada || $maxisalidas != $salida ){
  
  $ejecutar = mysqli_query($conex, $query);

}else{

  //no hace nada
}

  
      curl_close($Contadores);
  
    }
  

    curl_close($curll);
    
    }
      


curl_close($curl);


function write_to_console($data) {
  $console = $data;
  if (is_array($console))
  $console = implode(',', $console);
 
  echo "<script>console.log('Console: " . $console . "' );</script>";
 }
 write_to_console("Se ha ejecutado el script");
 write_to_console([$hoylog]);
 
 ?>



