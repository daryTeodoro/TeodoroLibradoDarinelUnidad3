<?php
include("conexion.php");
$pregunta = $_POST['ask'];
$id = $_POST['id'];
$remitente = $_POST['send'];

$con = new Conexion();
$sql=$con->prepare("INSERT INTO conversacion (idconversation, texto, remitente) VALUES (:idchat,:mensaje,:remitente)");
$sql->bindParam(':idchat',$id);
$sql->bindParam(':mensaje',$pregunta);
$sql->bindParam(':remitente',$remitente);
$sql->execute();
?>