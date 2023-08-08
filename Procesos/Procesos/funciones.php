<?php
/*Funcion para consultar el correo*/

function loguear($Correo){
    $conexion = new Conexion();
	$correo = $conexion->prepare("SELECT * FROM usuarios WHERE correo = :correo");
	$correo->bindParam(':correo',$Correo);
	$correo->execute();
	$contarcorreo = $correo->rowCount();

	if ($contarcorreo==1) {
		return $correo->fetch(PDO::FETCH_ASSOC);
	} else {
		return false;
	}
}

?>


