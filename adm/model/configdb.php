<?php 

define('host', 'localhost');
define('username', 'root');
define('password', '20055002');
define('databaseName', 'pruebaABP');


$conexion = new mysqli(host,username,password,databaseName);

if($conexion->error)
    echo "Error de conexion";
