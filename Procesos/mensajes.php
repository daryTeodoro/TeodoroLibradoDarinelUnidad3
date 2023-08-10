<style type="text/css">
	.headMensajes{
        background: #83fa8c;
        display: grid;
        grid-template-columns: 20% 80%;
    }.headMensajes div{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }.ContenidoMensajes{
        background: #ffffff;
        padding-top: 10px;
        overflow-y: auto;
    }.pieMensajes{
        background: #83fa8c;
        display: grid;
        grid-template-columns: 80% 20%;
    }.pieMensajes div{
        display: flex;
        align-items: center;
        justify-content: center;
    }.inputform{
    	height: 5.3vh;
    	width: 100%;
    }.ionicsend{
    	font-size: 1.6rem;
    	cursor: pointer;
    }.ionicsend:hover{
    	color: #930641;
    }

    .texto{
    	width: 60%;
    	display: grid;
    	grid-template-rows: auto 1rem;
    	padding: 10px 20px;
    }.remitente{
    	margin-bottom: 10px;
    	border-radius: 10px 0px 0px 10px;
    	background: #c5fdc6;

    	float: right;
    }.destinatario{
    	background: #fddcd7;
    	margin-bottom: 10px;
    	border-radius: 0px 10px 10px 0px;

    	float: left;
    }
</style>
<?php
session_start();
include('conexion.php');
include('funciones.php');
//usuario seleccionado
$remitente = $_POST['id'];

$verinfo = loguear($remitente);

//Busca el historial de mensajes entre el suaurio logueado y el usuario seleccionado
  $conexion = new Conexion();
  $sqlinfo = $conexion->prepare('SELECT * FROM mensajes WHERE remitente = :remitente AND destinatario = :destinatario OR remitente = :destinatario AND destinatario = :remitente'); 
  $sqlinfo->bindParam(':remitente',$remitente);
  $sqlinfo->bindParam(':destinatario',$_SESSION['UsuarioActivo']);
  $sqlinfo->execute();
  $countsqlinfo = $sqlinfo->rowCount();

  //consulta los mensajes no leidos
  $updatesta = $conexion->prepare('UPDATE mensajes SET leido = 0 WHERE remitente = :rem AND destinatario = :des'); 
  $updatesta->bindParam(':rem',$remitente);
  $updatesta->bindParam(':des',$_SESSION['UsuarioActivo']);
  $updatesta->execute();

  $resultados = "";

  if($countsqlinfo > 0){
  	while ($data=$sqlinfo->fetch(PDO::FETCH_ASSOC)){
  		//clasificacion de remitente y usuario
  		if ($data['remitente'] == $_SESSION['UsuarioActivo']){
  			$clase = 'remitente';
  		} else {
  			$clase = 'destinatario';
  		}

  		$resultados .= '<div class="texto '.$clase.'">
  		<b align="justify">'.$data['mensaje'].'</b>
  		<span style="font-size: .8rem; display: flex; align-items: center; justify-content: end; color: #a4a4a4;">'.$data['fecha'].'</span>
  		</div>';
  	}
  } else {
  	$resultados = '<center><b class="Fuente-Monomaniac">--- Comienza una Conversacion ---</b></center>';
  }
//imprime el historial de mensajes
echo '
<div class="headMensajes">
    <div><ion-icon name="arrow-back" style="font-size: 30px; cursor: pointer;" onclick="backMensajes()"></ion-icon></div>
    <div><b>'.$verinfo['nombre'].'</b></div>
</div>
<div class="ContenidoMensajes Barra" id="ContenidoMensajes">
'.$resultados.'
</div>
<div class="pieMensajes">
    <div>
        <input value='.$remitente.' id="para" style="display: none;">
        <input value='.$_SESSION['UsuarioActivo'].' id="de" style="display: none;">
        <input type="text" class="form-control inputform ms-4" name="mensajeEnviado" id="mensajeEnviado">
    </div>
    <div><ion-icon name="send" class="ionicsend" id="botonmensajenviar" onclick="mandar()"></ion-icon></div>
</div>
';
?>

<script type="text/javascript">
    //script para volver a la lista de usuarios
function backMensajes() {
	mensajespersonal.style.display = "none";
}
</script>
