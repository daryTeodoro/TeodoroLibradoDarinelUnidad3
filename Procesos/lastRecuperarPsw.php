<?php
session_start();
include('conexion.php');
include('funciones.php');
/*Recibimos el usuario*/
$usuario = $_POST['user'];
$contrasenaNueva = $_POST['new']; /*Recibimos la nueva contraseña*/

$update = actualizarPsw($usuario,$contrasenaNueva); /*Actualizamos la contraseña*/

if ($update == 1){ /*si se actualiza*/
	$response = 1;
} else { /*si no*/
	$response = 2;
}

echo $response;
?>