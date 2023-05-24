<?php

$resultado= mysqli_query($conex,$consultasalida);
$datasalida=mysqli_fetch_array($resultado);
$maxisalidas= $datasalida['maximoS'];

