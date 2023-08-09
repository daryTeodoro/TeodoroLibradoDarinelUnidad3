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

function actualizarPsw($usuario, $psw){
    $conexion = new Conexion();
    $update = $conexion->prepare('UPDATE usuarios SET contrasena = :newcontrasena, visita = 2 WHERE correo = :user'); 
    $update->bindParam(':user',$usuario);
    $update->bindParam(':newcontrasena',$psw);

    $update->execute();

    if ($update) {
        return 1;
    } else {
        return false;
    }
}
?>


