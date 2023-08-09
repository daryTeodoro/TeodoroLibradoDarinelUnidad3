<?php
include("conexion.php");
include("funciones.php");

$Correo = $_POST['CorreoEnfermero'];
$Nombre = $_POST['NombreEnfermero'];
$Telefono = $_POST['TelefonoEnfermero'];

$verificar = loguear($Correo);

if ($verificar) {
	$response = 1;
} else {

    $comprobar = consultar($Telefono);

    if ($comprobar) {
        $response = 2;
    } else {
        $carpeta = "fotoperfil/";
        $nombreArchivo = $Telefono . "_" . basename($_FILES["fotoEnfermero"]["name"]);
        $rutaArchivo = $carpeta . $nombreArchivo;
        move_uploaded_file($_FILES["fotoEnfermero"]["tmp_name"], $rutaArchivo);

        $con = new Conexion();
        $sql=$con->prepare("INSERT INTO usuarios (correo, nombre, peso, estatura, imagen, telefono, contrasena, rol, visita) VALUES (:correo,:nombre, 'null', 'null', :rutaimagen, :telefono, :contrasena, 2, 1)");
        $sql->bindParam(':correo',$Correo);
        $sql->bindParam(':nombre',$Nombre);
        $sql->bindParam(':rutaimagen',$rutaArchivo);
        $sql->bindParam(':telefono',$Telefono);
        $sql->bindParam(':contrasena',$Telefono);
        $sql->execute();

    $response = 3;
    }
}

echo $response;
?>