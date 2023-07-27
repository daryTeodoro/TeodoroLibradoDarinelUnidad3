<?php
session_start();
require_once "funciones.php";

$L_Correo = $_POST['Correo'];
$L_Contrasena = $_POST['Psw'];

//Funcion para consultar si el correo ya esta registrado
$Loguear = consulta_users($L_Correo);

if ($Loguear) {
    $Contrasena = $Loguear['password_user'];

    if ($Contrasena == $L_Contrasena) {
        $_SESSION['Usuario'] = $L_Correo;
        $response = $Loguear['rol'];
    } else {
        $response = 4;
    }

} else {
    $response = 4;
}

echo $response;
?>