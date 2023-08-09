<style type="text/css">
  .continfoextra{
    display: grid;
    grid-template-columns: 20% 80%;
    width: 100%;
    margin: 20px 0px 0px;
  }.continfoextra div{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 2px solid #a9071d;
    border-top: 0;
    background: #fdd9e9;
  }
</style>

<?php
include('conexion.php');
include('funciones.php');

$id = $_POST['id'];

$verinfo = loguear($id);

if ($verinfo['rol'] == 2) {

  $conexion = new Conexion();
  $sqlinfo = $conexion->prepare('SELECT * FROM cuidadores WHERE idenfermero = :enfermero'); 
  $sqlinfo->bindParam(':enfermero',$verinfo['id']);
  $sqlinfo->execute();
  $countsqlinfo = $sqlinfo->rowCount();

  $infoextra = '<div class="continfoextra">
    <div style="border-top: 2px solid #a9071d;">
      <ion-icon name="mail" style="font-size: 3rem;"></ion-icon>
    </div>
    <div style="border-top: 2px solid #a9071d;">
      '.$verinfo['correo'].'
    </div>

    <div>
      <ion-icon name="call" style="font-size: 3rem;"></ion-icon>
    </div>
    <div>
      '.$verinfo['telefono'].'
    </div>
  </div>
  ';

  if ($countsqlinfo > 0) {
    while ($infoex=$sqlinfo->fetch(PDO::FETCH_ASSOC)) {
    $datodelpac = identificar($infoex['idpaciente']);

      $infoextra .='
      <div class="continfoextra">
          <div style="border: 2px solid #067c90; background: #b8e1fc;">
            <ion-icon name="person" style="font-size: 3rem;"></ion-icon>
          </div>
          <div style="border: 2px solid #067c90; background: #b8e1fc;">
             '.$datodelpac['nombre'].'
          </div>
      </div>
      ';
    }

  }else{ //Si no hay coincidencias mostramos un mensaje
    $infoextra .='
    <div class="continfoextra">
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          <ion-icon name="person" style="font-size: 3rem;"></ion-icon>
        </div>
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          Aun no Hay Pacientes a su Cuidado
        </div>
    </div>
    ';
  }

} else if ($verinfo['rol'] == 3) {
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

  if ($countinfoenf > 0) {
    $enf=$infoenf->fetch(PDO::FETCH_ASSOC);
    $datodelenf = identificar($enf['idenfermero']);

    $infoextra .= '
    <div class="continfoextra">
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          <ion-icon name="medkit" style="font-size: 3rem;"></ion-icon>
        </div>
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          '.$datodelenf['nombre'].'
        </div>
    </div>
    ';
  } else {
    $infoextra .= '
    <div class="continfoextra">
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          <ion-icon name="medkit" style="font-size: 3rem;"></ion-icon>
        </div>
        <div style="border: 2px solid #067c90; background: #b8e1fc;">
          Sin Asignar Enfermero
        </div>
    </div>
    ';
  }
}

echo "
<div class='navegadorLista shadow'>
  <div><ion-icon name='arrow-back' style='font-size: 30px; cursor: pointer;' onclick='backConsulta()'></ion-icon></div>
  <div><h4 class='Fuente-Hina'>".$verinfo['nombre']."</h4></div>
</div>

<div class='informacionquecura'>
    <img src='Procesos/".$verinfo['imagen']."'>
    ".$infoextra."
</div>
";
?>