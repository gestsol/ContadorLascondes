<?php

$resutaldo= mysqli_query($conex,$consulta);
$data=mysqli_fetch_array($resutaldo);
$maxi= $data['maximo'];

