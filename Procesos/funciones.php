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

function consultar($Numero){
    $conexion = new Conexion();
    $numero = $conexion->prepare("SELECT * FROM usuarios WHERE telefono = :telefono");
    $numero->bindParam(':telefono',$Numero);
    $numero->execute();
    $contarnumero = $numero->rowCount();

    if ($contarnumero==1) {
        return $numero->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

?>


