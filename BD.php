<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "LosPibes";

$conexion = new mysqli($servidor,$usuario,$password,$base_datos);

if($conexion->connect_error){
    die("error de conexion:" . $conexion->connect_error);
}
?>