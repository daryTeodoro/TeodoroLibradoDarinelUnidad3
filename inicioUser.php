<?php
session_start();
$Cuenta = "darinel.teodoro@gmail.com"
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.png" alt="favicon">
    <title>MEXICO ES MAGICO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--ESTILOS GENERALES-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
      .cg-c{
        grid-template-columns: 25% 25% 25% 25%;
      }


      body::-webkit-scrollbar { /* CSS scrollbar del body*/
        width: 3px;               
      }body::-webkit-scrollbar-track {
        background: #e0ecff;        
        border-radius: 10px;
      }body::-webkit-scrollbar-thumb {
          background-color: #8797ff;
          border-radius: 10px;
      }

      .cg-barra{
        height: 60px;
        grid-template-columns: 20% 70% 10%;
      }

      .card:hover{
        background-color: #005970;
        color: #fff;
      }

      .cg-b{
        grid-template-columns: 20% 80%;
      }

      #Volver{
        display: none;
      }
    </style>
  </head>
  <body style="background-color: #ecf7ff;">

    <?php include('menuperfil.php'); ?>
    
    <!--Contenido-->
    <div class="sc" align="center">
        
      <div align="center" style="padding: 90px 20px 30px;">
        <h1 class="ft">Bienvenido</h1>
        <h4 class="ft">Revisa el Catalogo de Viajes Disponibles para cada Estado</h4>
      </div>

      <div class="cg cg-c" align="center">
        <?php include('Procesos/estados.php'); ?>
      </div>

    </div>

    <div class="cf"></div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!--Libreria de Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>

<?php
if (isset($_POST['state'])) {
  $_SESSION['idstate'] = $_POST['state'];
  echo'<script>window.location.href="estado.php"</script>';
}

if (isset($_POST['exit'])) {
  session_destroy();
  echo'<script>window.location.href="forms.php"</script>';
}
?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white" data-bs-theme="dark">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mi Perfil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" align="center">
          <?php 
            include('Procesos/funciones.php'); 
            $datosperfil = consulta_users($Cuenta);

            echo'<div>
               <img src="'. $datosperfil['imagen'] .'" class="border border-4 border-light" alt="usuario" style="width: 200px; height: 200px; border-radius: 100px;"><br>
               <h4 class="fe mt-2">'. $datosperfil['nombre'] .'</h4>
               <form method="post" action="">
                  <button type="submit" class="btn btn-outline-dark mt-4 cg cg-b" name="exit" style="width: 50%;">
                    <div class="at" style="height: 100%;">
                      <ion-icon name="log-out-outline" style="font-size: 1.5rem;"></ion-icon>
                    </div>
                    <div class="at" style="height: 100%;">
                      <b class="fp" style="font-size: 1.3rem;">Cerrar Sesión</b>
                    </div>
                  </button>
               </form>
            </div>';
          ?>
      </div>
    </div>
  </div>
</div>