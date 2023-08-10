<?php
session_start();
include('conexion.php');
include('funciones.php');
//datos del usuario logueado
$UsuarioActivo = $_SESSION['UsuarioActivo'];

//contraseña actual y contraseña nueva ingresadas
$contrasenActual = $_POST['ContrasenActual'];
$contrasenaNueva = $_POST['ContrasenaNueva'];

//trae datos del usuario
$Rectificar = loguear($UsuarioActivo);

//si la actual es la correcta
if ($Rectificar['contrasena'] == $contrasenActual) {
//si la nueva contraseña es la misma que la anterios
	if ($contrasenaNueva == $contrasenActual) {
		$response = 1;
	} else { //si no actualiza
		$update = actualizarPsw($UsuarioActivo,$contrasenaNueva);
		$response = 2;
	}
} else { //si no alerta
	$response = 3;
}

echo $response;
?>