<?php
include('conexion.php');
//id de la tarea
$id = $_POST['id'];

//actualiza el estatus de la tarea
$conexion = new Conexion();
$actst = $conexion->prepare('UPDATE tareas SET estatus = 0 WHERE id = :id'); 
$actst->bindParam(':id',$id);
$actst->execute();
?>