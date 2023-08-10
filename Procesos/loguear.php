<?php
session_start();
include('conexion.php');
include('funciones.php');

$Contrasena = $_POST['Contrasena'];
$Correo = $_POST['Correo'];

//Funcion para consultar si el correo ya esta registrado
$Loguear = loguear($Correo);

if ($Loguear) { /*si existe el correo*/
    $Password = $Loguear['contrasena']; /*trae la contraseña*/

    if ($Password == $Contrasena) { /*si las contraseñas son iguales*/
        $_SESSION['UsuarioActivo'] = $Correo; /*Crea una variable de sesion del usuario logueado*/
        $response = $Loguear['rol'];
    } else {
        $response = 4;
    }

} else {
    $response = 4;
}

echo $response;
?>