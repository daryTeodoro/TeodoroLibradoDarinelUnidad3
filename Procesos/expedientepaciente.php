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

  .download{
    cursor: pointer;
    font-size: 2rem;
  }
</style>

<?php
include('conexion.php');
include('funciones.php');

$id = $_POST['id'];

$verinfo = loguear($id);

  $conexion = new Conexion();
  $info = $conexion->prepare("SELECT * FROM expedientes WHERE idpaciente = :idpa ORDER BY fecha DESC");
  $info->bindParam(':idpa',$id);
  $info->execute();
  $countinfo = $info->rowCount();

  $infoextra = "";

  if ($countinfo > 0 ){

    while ($dataexpe=$info->fetch(PDO::FETCH_ASSOC)) {

        $infoextra .= '<div class="p-3 Tarea">
          <div class="Col"><img src="img/pdf.png"></div>
          <div class="Col"><b class="Fuente-Fugaz">'.$dataexpe['nombre'].'</b></div>
          <div class="Col">
             <ion-icon name="cloud-download" onclick="download()" class="download"></ion-icon>
          </div>
        </div>';

      }

  } else {
    $infoextra .= '
    <div class="Alineacion ListaAnalisis">
      <h2 class="Fuente-Encode">No hay Registros</h2>
    </div>';
  }

echo '
<div class="bg-dark EspacioNav">
  <div><ion-icon name="arrow-back" style="font-size: 30px; cursor: pointer; color: #ffffff;" onclick="Volver(\'VistaExpediente\',\'Procesos/mispacientes-expedientes.php\')"></ion-icon></div>
  <div><b class="Fuente-Mochiy text-white">'.$verinfo['nombre'].'</b></div>
</div>
<div class="Contenedor2Col">
  <div><img src="Procesos/'.$verinfo['imagen'].'"></div>
  <div class="bg-light Columnainfo Barra">
     '.$infoextra.'
  </div>
</div>'
?>

<script>
        function download(){
            var pdfUrl = "Procesos/pdf/CURP.pdf"; // Cambia esto por la URL de tu archivo PDF
            var link = document.createElement("a");
            link.href = pdfUrl;
            link.download = "Analisis de Sangre.pdf"; // Cambia esto por el nombre deseado del archivo
            link.click();
        }
    </script>