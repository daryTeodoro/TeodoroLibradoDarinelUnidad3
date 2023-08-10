<?php
include("conexion.php");
include("funciones.php");

/*Recibe datos de la habitacion y paciente*/
$habitacion = $_POST['habitacion'];
$paciente = $_POST['paciente'];

/*Hace el registro y actualizacion de la habitacion*/
$acthab = asignHab($habitacion,$paciente);

/*Acciones a realizar en caso de respuesta*/
if ($acthab == 1) {
    $response = 1;
} else {
    $response = 2;
}

echo $response;
?>