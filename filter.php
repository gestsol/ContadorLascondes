
<?php 


$arreglo = [
    ['id' => 1, 'nombre' => 'Juan', 'apellido'=>'Gonzalez'],
    ['id' => 2, 'nombre' => 'María','apellido'=>'Soto'],
    ['id' => 3, 'nombre' => 'Jan', 'apellido'=>'rubio']
  ];


$uu="Juan";

$fila = array_values(

        array_filter(

            $arreglo,
            function ($item) use ($uu) {

                return $item['nombre'] == $uu;
            }
        )
        );

    print_r($fila);
    echo "<br>" ;
    echo $fila[0]['apellido'];
  
  

  
   


?>

