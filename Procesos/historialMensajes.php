<?php
session_start();
include('conexion.php');
include('funciones.php');

$correo = $_POST['Correo'];

  $conexion = new Conexion();
  $sqlinfo = $conexion->prepare('SELECT * FROM mensajes WHERE remitente = :remitente AND destinatario = :destinatario OR remitente = :destinatario AND destinatario = :remitente'); 
  $sqlinfo->bindParam(':remitente',$remitente);
  $sqlinfo->bindParam(':destinatario',$_SESSION['UsuarioActivo']);
  $sqlinfo->execute();
  $countsqlinfo = $sqlinfo->rowCount();

if($countsqlinfo > 0){
    while ($data=$sqlinfo->fetch(PDO::FETCH_ASSOC)){
        
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
}

echo '
<div class="bg-dark">'.$correo.'</div>
<div class="BarraMensajes">
    <div><input type="text" class="form-control"></div>
    <div><ion-icon name="send" class="ionicsend" id="botonmensajenviar"></ion-icon></div>
</div>
';
?>