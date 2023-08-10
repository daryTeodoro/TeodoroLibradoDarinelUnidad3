<?php
/*Funcion para consultar un usuario por su correo*/
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


/*Funcion para consultar un usuario por su Telefono*/
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

/*Funcion para Actualizar la contraseña de un usuario*/
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

/*Funcion consultar la informacion de una habitacion*/
function habitaciones($id){
    $conexion = new Conexion();
    $habitaciones = $conexion->prepare("SELECT * FROM habitaciones WHERE id = :id");
    $habitaciones->bindParam(':id',$id);
    $habitaciones->execute();
    $contarhabitacion = $habitaciones->rowCount();

    if ($contarhabitacion==1) {
        return $habitaciones->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

/*Funcion para consultar un usuario por su Id*/
function identificar($id){
    $conexion = new Conexion();
    $identificar = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
    $identificar->bindParam(':id',$id);
    $identificar->execute();
    $contarid = $identificar->rowCount();

    if ($contarid==1) {
        return $identificar->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

/*Funcion para Actualizar los datos de una habitacion*/
function asignHab($habitacion, $paciente){
    $conexion = new Conexion();
    $acthab = $conexion->prepare('UPDATE habitaciones SET idpaciente = :paciente WHERE id = :habitacion'); 
    $acthab->bindParam(':paciente',$paciente);
    $acthab->bindParam(':habitacion',$habitacion);

    $acthab->execute();

    if ($acthab) {
        return 1;
    } else {
        return false;
    }
}


/*funcion para consultar una pregunta por medio de su Id*/
function comprobarespuestas($pregunta){
    $conexion = new Conexion();
    $preguntasql = $conexion->prepare("SELECT * FROM preguntas WHERE id = :ask");
    $preguntasql->bindParam(':ask',$pregunta);
    $preguntasql->execute();
    $contarpregunta = $preguntasql->rowCount();

    if ($contarpregunta==1) {
        return $preguntasql->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

/*Funcion para generar un codigo de 7 Caracteres con numero y letras*/
function generarCodigo() {
    $letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Letras disponibles
    $numeros = '0123456789'; // Números disponibles

    $codigo = '';

    // Generar 2 letras aleatorias
    for ($i = 0; $i < 2; $i++) {
        $codigo .= $letras[rand(0, strlen($letras) - 1)];
    }

    // Generar 5 números aleatorios
    for ($i = 0; $i < 5; $i++) {
        $codigo .= $numeros[rand(0, strlen($numeros) - 1)];
    }

    return $codigo;
}
?>


