<?php
include("conexion.php");
include("funciones.php");

/*Datos de la habitacion*/
$habitacion = $_POST['habitacion'];
$paciente = 'vacio'; /*registrar como vacio la habitacion*/

/*actualiza los datos*/
$acthab = asignHab($habitacion,$paciente);

/*acciones a realizar en diferentes casos*/
if ($acthab == 1) {
    $response = 1;
} else {
    $response = 2;
}

echo $response;
?>