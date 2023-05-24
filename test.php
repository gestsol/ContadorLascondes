<?php 



$primerArreglo = array(array('id' => 1, 'nombre' => 'Juan'), array('id' => 2, 'nombre' => 'Pedro'));
$segundoArreglo = array(array('id' => 1, 'edad' => 25), array('id' => 2, 'edad' => 30));


$valorBuscado = 1;

$objetoBuscado = array_filter($primerArreglo, function($obj) use ($valorBuscado) {
    return $obj['id'] === $valorBuscado;
})[0];

$clave = array_search($objetoBuscado['id'], array_column($segundoArreglo, 'id'));
$resultado = $segundoArreglo[$clave];

print_r($resultado);



?>