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
    <!--Generales-->
    <link rel="stylesheet" type="text/css" href="Estilos/generales.css">
    <!-- JQuery Validate library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style type="text/css">
      .Presentacion{
        display: grid;
        grid-template-columns: 40% 60%;
        height: 100vh;
      }

      .Columna1{
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        background: rgba(0, 0, 0, .4) url(https://images.ctfassets.net/cnyu7awagftg/42EBnvO8x201UxYb0CAbvC/2b5ab69578c403781c5f8a31d7306eea/cuidados-adulto-mayor-1.jpg) no-repeat center;
        background-size: cover;
        background-blend-mode: darken;
      }

      .Columna2{
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;

        background: rgba(0, 0, 0, 1.0) url(https://img.freepik.com/fotos-premium/fondo-papel-blanco-arte_35956-2379.jpg) no-repeat;
        background-size: cover;
      }.Columna2 form{
        width: 80%;
      }

      .b-Ancla{
        cursor: pointer;
        color: #1e88ff;
      }.b-Ancla:hover{
        color: #ff315a;
      }
    </style>

  </head>
  <body>

    <div class="Presentacion">

      <div class="Columna1">
        <h1 class="Fuente-Mochiy"><b class="Color-Smart">Smart</b><b class="Color-Care">Care</b></h1>
        <h5 class="Fuente-Sofia bg-light p-4 pt-1 pb-1"><b>Innovando en el Cuidado de la Salud</b></h5>
      </div>

      <div class="Columna2 Fuente-Encode">
        <h1 class="Fuente-Tangerine">Iniciar Sesion</h1>
        <form method="post" action="" id="LoginForm">
          <input type="e-mail" class="form-control mb-2 shadow" id="Correo" placeholder="Introduce tu Correo o Numero Telefonico" autocomplete="off">
          <input type="password" class="form-control shadow" id="Contrasena" placeholder="Introduce tu Contraseña">

          <h6 class="mt-3">¿Olvidaste tu Contrasena? <b class="b-Ancla" onclick="recuperar()">Recuperar Contraseña</b></h6>

          <button type="submit" class="btn btn-info mt-3 shadow"><b>Iniciar Sesion</b></button>
        </form>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>

 <!--Ejecuciones-->
<script type="text/javascript">
$(document).ready(function() {
//LOGIN
  $('#LoginForm').submit(function(e) {
  e.preventDefault(); // Prevenir el envío del formulario por defecto

    var Correo = $('#Correo').val();
    var Contrasena = $('#Contrasena').val();


    if ($("#Correo").val() == "") {
      alert('El Usuario esta vacio');
      return false;
    } else if($("#Contrasena").val() == ""){
      alert('La contraseña esta vacia');
      return false; 
    } else {
    // Realizar la petición AJAX
      $.ajax({
        type: 'POST',
        url: 'Procesos/loguear.php', // Archivo PHP para procesar los datos en el servidor
        data: { Contrasena: Contrasena, Correo: Correo }, // Se envia el dato
        success: function(response) {
        // Manejar la respuesta del servidor aquí
          if (response == 1) {
            window.location.href = "inicioDirector.php";
          } else if (response == 2) {
            window.location.href = "inicioEnfermero.php";
          } else if (response == 3) {
            window.location.href = "inicioPaciente.php";
          } else if (response == 4) {
            alert("El correo/contraseña es incorrecto");
          } else {
            alert("Error en el Proceso, Intente nuevamente");
          }
        }
      });
    }
  });
});

function recuperar(){
  window.location.href = "recuperarContrasena.php";
}
</script>