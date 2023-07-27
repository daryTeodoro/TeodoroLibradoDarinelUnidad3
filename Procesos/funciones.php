<?php
include('conexion.php');

function consultaruser($Id){
    $conexion= new conexion();
    $usuario=$conexion->prepare('SELECT * FROM usuarios WHERE id_user = :id');
    $usuario->bindParam(':id',$Id);
    $usuario->execute();
    $cu=$usuario->rowCount(); //Cuenta si existe el registro

    if ($cu == 1) {
        // Si se encontró un registro, devuelve los datos del usuario como un array asociativo
        return $usuario->fetch(PDO::FETCH_ASSOC);
    } else {
        // Si no se encontró ningún registro, devuelve false
        return false;
    }
}

function consultarestado($Id){
    $conexion= new conexion();
    $estado=$conexion->prepare('SELECT * FROM estados WHERE idstate = :id');
    $estado->bindParam(':id',$Id);
    $estado->execute();
    $ce=$estado->rowCount(); //Cuenta si existe el registro

    if ($ce == 1) {
        // Si se encontró un registro, devuelve los datos del usuario como un array asociativo
        return $estado->fetch(PDO::FETCH_ASSOC);
    } else {
        // Si no se encontró ningún registro, devuelve false
        return false;
    }
}

?>