<?php
include("conexion.php");
include("funciones.php");

$Nombre = $_POST['NombrePaciente'];
$Telefono = $_POST['TelefonoPaciente'];
$Peso = $_POST['PesoPaciente'];
$Estatura = $_POST['EstaturaPaciente'];

$Pregunta1 = $_POST['Pregunta1Paciente'];
$Respuesta1 = $_POST['Respuesta1'];

$Pregunta2 = $_POST['Pregunta2Paciente'];
$Respuesta2 = $_POST['Respuesta2'];

$verificar = loguear($Telefono);
$comprobar = consultar($Telefono);

if ($verificar OR $comprobar) {
	$response = 1;
} else {

    $carpeta = "fotoperfil/";
    $nombreArchivo = $Telefono . "_" . basename($_FILES["fotoPaciente"]["name"]);
    $rutaArchivo = $carpeta . $nombreArchivo;
    move_uploaded_file($_FILES["fotoPaciente"]["tmp_name"], $rutaArchivo);

    $con = new Conexion();
    $sql=$con->prepare("INSERT INTO usuarios (correo, nombre, peso, estatura, imagen, telefono, contrasena, rol, visita) VALUES (:correo,:nombre, :peso, :estatura, :rutaimagen, :telefono, :contrasena, 3, 1)");
    $sql->bindParam(':correo',$Telefono);
    $sql->bindParam(':nombre',$Nombre);
    $sql->bindParam(':peso',$Peso);
    $sql->bindParam(':estatura',$Estatura);
    $sql->bindParam(':rutaimagen',$rutaArchivo);
    $sql->bindParam(':telefono',$Telefono);
    $sql->bindParam(':contrasena',$Telefono);
    $sql->execute();

    $sql2 = $con->prepare("INSERT INTO preguntas (usuario, pregunta, respuesta) VALUES (:usuario1,:pregunta1,:respuesta1)");
    $sql2->bindParam(':usuario1',$Telefono);
    $sql2->bindParam(':pregunta1',$Pregunta1);
    $sql2->bindParam(':respuesta1',$Respuesta1);
    $sql2->execute();

    $sql3 = $con->prepare("INSERT INTO preguntas (usuario, pregunta, respuesta) VALUES (:usuario2,:pregunta2,:respuesta2)");
    $sql3->bindParam(':usuario2',$Telefono);
    $sql3->bindParam(':pregunta2',$Pregunta2);
    $sql3->bindParam(':respuesta2',$Respuesta2);
    $sql3->execute();

    $response = 2;
}

echo $response;
?>