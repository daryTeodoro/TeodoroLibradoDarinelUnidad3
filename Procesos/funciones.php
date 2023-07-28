<?php
/*Funcion para consultar el correo*/

function consulta_users($id){
    $conexion = new Conexion();
	$sql = $conexion->prepare("SELECT * FROM usuarios WHERE correo = :id");
	$sql->bindParam(':id',$id);
	$sql->execute();
	$contador = $sql->rowCount();

	if ($contador==1) {
		return $sql->fetch(PDO::FETCH_ASSOC);
	} else {
		return false;
	}
	
}



function consultarestado($Id){
    $conexion = new Conexion();
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



/*Funcion para consulta el telefono*/
function consulta_number($num){
    $conexion = new Conexion();
    $sql = $conexion->prepare("SELECT * FROM usuarios WHERE telefono = :num");
    $sql->bindParam(':num',$num);
    $sql->execute();
    $contador = $sql->rowCount();

    if ($contador==1) {
        return $sql->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
    
}




/*Funcion para hacer el registro de usuario*/
function registrarUsuario($Nombre,$Correo,$Telefono,$Contrasena, $Rol) {
    $Imagen = "imagen";
    $conexion = new conexion(); 
    $Insert = $conexion->prepare('INSERT INTO usuarios(imagen, nombre, correo, telefono, password_user, rol) VALUES (:imagen, :nombre, :correo, :telefono, :password_user, :rol)');
    $Insert->bindParam(':imagen',$Imagen);
    $Insert->bindParam(':nombre',$Nombre);
    $Insert->bindParam(':correo',$Correo);
    $Insert->bindParam(':telefono',$Telefono);
    $Insert->bindParam(':password_user',$Contrasena);
    $Insert->bindParam(':rol',$Rol);

    $Insert->execute();

    if ($Insert) {
        return 1;
    } else {
        return false;
    }
}






?>


