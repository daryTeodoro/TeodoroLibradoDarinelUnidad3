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
    border-top: 4px solid #a9071d;
  }.Columnainfo{
    overflow-y: auto;
    border-top: 4px solid #a9071d;
    animation: entrada 0.3s linear forwards;
  }.EspacioNav{
    display: grid;
    grid-template-columns: 20% 80%;
  }.EspacioNav div{
    display: flex;
    align-items: center;
    justify-content: center;
  }


  .Tarea{
    display: grid;
    grid-template-columns: 20% 60% 20%;
    transition: background 0.4s ease;
  }.Tarea img{
    width: 60px;
    height: 60px;
  }.Tarea .Col{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }.Col img{
    border: none;
  }

  .Alineacion{
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
  }
</style>

<?php
include('conexion.php');
include('funciones.php');

$id = $_POST['id'];

$verinfo = loguear($id);

  $conexion = new Conexion();
  $infopac = $conexion->prepare("SELECT * FROM tareas WHERE iduser = :id");
  $infopac->bindParam(':id',$id);
  $infopac->execute();
  $countinfopac = $infopac->rowCount();

  $infoextra ='';

  if ($countinfopac > 0){

    while ($data=$infopac->fetch(PDO::FETCH_ASSOC)) {

        if ($data['estatus'] == 0){
          $Estatus = "background: #d2fdde;";
          $displayicon = "display: block; font-size: 2rem;";
          $displayboton = "display: none;";
        } else {
          $Estatus = "background: #fdcfdc;";
          $displayicon = "display: none;";
          $displayboton = "display: block; border: 2px solid #000000; color: #ffffff; background: #ffffff;";
        }

        $infoextra .= '<div class="p-3 Tarea" style="'.$Estatus.'" id="cont'.$data['id'].'">
          <div class="Col"><img src="'.$data['tipo'].'"></div>
          <div class="Col"><b class="Fuente-Fugaz">'.$data['tarea'].'</b></div>
          <div class="Col">
             <button type="button" id="boton'.$data['id'].'" onclick="changestatus('.$data['id'].')" style="'.$displayboton.'">O</button>
             <ion-icon name="checkbox-outline" id="icono'.$data['id'].'" style="'.$displayicon.'"></ion-icon>
          </div>
        </div>';

      }

  } else {
    $infoextra .= '
    <div class="Alineacion">
      <h2 class="Fuente-Encode">No hay tareas</h2>
    </div>';
  }

echo '
<div class="bg-dark EspacioNav">
  <div><ion-icon name="arrow-back" style="font-size: 30px; cursor: pointer; color: #ffffff;" onclick="Volver(\'VistaTareas\',\'Procesos/mispacientes-tareas.php\')"></ion-icon></div>
  <div><b class="Fuente-Mochiy text-white">'.$verinfo['nombre'].'</b></div>
</div>
<div class="Contenedor2Col">
  <div><img src="Procesos/'.$verinfo['imagen'].'"></div>
  <div class="bg-light Columnainfo Barra">'.$infoextra.'</div>
</div>'
?>