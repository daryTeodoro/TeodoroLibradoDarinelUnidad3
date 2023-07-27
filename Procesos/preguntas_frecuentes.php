<?php
    include ("conexion.php");
    $cnn = new Conexion();
    
    $sql = $cnn->prepare("SELECT * FROM faq");
    $sql->execute();
    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
    	$pregunta = $row['pregunta'];
    	$respuesta = $row['respuesta'];
    	echo $pregunta;
    	echo $respuesta;
    } 
?>