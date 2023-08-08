<?php
session_start();
include('conexion.php');
include('funciones.php');

$Contrasena = $_POST['Contrasena'];
$Correo = $_POST['Correo'];

//Funcion para consultar si el correo ya esta registrado
$Loguear = loguear($Correo);

if ($Loguear) {
    $Password = $Loguear['contrasena'];

    if ($Password == $Contrasena) {
        $_SESSION['UsuarioActivo'] = $Correo;
        $response = $Loguear['rol'];
    } else {
        $response = 4;
    }

} else {
    $response = 4;
}

echo $response;
?>