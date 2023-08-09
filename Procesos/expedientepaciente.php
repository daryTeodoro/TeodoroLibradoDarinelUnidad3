<style type="text/css">
  .continfoextra{
    display: grid;
    grid-template-columns: 20% 80%;
    width: 100%;
    margin: 0px;
  }.continfoextra div{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 2px solid #a9071d;
    border-top: 0;
    background: #fdd9e9;
  }

  .Contenedor2Col{
    display: grid;
    grid-template-columns: 40% 60%;
  }img{
    width: 100%;
    height: 92vh;
    border-top: 2px solid #a9071d;
  }.Columnainfo{
    display: grid;
    grid-template-rows: 75% 25%;
  }.EspacioNav{
    display: grid;
    grid-template-columns: 20% 80%;
  }.EspacioNav div{
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>

<?php
include('conexion.php');
include('funciones.php');

$id = $_POST['id'];

$verinfo = loguear($id);

  $conexion = new Conexion();
  $info = $conexion->prepare("SELECT * FROM expedientes WHERE idpaciente = :idpa");
  $info->bindParam(':idpa',$id);
  $info->execute();
  $countinfo = $info->rowCount();

  if ($countinfo > 0 ){
    $infoextra = "helio";
  } else {
    $infoextra = "No hay datos";
  }

echo '
<div class="bg-dark EspacioNav">
  <div><ion-icon name="arrow-back" style="font-size: 30px; cursor: pointer; color: #ffffff;" onclick="Volver(\'VistaExpediente\',\'Procesos/mispacientes-expedientes.php\')"></ion-icon></div>
  <div><b class="Fuente-Mochiy text-white">'.$verinfo['nombre'].'</b></div>
</div>
<div class="Contenedor2Col">
  <div><img src="Procesos/'.$verinfo['imagen'].'"></div>
  <div class="bg-dark Columnainfo">'.$infoextra.'</div>
</div>'
?>