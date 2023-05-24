<?php 

$user="dorian";

$pasw="123";

include "conexion.php";

$consulta="SELECT hash FROM masgps.hash where user='$user' and pasw='$pasw'";

$resutaldo= mysqli_query($conex,$consulta);

$data=mysqli_fetch_array($resutaldo);
echo 
$hash=$data['hash'];

// se genera listado de buses (id_tracker)

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/tracker/list',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"hash": "'.$hash.'"}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$idTrackers = curl_exec($curl);

curl_close($curl);

$idTrackers;

$json=json_decode($idTrackers);

if ( $json->success==false){


    include "./hash.php";

    echo

    $consulta="UPDATE `masgps`.`hash` SET `hash` = '$hashed' WHERE (`id` = '2');";

    $resutaldo= mysqli_query($conex,$consulta);



} else {

    echo "Token ok";
}
    include "./ikcount.php";


    date_default_timezone_set('America/Santiago');
    $hoy = date("Y-m-d");

    $hoylog = date("Y-m-d  H:i:s");

    

    $lista =$json->list;

    foreach ($lista as $item){
        
        $patente=$item->label;
         $id_tracker=$item->id;


        

         
        // trae lat y long por cada id_tracker

         $curl = curl_init();
         
         curl_setopt_array($curl, array(
           CURLOPT_URL => 'http://www.trackermasgps.com/api-v2/tracker/get_state',
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => '',
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 0,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => 'POST',
           CURLOPT_POSTFIELDS =>'{"hash": "'.$hash.'", "tracker_id": '.$id_tracker.'}',
           CURLOPT_HTTPHEADER => array(
             'Content-Type: application/json'
           ),
         ));
         
         $coord = curl_exec($curl);
         curl_close($curl);

         $json2=json_decode($coord);
         echo 
         $lat=$json2->state->gps->location->lat;
         echo
         $long=$json2->state->gps->location->lng;

         $json3=json_decode($response1, true);

    $array = $json3['data'];



    $fila = array_values(

            array_filter(

                $array,
                function ($item) {

                    return $item['location_name'] == $patente ;
                }
            )
        );

    echo $entada = $fila['0']['summary']['counting_in'];
    echo "-";
    echo $salida = $fila['0']['summary']['counting_out'];
         echo "<br>";
         
         
        

        //  $QRY2="INSERT INTO `masgps`.`contador` 
        //  (`trakerId`, `latitud`, `longitud`, `direccion`, `fecha`, `patente`) 
        //  VALUES ('$id_tracker', '$lat', '$long', 'xxxx', '$fecha_actual', '$patente')";
        //  $resutaldo= mysqli_query($conex,$QRY2);


         

    }

       include "./ikcount.php";




?>