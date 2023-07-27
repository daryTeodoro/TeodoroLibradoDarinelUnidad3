<?php






session_start();
require_once "funciones.php";

$C_Nombre = $_POST['Nombre'];
$C_Correo = $_POST['Correo'];
$C_Telefono = $_POST['Telefono'];
$C_Contrasena = $_POST['Psw'];
$C_Rol = $_POST['Rol'];

//Funcion para consultar si el correo ya esta registrado
$Crear = consulta_users($C_Correo);


if ($Crear) {
    $response = 2;
} else {
	$Consultar = consulta_number($C_Telefono);

		if ($Consultar) {
		    $response = 4;
		} else {
		    $Registrar = registrarUsuario($C_Nombre,$C_Correo,$C_Telefono,$C_Contrasena,$C_Rol);

		    if ($Registrar == 1) {
		        $_SESSION['Usuario'] = $C_Correo;
		        $response = 1;
		    } else {
		        $response = 3;
		    }
		}

}

echo $response;






  ?>