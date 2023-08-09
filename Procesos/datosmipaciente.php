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
  $infohabi = $conexion->prepare("SELECT * FROM habitaciones WHERE idpaciente = :idpah");
  $infohabi->bindParam(':idpah',$verinfo['id']);
  $infohabi->execute();
  $countinfohabi = $infohabi->rowCount();

  $infoenf = $conexion->prepare("SELECT * FROM cuidadores WHERE idpaciente = :idpae");
  $infoenf->bindParam(':idpae',$verinfo['id']);
  $infoenf->execute();
  $countinfoenf = $infoenf->rowCount();


  $infoextra = ' <div class="continfoextra">
    <div style="border-top: 2px solid #a9071d;">
      <ion-icon name="call" style="font-size: 3rem;"></ion-icon>
    </div>
    <div style="border-top: 2px solid #a9071d;">
      '.$verinfo['telefono'].'
    </div>

    <div>
      <ion-icon name="barbell" style="font-size: 3rem;"></ion-icon>
    </div>
    <div>
      '.$verinfo['peso'].' kg
    </div>

    <div>
      <ion-icon name="podium" style="font-size: 3rem;"></ion-icon>
    </div>
    <div>
      '.$verinfo['estatura'].' cm
    </div>
  </div>';

  if ($countinfohabi > 0) {
    $habi=$infohabi->fetch(PDO::FETCH_ASSOC);
    $infoextra .= '
    <div class="continfoextra">
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          <ion-icon name="bed" style="font-size: 3rem;"></ion-icon>
        </div>
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          '.$habi['id'].'
        </div>
    </div>
    ';
  } else {
    $infoextra .= '
    <div class="continfoextra">
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          <ion-icon name="bed" style="font-size: 3rem;"></ion-icon>
        </div>
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          Sin Asignar Habitacion
        </div>
    </div>
    ';
  }

echo '
<div class="bg-dark EspacioNav">
  <div><ion-icon name="arrow-back" style="font-size: 30px; cursor: pointer; color: #ffffff;" onclick="Volver(\'VistaPacientes\',\'Procesos/mispacientes.php\')"></ion-icon></div>
  <div><b class="Fuente-Mochiy text-white">'.$verinfo['nombre'].'</b></div>
</div>
<div class="Contenedor2Col">
  <div><img src="Procesos/'.$verinfo['imagen'].'"></div>
  <div class="bg-dark Columnainfo">'.$infoextra.'</div>
</div>'
?>