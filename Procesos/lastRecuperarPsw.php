<?php
session_start();
include('conexion.php');
include('funciones.php');

$usuario = $_POST['user'];
$contrasenaNueva = $_POST['new'];

$update = actualizarPsw($usuario,$contrasenaNueva);

if ($update == 1){
	$response = 1;
} else {
	$response = 2;
}

echo $response;
?>