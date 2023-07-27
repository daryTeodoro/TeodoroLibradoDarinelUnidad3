<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.png" alt="favicon">
    <title>MEXICO ES MAGICO</title>
    <!--Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--ESTILOS GENERALES-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
      .cg-c{
        grid-template-columns: 33% 34% 33%;
      }

      .cg-t{
        grid-template-columns:  20% 80%;
      }

      .po{
        display: grid;
        grid-template-columns: 10% 90%;
        cursor: pointer;
        color: #ffffff;
      }.po:hover{
        background-color: #e4eaf8;
        color: #000000;
      }.io{
        width: 100%;
        height: 100%;
      }

      .sc::-webkit-scrollbar { /* CSS scrollbar del body*/
        width: 3px;               
      }.sc::-webkit-scrollbar-track {
        background: #e0ecff;        
        border-radius: 10px;
      }.sc::-webkit-scrollbar-thumb {
          background-color: #8797ff;
          border-radius: 10px;
      }

      .card{
        cursor: pointer;
      }

      .cg-s{
        grid-template-columns: 60% 40%;
      }
    </style>
  </head>
  <body>

    <div class="cg cg-t">

      <!--Perfil-->
      <div class="bg-dark sc" style="height: 100vh; padding: 40px 0px 40px; overflow-y: auto;">
          <?php include('Procesos/perfil.php'); ?>
      </div>

      <!--Contenido-->
      <div class="sc" align="center" style="height: 100vh; overflow-y: auto;">
        
        <div align="center" style="margin: 60px 20px 30px;">
          <h1 class="ft">Bienvenido</h1>
          <h4 class="ft">¿Que deseas realizar?</h4>
        </div>

        <div class="cg cg-c" align="center">
          <div class="at mb-4">
            <div class="card bg-dark text-white fst" style="width: 18rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <img src="https://www.cloudcenterandalucia.es/wp-content/uploads/2021/08/Cloud-Center-Andaluc%C3%ADa_Soporte-T%C3%A9cnico.png" class="card-img-top" alt="Soporte" style="height: 12rem;">
              <div class="card-body">
                <h4 class="card-text">Soporte</h4>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header bg-dark text-white" data-bs-theme="dark">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitudes</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <?php include('Procesos/chats.php'); ?>
                </div>
              </div>
            </div>
          </div>



          <div class="at mb-4">
            <div class="card bg-dark text-white fst" style="width: 18rem;">
              <img src="https://img.freepik.com/fotos-premium/cuatro-estrellas-azul_72104-1337.jpg" class="card-img-top" alt="Eventos" style="height: 12rem;">
              <div class="card-body">
                <h4 class="card-text">Eventos</h4>
              </div>
            </div>
          </div>

          <div class="at mb-4">
            <div class="card bg-dark text-white fst" style="width: 18rem;">
              <img src="https://relevantmkt.com/wp-content/uploads/tipos-eventos-marketing.jpg" class="card-img-top" alt="Secciones" style="height: 12rem;">
              <div class="card-body">
                <h4 class="card-text">Secciones</h4>
              </div>
            </div>
          </div>
        </div>

        <div align="center" style="margin: 80px 20px 0px;">
          <h4 class="ft">Como Personal es Importante Recordar...</h4>
        </div>

        <div class="contenedor-fluid p-5">
          <div class="row">
            <div class="col-2 at">
              <h2 class="ft text-success">Misión</h2>
            </div>
            <div class="col-10" align="justify">
              <p><b class="fp" style="font-size: 1.2rem;">Nuestra misión es ser la plataforma líder que conecta a los viajeros con las mejores agencias de viajes que ofrecen experiencias únicas y auténticas en diferentes partes de México. Nos esforzamos por proporcionar un catálogo completo y diverso de opciones de viaje, garantizando la satisfacción de nuestros clientes al ofrecerles opciones confiables y emocionantes para descubrir los tesoros culturales, naturales y gastronómicos que México tiene para ofrecer.</b></p>
            </div>
          </div>
        </div>

        <div class="contenedor-fluid p-5 pt-0">
          <div class="row">
            <div class="col-2 at">
              <h2 class="ft text-success">Visión</h2>
            </div>
            <div class="col-10" align="justify">
              <p><b class="fp" style="font-size: 1.2rem;">Nuestra visión es ser la referencia indiscutible en la industria de viajes en México, siendo reconocidos por nuestra calidad, innovación y compromiso con la excelencia en el servicio. Aspiramos a ser el puente que conecta a los viajeros con las mejores agencias, facilitando experiencias de viaje inolvidables y enriquecedoras. Con nuestra plataforma, queremos inspirar a los viajeros a explorar y apreciar la diversidad y riqueza de México, al tiempo que fomentamos el desarrollo sostenible del turismo en el país.</b></p>
            </div>
          </div>
        </div>

      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!--Libreria de Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>

<?php
if (isset($_POST['atender'])) {
  $_SESSION['idchat'] = $_POST['atender'];
  echo'<script>window.location.href="response.php"</script>';
}
?>