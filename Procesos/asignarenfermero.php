<?php
include('conexion.php');

/*Datos del paciente y el enfermero*/
$paciente = $_POST['paciente'];
$enfermero = $_POST['enfermero'];

/*Inserta el registro de pacientes-enfermeros*/
$conexion = new Conexion();
$asignar = $conexion->prepare("INSERT INTO cuidadores (idpaciente, idenfermero) VALUES (:paciente, :enfermero)");
$asignar->bindParam(":paciente", $paciente);
$asignar->bindParam(":enfermero", $enfermero);
$asignar->execute();

//respuestas
if ($asignar){
	$response = 1;
} else {
	$response = 2;
}

echo $response;
?>