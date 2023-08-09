<style type="text/css">
	.BotonDataMessage{
		width: 100%;

		display: grid;
		grid-template-columns: 20% 80%;
		align-items: center;
		justify-content: center;
		text-align: center;
		cursor: pointer;
	}.BotonDataMessage:hover{
		background: #000000;
		color: #ffffff;
	}.BotonDataMessage img{
		width: 100px;
		height: 100px;
		margin: 0;
		border-radius: 50px;
	}

	.Messageslist{
		overflow-y: auto;
	}.sd{
		height: 100%;
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
	}.PantallaMessages{
		width: 100%;
		box-shadow: inset 0px 0px 9px 2px rgba(0,0,0,0.75);
		display: grid;
		grid-template-rows: 90% 10%;
	}.BarraMensajes{
		display: grid;
		grid-template-columns: 80% 20%;
	}.BarraMensajes div{
		display: flex;
		align-items: center;
		justify-content: center;
	}.BarraMensajes div input{
		width: 90%;
	}.ionicsend{
		font-size: 1.5rem;
	}
</style>
<?php
session_start();
include('conexion.php');
include('funciones.php');

echo '<div class="MessagesList Barra">';

$conexion = new Conexion();
$sql = $conexion->prepare("SELECT * FROM usuarios WHERE id != :enfermero AND correo IN 
		(SELECT remitente FROM mensajes WHERE destinatario = :enfermero)");
$sql->bindParam(":enfermero",$_SESSION['UsuarioActivo']);
$sql->execute();
$contar = $sql->rowCount();

if ($contar > 0) {
	while ($datapac=$sql->fetch(PDO::FETCH_ASSOC)) {

		echo "
		<div class='BotonDataMessage p-2' onclick='historial(\"".$datapac['correo']."\")'>
		   <img src='Procesos/".$datapac['imagen']."'>
		   <b class='Fuente-Fugaz'>".$datapac['nombre']."</b>
		</div>
		";
	}
} else {
	echo "<div class='sd'>
	<h2 class='Fuente-Encode'>No hay mensajes</h2>
	</div>";
}

echo '</div>';

echo '<div class="PantallaMessages" id="PantallaMessages">
  
</div>';
?>