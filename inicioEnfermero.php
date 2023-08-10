<?php
session_start();
include('Procesos/conexion.php');
include('Procesos/funciones.php');
//informacion de la cuenta activa
$UsuarioActivo = $_SESSION['UsuarioActivo'];
$datosUsuarioActivo = loguear($UsuarioActivo);
$_SESSION['IdUsuarioActivo'] = $datosUsuarioActivo['id'];

if(empty($_SESSION['UsuarioActivo'])){
  echo"<script>
    window.location.href = 'index.php';
  </script>";
} else {
  if ($datosUsuarioActivo['rol'] == 1){
    echo"<script>
      window.location.href = 'inicioDirector.php';
    </script>";
  } else if ($datosUsuarioActivo['rol'] == 3){
    echo"<script>
      window.location.href = 'inicioPaciente.php';
    </script>";
  }
}

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
        grid-template-columns: 50% 50%;
        height: 100vh;
        animation: entrada 0.3s linear forwards;

        background: rgba(0, 0, 0, 1.0) url(https://p1.pxfuel.com/preview/387/761/246/background-desktop-gradient-grey.jpg) no-repeat;
        background-size: cover;
      }

      .Opciones {
        display: grid;
        grid-template-columns: 40% 60%;

        margin: 10px;
        background: #ffffff;
        border: 4px solid #000000;
        border-radius: 10px;
        cursor: pointer;
      }.Opciones:hover {
        background: #d6def5;
      }

      .Opciones img {
        width: 18vh;
        height: 18vh;
      }.Opciones div {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .VistaPacientes{
        position: absolute;
        height: 100vh;
        width: 100%;
        z-index: 2;
        background: #ffffff;

        display: none;
        animation: entrada 0.3s linear forwards;
      }

      .ContenedorCards{
        display: grid;
        grid-template-columns: 33% 34% 33%;
      }

      .VistaExpediente{
        position: absolute;
        height: 100vh;
        width: 100%;
        z-index: 2;
        background: #ffffff;

        display: none;
        animation: entrada 0.3s linear forwards;
      }

      .VistaTareas{
        position: absolute;
        height: 100vh;
        width: 100%;
        z-index: 2;
        background: #ffffff;

        display: none;
        animation: entrada 0.3s linear forwards;
      }

      .ContenedorCards4{
        display: grid;
        grid-template-columns: 40% 60%;
        padding: 0;
        margin: 0;
      }

      .VistaMensajes{
        position: absolute;
        height: 100vh;
        width: 100%;
        z-index: 2;
        background: #ffffff;

        display: none;
        animation: entrada 0.3s linear forwards;
      }

      .VistaMensajes,
      .VistaTareas,
      .VistaExpediente,
      .VistaPacientes {
        grid-template-rows: 8vh 92vh;
      }

      .AlignEnd{
        display: flex;
        align-items: center;
        justify-content: end;
        padding-right: 20px;
      }

      #VistaPacientes-personal{
        position: absolute;
        height: 100vh;
        width: 100%;
        z-index: 3;
        background: #ffffff;

        display: none;
        animation: entrada 0.3s linear forwards;
      }
    </style>

  </head>
  <body class="Barra">

<!--*****************QUIERO CAMBIAR EL TAMAÑO DE LA LISTA DE TAREAS-->

    <?php include('menu.php'); ?>

    <div class="Principal" id="Principal">
      <div class="Opciones" onclick="openOption('VistaPacientes')">
        <div><img src="img/opciones-enfermero/paciente.png"></div>
        <div><h2 class="Fuente-Mochiy">Pacientes</h2></div>
      </div>
      <div class="Opciones" onclick="openOption('VistaExpediente')">
        <div><img src="img/opciones-enfermero/expediente.png"></div>
        <div><h2 class="Fuente-Mochiy">Expedientes</h2></div>
      </div>
      <div class="Opciones" onclick="openOption('VistaTareas')">
        <div><img src="img/opciones-enfermero/tareas.png"></div>
        <div><h2 class="Fuente-Mochiy">Tareas</h2></div>
      </div>
      <div class="Opciones" onclick="openOption('VistaMensajes')">
        <div><img src="img/opciones-enfermero/mensajes.png"></div>
        <div><h2 class="Fuente-Mochiy">Mensajes</h2></div>
      </div>
    </div>

    <!----------------------------------------------VISTA PACIENTES-------------------------------------------------->
    <div class="VistaPacientes" id="VistaPacientes">
        <script type="text/javascript">
          $("#VistaPacientes").load('Procesos/mispacientes.php');
        </script>
    </div>

    <!----------------------------------------------VISTA EXPEDIENTE------------------------------------------------->
    <div class="VistaExpediente" id="VistaExpediente">
        <script type="text/javascript">
          $("#VistaExpediente").load('Procesos/mispacientes-expedientes.php');
        </script>
    </div>

    <!----------------------------------------------VISTA TAREAS------------------------------------------------->
    <div class="VistaTareas" id="VistaTareas">
        <script type="text/javascript">
          $("#VistaTareas").load('Procesos/mispacientes-tareas.php');
        </script>
    </div>

    <!----------------------------------------------VISTA MENSAJES------------------------------------------------>
    <div class="VistaMensajes" id="VistaMensajes">
      <div class="AlignEnd bg-info"><ion-icon name="close" class="IconoClose" onclick="closeOption('VistaMensajes')"></ion-icon></div>
      <form method="post" action="" class="ContenedorCards4" id="ContenedorCards4">
        <script type="text/javascript">
          $("#ContenedorCards4").load('Procesos/mispacientes-mensajes.php');
        </script>
      </form>
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

  function openOption(vista){
    let vistaOpen = document.getElementById(vista);

    vistaOpen.style.display= "grid";
    vistaprincipal.style.display= "none";
  }

  function closeOption(vista){
    let vistaClose = document.getElementById(vista);

    vistaClose.style.display = "none";
    vistaprincipal.style.display = "grid";
  }
</script>



<script type="text/javascript">
  function mispacientesInfo(correo){

    $.ajax({
            type: 'POST',
            url: 'Procesos/datosmipaciente.php',
            data: { id: correo },
            success: function(data) {
                $("#VistaPacientes").html(data);
            }
        });
  }

  function mispacientestareas(correo){

    $.ajax({
            type: 'POST',
            url: 'Procesos/gestionTareas.php',
            data: { id: correo },
            success: function(data) {
                $("#VistaTareas").html(data);
            }
    });
  }

  function mispacientesexpediente(correo){

    $.ajax({
            type: 'POST',
            url: 'Procesos/expedientepaciente.php',
            data: { id: correo },
            success: function(data) {
                $("#VistaExpediente").html(data);
            }
        });
  }

  function Volver(contenedor,ruta){
    $("#"+contenedor).load(ruta);
  }

  function changestatus(id){
    let cont = document.getElementById("cont"+id);
    var icono = document.getElementById("icono"+id);
    var boton = document.getElementById("boton"+id);

    $.ajax({
            type: 'POST',
            url: 'Procesos/changestatus.php',
            data: { id: id }
    });

    cont.style.background = "#d2fdde";
    icono.style.display = "block";
    icono.style.fontSize = "2rem";
    boton.style.display = "none";
  }


  function historial(correo){
    $.ajax({
            type: 'POST',
            url: 'Procesos/dataMessage.php',
            data: { Correo: correo },
            success: function(response) {
                $("#PantallaMessages").html(response);
            }
    });
  }


  function hacerenvio(remitente, destinatario){
    var mensaje = $("#contenidoMessage").val();

    if ($("#contenidoMessage").val() == ""){
      alert("escribe un mensaje");
    } else {

      $.ajax({
        type: 'POST',
        url: 'Procesos/insertmessage.php',
        data: { r: remitente, d: destinatario, m: mensaje },
        success: function(response) {
          $.ajax({
              type: 'POST',
              url: 'Procesos/historialMensajes.php',
              data: { Correo: destinatario },
              success: function(datouser) {
                $("#PantallaMessages").html(datouser);
              }
          });
        }
      });

    }
  }
</script>
