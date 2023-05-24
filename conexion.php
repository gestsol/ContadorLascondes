<?php

$conex = new mysqli("ls-3c0c538286def4da7f8273aa5531e0b6eee0990c.cylsiewx0zgx.us-east-1.rds.amazonaws.com", "dbmasteruser", "eF5D;6VzP$^7qDryBzDd,`+w(5e4*qI+", "masgps");
if ($conex->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conex->connect_errno . ") " . $conex->connect_error;
}

?> 

