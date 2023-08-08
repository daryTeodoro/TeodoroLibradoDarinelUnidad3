<?php
session_start();
include('conexion.php');
include('funciones.php');
$UsuarioActivo = $_SESSION['UsuarioActivo'];

$contrasenActual = $_POST['ContrasenActual'];
$contrasenaNueva = $_POST['ContrasenaNueva'];

$Rectificar = loguear($UsuarioActivo);

if ($Rectificar['contrasena'] == $contrasenActual) {
	if ($contrasenaNueva == $contrasenActual) {
		$response = 1;
	} else {
		$update = actualizarPsw($UsuarioActivo,$contrasenaNueva);
		$response = 2;
	}
} else {
	$response = 3;
}

echo $response;
?>