<?php
include('conexion.php');

$paciente = $_POST['paciente'];
$enfermero = $_POST['enfermero'];

$conexion = new Conexion();
$asignar = $conexion->prepare("INSERT INTO cuidadores (idpaciente, idenfermero) VALUES (:paciente, :enfermero)");
$asignar->bindParam(":paciente", $paciente);
$asignar->bindParam(":enfermero", $enfermero);
$asignar->execute();

if ($asignar){
	$response = 1;
} else {
	$response = 2;
}

echo $response;
?>