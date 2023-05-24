<?php 

$json3=json_decode($response1, true);

$array=$json3['data'];



$fila = array_values(

        array_filter(

            $array,
            function ($item) {

                return $item['location_name'] == $patente;
            }
        )
    );

    echo $entada=$fila['0']['summary']['counting_in'];
    echo "-";
    echo $salida=$fila['0']['summary']['counting_out'];

?>