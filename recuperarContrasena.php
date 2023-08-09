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
      body {
        background: #000000;
      }

      .FormCorreo{
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        animation: entrada 0.2s linear forwards;
      }
      .FormNumber{
        height: 100vh;
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        animation: entrada 0.2s linear forwards;
      }

      .form-control{
        width: 70%;
      }

      p{
        width: 70%;
        font-size: 1.1rem;
      }p b{
        text-decoration: underline;
        cursor: pointer;
        color: #afdefc;
      }p b:hover{
        color: #e6b80a;
      }

      .botonCancel{
        background: #67b1f9;
        border-radius: 10px;
        border: none;
      }

      #Preguntas{
        display: none;
        height: 100vh;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      #CambiarPsw{
        display: none;
        height: 100vh;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }
    </style>

  </head>
  <body>

    <div class="FormCorreo" id="FormCorreo">
      <input type="text" class="form-control" name="Correo" id="Correo" placeholder="Introduce tu Correo">
      <div>
        <button class="BotonForm mt-3 mb-4 p-2 pe-4 ps-4" id="EnviarCorreo">Continuar</button>
        <button class="botonCancel mt-3 mb-4 p-2 pe-4 ps-4" onclick="cancelar()">Cancelar</button>
      </div>
      <p class="Fuente-Monomaniac cambiar" align="justify"><b onclick="formnumber()">Recuperar Cuenta Paciente</b></p>
    </div>

    <div class="FormNumber" id="FormNumber">
      <input type="text" class="form-control" name="Number" id="Number" placeholder="Introduce tu Telefono">
      <div>
        <button class="BotonForm mt-3 mb-4 p-2 pe-4 ps-4" id="EnviarNumber">Continuar</button>
        <button class="botonCancel mt-3 mb-4 p-2 pe-4 ps-4" onclick="cancelar()">Cancelar</button>
      </div>
      <p class="Fuente-Monomaniac cambiar" align="justify"><b onclick="formcorreo()">Recuperar Cuenta Enfermero</b></p>
    </div>

    <div id="Preguntas">
      <!--Aqui van las preguntas-->
    </div>

    <div id="CambiarPsw">
      <!--Aqui van las preguntas-->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>

<script type="text/javascript">
let contenedorFormCorreo = document.getElementById("FormCorreo");
let contenedorFormNumber = document.getElementById("FormNumber");
let preguntas = document.getElementById("Preguntas");

function formcorreo(){
  contenedorFormCorreo.style.display = 'flex';
  contenedorFormNumber.style.display = 'none';
}

function formnumber(){
  contenedorFormCorreo.style.display = 'none';
  contenedorFormNumber.style.display = 'flex';
}


$(document).ready(function() {

    $("#EnviarNumber").click(function() {
        var number = $('#Number').val();

        if ($("#Number").val() == '') {
          alert("Ingrese su Telefono");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/rectificar-RC.php',
                data: {user: number}, // Se envia el dato
                success: function(response) {
                    if (response == 2) {
                        alert('El user no existe');
                    } else {
                        contenedorFormNumber.style.display = 'none';
                        preguntas.style.display = 'flex';
                        $('#Number').val('');
                        $('#Preguntas').html(response);
                    }
                }
            });
        }
    });

});

function cancelar(){
  window.location.href = "index.php";
}
</script>