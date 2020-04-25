<?php

$usuario = "jhonfer9731";
$contrasena = "12952762j.";
$host = "35.225.75.25";
$baseDatos = "usuariosV1";
$conexion = new mysqli($host,$usuario,$contrasena,$baseDatos);
if(mysqli_connect_error())
{
    echo $conexion->error;
    die;
}