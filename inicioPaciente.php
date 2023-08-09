<?php
session_start();
include('Procesos/conexion.php');
include('Procesos/funciones.php');
$UsuarioActivo = $_SESSION['UsuarioActivo'];
$datosUsuarioActivo = loguear($UsuarioActivo);
$_SESSION['IdUsuarioActivo'] = $datosUsuarioActivo['id'];

if($datosUsuarioActivo['visita'] == 1){
  echo"<style>
  #Principal{
    display: none;
  }#First{
    display: flex;
    height: 100vh;
    width: 100%;
    align-items: center;
    justify-content: center;
    text-align: center;
    flex-direction: column;
  }#First input{
    width: 70%;
  }
  </style>";
} else if ($datosUsuarioActivo['visita'] != 1) {
  echo"<style>
  #Principal{
    display: grid;
  }#First{
    display: none;
  }
  </style>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/logoSmartCure.png" alt="favicon">
    <title>SmartCare - Innovando en el Cuidado de la Salud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Fuentes-->
    <link rel="stylesheet" type="text/css" href="Estilos/fuentes.css">
    <!--Colores-->
    <link rel="stylesheet" type="text/css" href="Estilos/colores.css">
    <!--Boostrap Modificado-->
    <link rel="stylesheet" type="text/css" href="Estilos/boostrap.css">
    <!--Estilos Generales-->
    <link rel="stylesheet" type="text/css" href="Estilos/generales.css">
    <!-- JQuery Validate library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style type="text/css">
      body{
        background: #86c2ff;
        margin: 0;
      }

      .Principal{
        padding: 90px 10px 20px;
        display: grid;
        grid-template-columns: 40% 60%;
        height: 100vh;
        animation: entrada 0.3s linear forwards;

        background: rgba(0, 0, 0, 1.0) url(https://images.pexels.com/photos/82256/pexels-photo-82256.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1) no-repeat;
        background-size: cover;
      }

      .Columna1{
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
      }

      .Reloj{
        background: #ffffff;
        border: 10px solid #000000;
        height: 300px;
        width: 300px;
        border-radius: 150px;

        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }

      .Columna2{
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
      }

      .ListaDiaria{
        width: 70%;
        height: 100%;
        background: rgba(0, 0, 0, .1) url(https://i.pinimg.com/originals/81/81/a2/8181a2aa82b5d9eb10c8654b230468a8.jpg) no-repeat center;
        background-size: cover;
        background-blend-mode: darken;
      }

      #Tareas{
        height: 75vh;
        overflow-y: auto;
      }

      .Tarea{
        display: grid;
        grid-template-columns: 20% 60% 20%;
      }.Tarea img{
        width: 60px;
        height: 60px;
      }.Tarea .Col{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      .InformacionUsuario{
        width: 80%;
        text-align: justify;
        border: 2px solid #000000;
        text-align: center;

        display: grid;
        grid-template-columns: 100px auto;
      }

      .FotoPerfil img{
        width: 90px;
        height: 100%;
        border-radius: 0px 0px 100px 100px;
        border: 2px solid #000000;
      }

      .Datos{
        display: grid;
        grid-template-columns: 50% 50%;
      }
    </style>

  </head>
  <body>

<!--*****************QUIERO CAMBIAR EL TAMAÑO DE LA LISTA DE TAREAS-->

    <?php include('menu.php'); ?>

    <div class="Principal" id="Principal">
      <div class="Columna1">
        <div class="bg-light p-3 rounded mb-5 InformacionUsuario">
          
          <div class="FotoPerfil">
            <img src="<?php echo 'Procesos/'.$datosUsuarioActivo['imagen']; ?>">
          </div>

          <div>
            <b class="Fuente-Mochiy"><?php echo $datosUsuarioActivo['nombre']; ?></b>
            <hr>
            <div class="Datos Fuente-Encode">
              <div class="Derecha"><b>Estatura</b><br><?php echo $datosUsuarioActivo['estatura'].' cm'; ?></div>
              <div class="Izquierda"><b>Peso</b><br><?php echo $datosUsuarioActivo['peso'].' kg' ?></div>
            </div>

          </div>
        </div>
        <div class="Reloj Fuente-Monomaniac" id="Reloj">
          <?php include('Procesos/relojPaciente.php') ?>
        </div>
      </div>
      <div class="Columna2">
        <div class="ListaDiaria pt-2 pb-0 shadow-lg">
          <h1 class="Fuente-Fredericka bg-light p-1">Tareas Diarias</h1>
          <div class="Barra" id="Tareas"></div>
        </div>
      </div>
    </div>

    <form method="post" action="" id="First" class="bg-dark mb-0">
      <p class="text-white Fuente-Mochiy">Por motivos de seguridad realiza el cambio de tu contraseña</p>
      <input type="password" class="form-control mb-2" name="ContrasenActual" id="ContrasenActual" placeholder="Ingresa tu Contraseña Actual">
      <input type="password" class="form-control mb-2" name="ContrasenaNueva" id="ContrasenaNueva" placeholder="Ingresa tu Nueva Contraseña">
      <input type="password" class="form-control" name="ContrasenaNuevaRE" id="ContrasenaNuevaRE" placeholder="Repite la Nueva Contraseña">
      <button type="button" class="btn btn-danger mt-3" id="changePsw">Cambiar Contraseña</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>

<script type="text/javascript">
$(document).ready(function() {

  // Función para actualizar la hora
  setInterval(function() {
    $('#Reloj').load('Procesos/relojPaciente.php');
  }, 1000); // Intervalo de tiempo en milisegundos (1 segundos en este ejemplo)

  setInterval(function() {
    $('#Tareas').load('Procesos/tareasPaciente.php');
  }, 1000);

});
</script>


<script>
let vistaprincipal = document.getElementById("Principal");
let vistafirst = document.getElementById("First");

  $(document).ready(function() {

      $("#changePsw").click(function() {

        if ($("#ContrasenActual").val() == "") {
          alert('Ingresa tu Contraseña Actual');
        }else if ($("#ContrasenaNueva").val() == "") {
          alert('Ingresa una Nueva Contraseña');
        }else if ($("#ContrasenaNuevaRE").val() == "") {
          alert('Repite la Contraseña');
        }else if ($("#ContrasenaNueva").val() != $("#ContrasenaNuevaRE").val()) {
          alert('Las Contraseñas deben Coincidir');
        } else {
          var formData = new FormData(document.querySelector('#First'));

          $.ajax({
            url: "Procesos/cambiarContrasena.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
              if (data == 1) {
                alert('La contraseña nueva no debe ser igual a la anterior');
              } else if (data == 2) {
                alert('exito');
                $('#ContrasenActual').val('');
                $('#ContrasenaNueva').val('');
                $('#ContrasenaNuevaRE').val('');
                vistaprincipal.style.display = "grid";
                vistafirst.style.display = "none";
              }  else if (data == 3) {
                alert('La contraseña actual es incorrecta');
              }
            }
          });
        }
      });

  });
</script>