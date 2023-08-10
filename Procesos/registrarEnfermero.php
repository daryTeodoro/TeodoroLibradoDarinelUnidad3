<?php
include("conexion.php");
include("funciones.php");
 /*Datos recibidos*/
$Correo = $_POST['CorreoEnfermero'];
$Nombre = $_POST['NombreEnfermero'];
$Telefono = $_POST['TelefonoEnfermero'];

$verificar = loguear($Correo); /*Verifica que el correo no este registrado*/

if ($verificar) { /*si ya esta registrado*/
	$response = 1;
} else {

    $comprobar = consultar($Telefono); /*comprueba que el numero telefonico no este registrado*/

    if ($comprobar) { /*si el correo ya esta registrado*/
        $response = 2;
    } else { /*si no*/
        /*guarda su foto en la carpeta*/
        $carpeta = "fotoperfil/";
        $nombreArchivo = $Telefono . "_" . basename($_FILES["fotoEnfermero"]["name"]);
        $rutaArchivo = $carpeta . $nombreArchivo;
        move_uploaded_file($_FILES["fotoEnfermero"]["tmp_name"], $rutaArchivo);

        /*inserta el registro de datos del enfermero*/
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