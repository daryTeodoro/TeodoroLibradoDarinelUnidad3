<?php
session_start();
include('Procesos/conexion.php');
include('Procesos/funciones.php');
/*Variables de la sesion*/
$UsuarioActivo = $_SESSION['UsuarioActivo'];
$datosUsuarioActivo = loguear($UsuarioActivo);
$_SESSION['IdUsuarioActivo'] = $datosUsuarioActivo['id'];

if(empty($_SESSION['UsuarioActivo'])){
  echo"<script>
    window.location.href = 'index.php';
  </script>";
} else {
  $verol = loguear($_SESSION['UsuarioActivo']);

  if ($verol['rol'] == 2){
    echo"<script>
      window.location.href = 'inicioEnfermero.php';
    </script>";
  } else if ($verol['rol'] == 3){
    echo"<script>
      window.location.href = 'inicioPaciente.php';
    </script>";
  }
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
        background: rgba(0, 0, 0, 1.0) url(https://img.freepik.com/fotos-premium/textura-marmol-blanco-fondo_42682-287.jpg?w=2000) no-repeat fixed;
        background-size: cover;
      }

      .Principal{
        padding: 100px 10px 20px;
        display: grid;
        grid-template-columns: 40% 60%;

        height: 100vh;
        align-items: center;
        justify-content: center;
        animation: entrada 0.3s linear forwards;
      }

      .Col-Izquierda{
        display: flex;
        align-items: center;
        justify-content: center;
      }.Col-Izquierda img{
        width: 70%;
        height: 70vh;
      }

      .Col-Derecha{
        display: grid;
        grid-template-columns: 50% 50%;
      }.BotonOpciones{
        background: #ffffff;
        border-radius: 5px 40px;
        border: 3px solid #000000;
        padding: 15px 10px;
        transition: background-color 0.4s ease;
      }.BotonOpciones:hover{
        background: #ff315a;
      }.BotonOpciones img{
        height: 50px;
        width: 50px;
      }

      .ContenedorGeneralRegistro{
        height: 100vh;
        width: 100%;
        background: #ffffff;
        padding: 10px 30px;

        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;

        position: absolute;
        z-index: 2;
        animation: entrada 0.2s linear forwards;
      }

      #Contenedor-RegistroForm{
        height: 70vh;
        width: 100%;
      }

      .b-Ancla{
        cursor: pointer;
        color: #000000;
      }.b-Ancla:hover{
        color: #ff315a;
      }

      #registroPaciente{
        animation: entrada 0.3s linear forwards;
        /*height: 100%;*/
      }#registroEnfermero{
        display: none;
        animation: entrada 0.3s linear forwards;
        /*height: 100%;*/
      }

      .BotonSeleccionar{
        background: #bbd5fc;
        border-radius: 10px;
        padding: 5px 20px;
        border: none;
      }

      .BotonSeleccionado{
        background: #5589f8;
        color: #ffffff;
        border-radius: 10px;
        padding: 5px 20px;
        border: none;
      }

      .ContenedorConsultar{
        height: 100vh;
        display: none;
        background: #ffffff;
        width: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        position: absolute;
        z-index: 2;
        animation: entrada 0.2s linear forwards;
      }

      .ListaUsuarios{
        height: 70vh;
        width: 80%;
        margin: 30px 0px;
        overflow-y: auto;
        border-top: 2px solid #000000;
        border-bottom: 2px solid #000000;
      }

      .ContenedorInfoUser{
        display: grid;
        grid-template-columns: 20% 60% 20%;
        cursor: pointer;
        transition: background-color 0.4s ease;
        animation: entrada 0.2s linear forwards;

        width: 100%;
        border: none;
        background: none;
      }.ContenedorInfoUser:hover{
        background: #e3ecfe;
      }.ContenedorInfoUser div{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
      }.ContenedorInfoUser div img{
        height: 100px;
        width: 100px;
        border-radius: 50px;
      }.SinReferencias{
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        /*animation: entrada 0.2s linear forwards;*/
      }

      .navegadorLista{
        height: 7vh;
        background: lightblue;
        display: grid;
        grid-template-columns: 20% 80%;
        animation: entrada 0.2s linear forwards;
      }.navegadorLista div{
        display: grid;
        align-items: center;
        justify-content: center;
      }

      .informacionquecura{
        height: 62.5vh;
        overflow-y: auto;
        padding: 20px 0px;
        animation: entrada 0.2s linear forwards;
        text-align: center;
      }.informacionquecura::-webkit-scrollbar { /* CSS scrollbar del body*/
        display: none;              
      }.informacionquecura img{ /* CSS scrollbar del body*/
        height: 200px;
        width: 200px;              
      }


      .ContenedorGestionar{
        height: 100vh;
        display: none;
        background: #ffffff;
        width: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        position: absolute;
        z-index: 2;
        animation: entrada 0.2s linear forwards;
      }

      #asignarForm{
        width: 100%;
      }

      #contAsignHab,
      #contAsignEnf{
        height: 70vh;
        animation: entrada 0.2s linear forwards;
        margin-bottom: 20px;
      }#contAsignEnf{
        display: none;
      }#contAsignHab{
        display: grid;
        grid-template-columns: 20% 20% 20% 20% 20%;
        grid-template-rows: 14vh 14vh 14vh 14vh 14vh;
      }#contAsignHab div{
        height: 100%;
        width: 100%;
      }

      .piso{
        background: #e8e8e8;
      }.cuarto-desocupado{
        background: rgba(0, 255, 0, .7) url(img/cuarto.png) no-repeat;
        background-size: 100% 100%;
        background-blend-mode: darken;

        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        color: white;

        cursor: pointer;
      }.cuarto-ocupado{
        background: rgba(255, 0, 0, .5) url(img/cuarto.png) no-repeat;
        background-size: 100% 100%;
        background-blend-mode: darken;

        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        color: white;

        cursor: pointer;
      }.escalera{
        background: rgba(0, 0, 0, 1.0) url(https://previews.123rf.com/images/byjeng/byjeng1405/byjeng140500055/28243382-escaleras-de-hormig%C3%B3n-camino-del-mar.jpg) no-repeat center;
        background-size: cover;
      }.jardin{
        background: rgba(0, 0, 0, 1.0) url(https://thumbs.dreamstime.com/b/hierba-verde-textuarrema-de-c%C3%A9sped-fondo-la-textura-pasto-fresco-futbol-vista-vivo-con-un-color-fuerte-y-agradable-textuarreen-206998343.jpg) no-repeat center;
        background-size: cover;
      }.cocina{
        background: rgba(0, 0, 0, 1.0) url(https://st4.depositphotos.com/2523411/41392/i/450/depositphotos_413923748-stock-photo-white-tile-on-the-wall.jpg) no-repeat center;
        background-size: cover;
      }.recreacion{
        background: rgba(0, 0, 0, 1.0) url(https://previews.123rf.com/images/casanowe/casanowe1307/casanowe130700141/20550148-fondo-de-la-textura-del-tapete-de-pl%C3%A1stico-amarillo.jpg) no-repeat center;
        background-size: cover;
      }.pisomadera{
        background: rgba(0, 0, 0, 1.0) url(https://img.freepik.com/vector-premium/fondo-modelo-textura-piso-madera-pared-belleza-ejemplo-vector_34266-1739.jpg?w=2000) no-repeat center;
        background-size: cover;
      }


      .ContenedorMensajes{
        height: 100vh;
        display: none;
        background: rgba(0, 0, 0, .2) url(https://media.istockphoto.com/id/1158181038/es/vector/patr%C3%B3n-de-un-conjunto-de-juguete-para-ni%C3%B1os.jpg?s=612x612&w=0&k=20&c=ol4M875kK86pL02eMHbQRK6Oyg2hh646Z3SKjqcs3so=);
        background-blend-mode: darken;
        width: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        position: absolute;
        z-index: 2;
        animation: entrada 0.2s linear forwards;
      }


      .ContenedorInfoMensajes{
        display: grid;
        grid-template-columns: 20% 60% 20%;
        cursor: pointer;
        transition: background-color 0.4s ease;
        animation: entrada 0.2s linear forwards;

        width: 100%;
        border: none;
        background: none;
      }.ContenedorInfoMensajes:hover{
        background: #e3ecfe;
      }.ContenedorInfoMensajes div{
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
      }.ContenedorInfoMensajes div img{
        height: 100px;
        width: 100px;
        border-radius: 50px;
      }

      .intermen{
        height: 100vh;
        width: 100%;
        display: none;
        grid-template-rows: 8vh 84vh 8vh;

        position: absolute;
        z-index: 3;
        animation: entrada 0.2s linear forwards;
      }
    </style>

  </head>
  <body class="Barra">

    <?php include('menu.php'); ?>

    <!------------------------------------------CONTENEDOR PRINCIPAL------------------------------------------------->
    <div class="Principal" id="Principal">

      <!--IMAGEN-->
      <div class="Col-Izquierda">
        <img src="https://static.vecteezy.com/system/resources/previews/011/098/092/original/hospital-clinic-building-3d-icon-illustration-png.png">
      </div>

      <!--OPCIONES-->
      <div class="Col-Derecha Fuente-Fugaz">
          <button class="BotonOpciones m-4 shadow-lg" onclick="registrar()">
            <img src="img/opciones/registrar.png"> Registrar
          </button>
          <button class="BotonOpciones m-4 shadow-lg" onclick="gestionar()">
            <img src="img/opciones/gestionar.png"> Gestionar
          </button>
          <button class="BotonOpciones m-4 shadow-lg" onclick="consultar()">
            <img src="img/opciones/consultar.png"> Consultar
          </button>
          <button class="BotonOpciones m-4 shadow-lg" onclick="mensajear()">
            <img src="img/opciones/notificar.png"> Mensajes
          </button>
      </div>

    </div>

    <!------------------------------------------MENU DE REGISTRO---------------------------------------------------->
    <div class="ContenedorGeneralRegistro" id="ContenedorGeneralRegistro">
      <!--OPCIONES DE TIPOS DE REGISTRO-->
      <div class="text-center mb-4">
        <button class="BotonSeleccionar mb-1" id="Enfermero" onclick="enfermeroForm()" disabled="">Registrar Enfermero</button>
        <button class="BotonSeleccionado" id="Paciente" onclick="pacienteForm()" disabled="">Registrar Paciente</button>
      </div>

      <form method="post" action="" enctype="multipart/form-data" id="Contenedor-RegistroForm">
        <div id="registroPaciente"><?php include('registroPaciente-Director.php') ?></div>
        <div id="registroEnfermero"><?php include('registroEnfermero-Director.php') ?></div>
      </form>
    </div>

    <!------------------------------------------MENU DE CONSULTA---------------------------------------------------->
    <div class="ContenedorConsultar" id="ContenedorConsultar">
      <input type="text" class="form-control shadow-lg" name="search" id="search" placeholder="Ingresa un Nombre">
      <form method="post" action="" class="ListaUsuarios Barra" id="ListaUsuarios">
        <script type="text/javascript">
          $("#ListaUsuarios").load('Procesos/ListaUsuarios.php');
        </script>
      </form>
      <center><b class="Fuente-Mochiy b-Ancla" onclick="minimizaConsulta()">Cerrar</b></center>
    </div>

    <!------------------------------------------MENU DE GESTION---------------------------------------------------->
    <div class="ContenedorGestionar" id="ContenedorGestionar">
      <div class="text-center mb-4">
        <button class="BotonSeleccionar mb-1" id="AsgEnfermero" onclick="AsignarEnfermeroForm()" disabled="">Asignar Enfermero</button>
        <button class="BotonSeleccionado" id="AsgHabitacion" onclick="AsinarHabitacionForm()" disabled="">Asignar Habitacion</button>
      </div>

      <div id="asignarForm">
        <div id="contAsignEnf">
          <script type="text/javascript">
            $("#contAsignEnf").load('asignarEnfermeroForm.php');
          </script>
        </div>
        
        <div method="post" action="" id="contAsignHab">
          <script type="text/javascript">
            $("#contAsignHab").load('habitaciones.php');
          </script>  
        </div>
        <center><b class='Fuente-Mochiy b-Ancla' onclick='minimizaGestion()'>Cerrar</b></center>
      </div>
    </div>

    <!------------------------------------------MENU DE MENSAJES---------------------------------------------------->
    <div class="ContenedorMensajes" id="ContenedorMensajes">
      <input type="text" class="form-control shadow-lg" id="buscaremitentes" placeholder="Ingresa un Nombre">

      <form method="post" action="" class="ListaUsuarios Barra shadow-lg" id="ListaMensajeria" style="background: #ffffff;">
        <script type="text/javascript">
          $("#ListaMensajeria").load('Procesos/ListaMensajes.php');
        </script>
      </form>

      <center><b class="Fuente-Mochiy b-Ancla" onclick="minimizaMensajes()">Cerrar</b></center>
    </div>

    <!-----SECCION DE LOS MENSAJES------>
    <div class="intermen" id="intermen">
      <!--Aqui van los mensajes-->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>


<script type="text/javascript">
let contenedorPrincipal = document.getElementById("Principal");

let contenedorRegistro = document.getElementById("ContenedorGeneralRegistro");
let registroPaciente = document.getElementById("registroPaciente");
let registroEnfermero = document.getElementById("registroEnfermero");

var botonPaciente = document.getElementById("Paciente");
var botonEnfermero = document.getElementById("Enfermero");

botonEnfermero.disabled=false;
botonPaciente.disabled=true;

function registrar(){
   contenedorRegistro.style.display = 'flex';
   contenedorPrincipal.style.display = 'none';
}

function minimizaRegistro(){
   contenedorRegistro.style.display = 'none';
   contenedorPrincipal.style.display = 'grid';
}

function pacienteForm(){
    registroEnfermero.style.display = 'none';
    registroPaciente.style.display = 'block';
    botonEnfermero.disabled=false;
    botonPaciente.disabled=true;
    botonPaciente.classList.remove('BotonSeleccionar');
    botonPaciente.classList.add('BotonSeleccionado');
    botonEnfermero.classList.remove('BotonSeleccionado');
    botonEnfermero.classList.add('BotonSeleccionar');
}

function enfermeroForm(){
    registroEnfermero.style.display = 'block';
    registroPaciente.style.display = 'none';
    botonEnfermero.disabled=true;
    botonPaciente.disabled=false;
    botonPaciente.classList.remove('BotonSeleccionado');
    botonPaciente.classList.add('BotonSeleccionar');
    botonEnfermero.classList.remove('BotonSeleccionar');
    botonEnfermero.classList.add('BotonSeleccionado');
}



let contenedorConsulta = document.getElementById("ContenedorConsultar");

function consultar(){
   contenedorConsulta.style.display = 'flex';
   contenedorPrincipal.style.display = 'none';
}

function minimizaConsulta(){
   contenedorConsulta.style.display = 'none';
   contenedorPrincipal.style.display = 'grid';
}

function backConsulta(){
    $("#ListaUsuarios").load('Procesos/ListaUsuarios.php');
}



let contenedorGestiona = document.getElementById("ContenedorGestionar");

var botonAsgEnfermero = document.getElementById("AsgEnfermero");
var botonAsgHabitacion = document.getElementById("AsgHabitacion");

let contAsignEnf = document.getElementById("contAsignEnf");
let contAsignHab = document.getElementById("contAsignHab");

botonAsgEnfermero.disabled=false;
botonAsgHabitacion.disabled=true;

function gestionar(){
   contenedorGestiona.style.display = 'flex';
   contenedorPrincipal.style.display = 'none';
}

function minimizaGestion(){
   contenedorGestiona.style.display = 'none';
   contenedorPrincipal.style.display = 'grid';
}

function AsinarHabitacionForm(){
    contAsignEnf.style.display = 'none';
    contAsignHab.style.display = 'grid';
    botonAsgEnfermero.disabled=false;
    botonAsgHabitacion.disabled=true;

    botonAsgHabitacion.classList.remove('BotonSeleccionar');
    botonAsgHabitacion.classList.add('BotonSeleccionado');
    botonAsgEnfermero.classList.remove('BotonSeleccionado');
    botonAsgEnfermero.classList.add('BotonSeleccionar');
}

function AsignarEnfermeroForm(){
    contAsignEnf.style.display = 'grid';
    contAsignHab.style.display = 'none';
    botonAsgEnfermero.disabled=true;
    botonAsgHabitacion.disabled=false;
    botonAsgHabitacion.classList.remove('BotonSeleccionado');
    botonAsgHabitacion.classList.add('BotonSeleccionar');
    botonAsgEnfermero.classList.remove('BotonSeleccionar');
    botonAsgEnfermero.classList.add('BotonSeleccionado');
}


let contenedorMensajes = document.getElementById("ContenedorMensajes");

function mensajear(){
   contenedorMensajes.style.display = 'flex';
   contenedorPrincipal.style.display = 'none';
}

function minimizaMensajes(){
   contenedorMensajes.style.display = 'none';
   contenedorPrincipal.style.display = 'grid';
}

let mensajespersonal = document.getElementById("intermen");
</script>

<script>
  $(document).ready(function() {

      $("#pacienteRegistrar").click(function() {

        if ($("#fotoPaciente").val() == "") {
          alert('Selecciona una Imagen');
        }else if ($("#TelefonoPaciente").val() == "") {
          alert('Telefono Invalido');
        } else if ($("#NombrePaciente").val() == "") {
          alert("Nombre Vacio");
        }  else if ($("#PesoPaciente").val() == "") {
          alert("Ingrese Peso");
        }  else if ($("#EstaturaPaciente").val() == "") {
          alert("Ingrese Estatura");
        }  else if ($("#Pregunta1Paciente").val() == 0) {
          alert("Configura la pregunta 1");
        }  else if ($("#Respuesta1").val() == "") {
          alert("Configura la respuesta de la pregunta 1");
        }  else if ($("#Pregunta2Paciente").val() == 0) {
          alert("Configura la pregunta 2");
        }  else if ($("#Respuesta2").val() == "") {
          alert("Configura la respuesta de la pregunta 2");
        }  else if ($("#Pregunta1Paciente").val() == $("#Pregunta2Paciente").val()) {
          alert("Selecciona diferentes Preguntas");
        } else {
          var formData = new FormData(document.querySelector('#Contenedor-RegistroForm'));

          $.ajax({
            url: "Procesos/registrarPaciente.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
              if (data == 1) {
                alert('redundacion de numero');
              } else if (data == 2) {
                alert('exito');
                $('#fotoPaciente').val('');
                $('#TelefonoPaciente').val('');
                $('#NombrePaciente').val('');
                $('#PesoPaciente').val('');
                $('#EstaturaPaciente').val('');
                $('#Pregunta1Paciente').val(0);
                $('#Respuesta1').val('');
                $('#Pregunta2Paciente').val(0);
                $('#Respuesta2').val('');
              }
            }
          });
        }
      });

      $("#enfermeroRegistrar").click(function() {
      let emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

        if ($("#fotoEnfermero").val() == "") {
          alert('Selecciona una Imagen');
        }else if ($("#CorreoEnfermero").val() == "" || !emailreg.test($("#CorreoEnfermero").val())) {
          alert('Correo Invalido');
        } else if ($("#NombreEnfermero").val() == "") {
          alert("Nombre Vacio");
        }  else if ($("#TelefonoEnfermero").val() == "") {
          alert("Telefono Vacio");
        } else {
          var formData = new FormData(document.querySelector('#Contenedor-RegistroForm'));

          $.ajax({
            url: "Procesos/registrarEnfermero.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
              if (data == 1) {
                alert('redundacion de correo');
              } else if (data == 2) {
                alert('redundacion de numero');
              }  else if (data == 3) {
                alert('exito');
                $('#fotoEnfermero').val('');
                $('#CorreoEnfermero').val('');
                $('#NombreEnfermero').val('');
                $('#TelefonoEnfermero').val('');
              }
            }
          });
        }
      });

  });

  //Codigo para buscar (Filtrar)
  $(function(){
    $("#search").on("keyup", function(){
      var search = $("#search").val();

      $.ajax({
        type: "post",
        url: "Procesos/buscar.php",
        data: {
          Filtro: search
        },
        success: function(respuesta){
          $("#ListaUsuarios").html(respuesta);
        }
      })

    })
  });

  function mandar(){
    var mensaje = $("#mensajeEnviado").val();
    var destinatario = $("#para").val();
    var remitente = $("#de").val();

    if ($("#mensajeEnviado").val() == ""){
      alert("mensaje vacio");
    } else {

      $.ajax({
        type: 'POST',
        url: 'Procesos/insertmessage.php',
        data: { r: remitente, d: destinatario, m: mensaje },
        success: function(r) {
            console.log('Enviado');
        }
      });

      $.ajax({
        type: 'POST',
        url: 'Procesos/mensajes.php',
        data: { id: destinatario },
        success: function(datouser) {
            $("#intermen").html(datouser);
        }
      });

    } 
  }


  //Codigo para buscar (Filtrar)
  $(function(){
    $("#buscaremitentes").on("keyup", function(){
      var search = $("#buscaremitentes").val();

      if ($("#buscaremitentes").val() == "") {
        $("#ListaMensajeria").load('Procesos/ListaMensajes.php');
      } else {
        $.ajax({
          type: "post",
          url: "Procesos/buscaremitentes.php",
          data: {
            Filtro: search
          },
          success: function(respuesta){
            $("#ListaMensajeria").html(respuesta);
          }
        })
      }

    })
  });
</script>

<script type="text/javascript">
$(document).ready(function() {

    $(".ContenedorInfoUser").click(function() {
        var correo = $(this).data("correo");

        $.ajax({
            type: 'POST',
            url: 'Procesos/presentacionUser.php',
            data: { id: correo },
            success: function(datouser) {
                $("#ListaUsuarios").html(datouser);
            }
        });
      });

});
</script>
