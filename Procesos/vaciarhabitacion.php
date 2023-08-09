<?php
include("conexion.php");
include("funciones.php");

$habitacion = $_POST['habitacion'];
$paciente = 'vacio';

$acthab = asignHab($habitacion,$paciente);

if ($acthab == 1) {
    $response = 1;
} else {
    $response = 2;
}

echo $response;
?>