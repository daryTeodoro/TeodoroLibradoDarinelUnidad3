<?php
include('conexion.php');
//datos del mensaje
$mensaje = $_POST['m'];
$remitente = $_POST['r'];
$destinatario = $_POST['d'];
//registra el mensaje
$conexion = new Conexion();
$insert = $conexion->prepare("INSERT INTO mensajes (remitente, destinatario, mensaje, leido) VALUES (:remitente, :destinatario, :mensaje, 1)");
$insert->bindParam(":remitente", $remitente);
$insert->bindParam(":destinatario", $destinatario);
$insert->bindParam(":mensaje", $mensaje);
$insert->execute();
?>