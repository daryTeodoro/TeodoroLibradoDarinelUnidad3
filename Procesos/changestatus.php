<?php
include('conexion.php');
$id = $_POST['id'];

$conexion = new Conexion();
$actst = $conexion->prepare('UPDATE tareas SET estatus = 0 WHERE id = :id'); 
$actst->bindParam(':id',$id);
$actst->execute();
?>