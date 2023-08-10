<?php
session_start();
include('conexion.php');
include('funciones.php');
//correo del remitente
$correo = $_POST['Correo'];

//mensajes que ha enviado y se han recibido de este chat
$conexion = new Conexion();
$sqlinfo = $conexion->prepare('SELECT * FROM mensajes WHERE remitente = :remitente AND destinatario = :destinatario OR remitente = :destinatario AND destinatario = :remitente'); 
$sqlinfo->bindParam(':remitente',$correo);
$sqlinfo->bindParam(':destinatario',$_SESSION['UsuarioActivo']);
$sqlinfo->execute();
$countsqlinfo = $sqlinfo->rowCount();

  $resultados = "";

  //muestra todos los mensajes del chat
if($countsqlinfo > 0){
    while ($data=$sqlinfo->fetch(PDO::FETCH_ASSOC)){
        //identifica si son recibidos o enviados
        if ($data['remitente'] == $_SESSION['UsuarioActivo']){
            $clase = 'remitente';
        } else {
            $clase = 'destinatario';
        }
        //mensajes
        $resultados .= '<div class="texto '.$clase.'">
        <b align="justify">'.$data['mensaje'].'</b>
        <span style="font-size: .8rem; display: flex; align-items: center; justify-content: end; color: #a4a4a4;">'.$data['fecha'].'</span>
        </div>';
    }
}

//contenedor general
echo '
<div class="bg-dark Barra" style="overflow-y: auto;">'.$resultados.'</div>
<div class="BarraMensajes">
    <div>
        <input type="text" class="form-control" id="contenidoMessage">
    </div>
    <div><ion-icon name="send" class="ionicsend" onclick="hacerenvio(\''.$_SESSION['UsuarioActivo'].'\',\''.$correo.'\')"></ion-icon></div>
</div>
';
?>