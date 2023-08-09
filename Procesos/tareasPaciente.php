<?php
session_start();
include('conexion.php');
$conexion = new Conexion();
$ConsultarTareas = $conexion->prepare('SELECT * FROM tareas WHERE iduser = :usuarioActivo');
$ConsultarTareas->bindParam(':usuarioActivo',$_SESSION['IdUsuarioActivo']);
$ConsultarTareas->execute();
$contarTareas = $ConsultarTareas->rowCount();

if ($contarTareas > 0) {
    while($datoTareas=$ConsultarTareas->fetch(PDO::FETCH_ASSOC)) {

    	if ($datoTareas['estatus'] == 0){
    		$Estatus = "<i class='btn btn-success disabled'>Realizado</i>";
    	} else {
    		$Estatus = "<i class='btn btn-danger disabled'>Pendiente</i>";
    	}
    	echo'<div class="p-3 Tarea">
    	<div class="Col"><img src="'.$datoTareas['tipo'].'"></div>
    	<div class="Col"><b class="Fuente-Fugaz">'.$datoTareas['tarea'].'</b></div>
    	<div class="Col"><b class="Fuente-Fugaz">'.$Estatus.'</b></div>
    	</div>';
    }
} else {
	echo'<h3 class="Fuente-Fugaz mt-5">¡Enhorabuena!</h3>
	<b class="Fuente-Englebert">No hay Tareas Pendientes</b>';
}
?>