<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Edu+SA+Beginner&display=swap');
	.BotonDataPac{
		height: 80%;
		width: 90%;
		border: 3px solid #000000;
		background: #c5f1fd;

		display: grid;
		grid-template-rows: 80% 20%;
		padding: 0;
	}.BotonDataPac:hover{
		border: 3px solid #be0847;
		box-shadow: 0px 0px 5px 10px rgba(252,184,204,0.75);
	}.BotonDataPac div{
		height: 100%;
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		text-align: center;
	}.BotonDataPac img{
		height: 100%;
		width: 100%;
	}.ContenedorBotones{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		text-align: center;
	}.SinAsignar{
		height: 80%;
		width: 90%;
		background: #000000;
		display: flex;
		align-items: center;
		justify-content: center;
		text-align: center;
		color: #ffffff;
		font-family: 'Edu SA Beginner', cursive;
	}

	.footer{
		background: #000000;
		color: #ffffff;
		font-family: 'Itim', cursive;
	}
</style>
<?php
session_start();
include('conexion.php');
include('funciones.php');
//boton para cerrar la seccion
echo '
<div class="AlignEnd">
<ion-icon name="close" class="IconoClose" onclick="closeOption(\'VistaPacientes\')"></ion-icon>
</div>
';

//imprime los pacientes asignados
echo '
<form method="post" action="" class="ContenedorCards" id="ContenedorCards1">
';
//consulta la info de los pacientes asignados
$conexion = new Conexion();
$sql = $conexion->prepare("SELECT * FROM cuidadores WHERE idenfermero = :enfermero");
$sql->bindParam(":enfermero",$_SESSION['IdUsuarioActivo']);
$sql->execute();
$contar = $sql->rowCount();

if ($contar == 1) { //si solo hay un paciente asignado
	$datapac = $sql->fetch(PDO::FETCH_ASSOC);
	$idpac = $datapac['idpaciente'];
	$identificar = identificar($idpac);

	echo "
	<div class='ContenedorBotones'>
	<button type='button' class='BotonDataPac' onclick='mispacientesInfo('".$identificar['correo']."')'>
		<img src='Procesos/".$identificar['imagen']."'>
		<div class='footer'><h3>".$identificar['nombre']."</h3></div>
	</button>
	</div>
	";

	echo "
	<div class='ContenedorBotones'>
	<button type='button' class='SinAsignar' disabled>
		  <h1 class='Fuente-Henglebert'>Vacio</h1>
	</button>
	</div>
	";

	echo "
	<div class='ContenedorBotones'>
	<button type='button' class='SinAsignar' disabled>
		  <h1 class='Fuente-Henglebert'>Vacio</h1>
	</button>
	</div>
	";
} else if ($contar == 2) { //si hay 2 pacientes asignados
	while ($datapac=$sql->fetch(PDO::FETCH_ASSOC)) {
		$idpac = $datapac['idpaciente'];
		$identificar = identificar($idpac);

		echo "
		<div class='ContenedorBotones'>
		<button type='button' class='BotonDataPac' onclick='mispacientesInfo('".$identificar['correo']."')'>
		   <img src='Procesos/".$identificar['imagen']."'>
		   <div class='footer'><h3>".$identificar['nombre']."</h3></div>
		</button>
		</div>
		";
	}

	echo "
	<div class='ContenedorBotones'>
	<button type='button' class='SinAsignar' disabled>
		  <h1 class='Fuente-Henglebert'>Vacio</h1>
	</button>
	</div>
	";
} else if ($contar == 3) { //si hay 3 pacientes asignados
	while ($datapac=$sql->fetch(PDO::FETCH_ASSOC)) {
		$idpac = $datapac['idpaciente'];
		$identificar = identificar($idpac);

		echo "
		<div class='ContenedorBotones'>
		<button type='button' class='BotonDataPac' onclick='mispacientesInfo(".$identificar['correo'].")'>
		   <img src='Procesos/".$identificar['imagen']."'>
		   <div class='footer'><h3>".$identificar['nombre']."</h3></div>
		</button>
		</div>
		";
	}
} else { //si no hay ningun paciente asignado
	echo "
	<div class='ContenedorBotones'>
	<button type='button' class='SinAsignar' disabled>
		  <h1 class='Fuente-Henglebert'>Vacio</h1>
	</button>
	</div>
	";

	echo "
	<div class='ContenedorBotones'>
	<button type='button' class='SinAsignar' disabled>
		  <h1 class='Fuente-Henglebert'>Vacio</h1>
	</button>
	</div>
	";

	echo "
	<div class='ContenedorBotones'>
	<button type='button' class='SinAsignar' disabled>
		  <h1 class='Fuente-Henglebert'>Vacio</h1>
	</button>
	</div>
	";
}

echo '
</form>
';
?>
