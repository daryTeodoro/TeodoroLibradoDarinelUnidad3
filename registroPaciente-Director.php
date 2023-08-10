<style type="text/css">
      .RegistroFormPaciente{
        display: grid;
        grid-template-columns: 60% 40%;
        height: 100%;
        border-radius: 100px;
      }

      .Columna1{
        display: flex;
        align-items: center;
        justify-content: center;
      }.Columna1 img{
        width: 70%;
        height: 65vh;
      }

      .Columna2{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      .VisualizacionFoto img{
        border-radius: 60px;
        height: 120px;
        width: 120px;
        border: 1px solid #ff315a;
      }

      .form-control{
        width: 80%;
      }

      .pye{
        width: 80%;
        display: grid;
        grid-template-columns: 49% 2% 49%;
      }.pye input{
        width: 100%;
      }
</style>
<!--Fromulario para registro de pacientes-->
<div class="RegistroFormPaciente" id="RegistroForm">
<!--Columna con campos-->
  <div class="Columna2">

    <div class="VisualizacionFoto mb-2">
      <img src="https://i.pinimg.com/474x/3d/27/c1/3d27c1d91548b66bbe4d0610d9515615.jpg" id="previsualizacionPaciente" src="#" alt="Vista previa">
    </div>

    <label for="fotoPaciente" class="p-1 pe-3 ps-3 BotonFoto shadow rounded mb-3" style="cursor: pointer;">
      <ion-icon name="camera" style="font-size: 1.3rem;"></ion-icon>
    </label>
    <input type="file" id="fotoPaciente" name="fotoPaciente" accept=".jpg, .jpeg, .png" style="display: none;">

    <input type="number" class="form-control mb-2" name="TelefonoPaciente" id="TelefonoPaciente" placeholder="Numero Telefonico">
    <input type="text" class="form-control mb-2" name="NombrePaciente" id="NombrePaciente" placeholder="Nombre Completo">
    <div class="pye mb-2">
      <input type="number" class="form-control" name="PesoPaciente" id="PesoPaciente" placeholder="Peso">
      <div></div>
      <input type="number" class="form-control" name="EstaturaPaciente" id="EstaturaPaciente" placeholder="Estatura">
    </div>
    <div class="pye">
      <button type="button" class="BotonForm" data-bs-toggle="modal" data-bs-target="#ConfiguracionPaciente" style="width: 100%;">Configuracion</button>
      <div></div>
      <button type="button" class="BotonForm" style="width: 100%;" id="pacienteRegistrar">Registrar</button>
    </div>
  </div>
<!--Columna con imagen-->
  <div class="Columna1">
    <img src="https://tomatisecuador.com/wp-content/uploads/2021/06/34-1247x1536.png">
  </div>
</div><br>
<!--Boton para Cerrar la seccion de registro-->
<center><b class="Fuente-Mochiy b-Ancla" onclick="minimizaRegistro()">Cerrar</b></center>

    <!-- Modal -->
    <div class="modal fade" id="ConfiguracionPaciente" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header text-white" data-bs-theme="dark">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Configuracion</h1>
            <ion-icon name="close" data-bs-dismiss="modal" style="cursor: pointer; font-size: 2rem;"></ion-icon>
          </div>
          <div class="modal-body" align="center" id="modal-body">
            <!--Select para pregunta 1-->
            <select class="form-select border border-dark border-2 mb-2" name="Pregunta1Paciente" id="Pregunta1Paciente">
              <option value="0" selected>Seleccione una Pregunta</option>
              <option value="¿Cual es tu comida favorita?">¿Cual es tu comida favorita?</option>
              <option value="¿Cual es tu fecha de nacimiento?">¿Cual es tu fecha de nacimiento?</option>
              <option value="¿Cuál es tu lugar de nacimiento?">¿Cuál es tu lugar de nacimiento?</option>
              <option value="¿Cuál es el nombre de tu mascota?">¿Cuál es el nombre de tu mascota?</option>
              <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
              <option value="¿Cuál es el nombre de tu mejor amigo/a de la infancia?">¿Cuál es el nombre de tu mejor amigo/a de la infancia?</option>
              <option value="¿Cuál es tu película favorita?">¿Cuál es tu película favorita?</option>
              <option value="¿Cuál es el nombre de tu primer colegio?">¿Cuál es el nombre de tu primer colegio?</option>
              <option value="¿Cuál es el segundo nombre de tu madre?">¿Cuál es el segundo nombre de tu madre?</option>
              <option value="¿Cuál es el nombre de tu abuelo/a?">¿Cuál es el nombre de tu abuelo/a?</option>
              <option value="¿Cuál es el modelo de tu primer coche?">¿Cuál es el modelo de tu primer coche?</option>
              <option value="¿Cuál es tu canción favorita?">¿Cuál es tu canción favorita?</option>
            </select>
            <!--Input para respuesta de la pregunta 1-->
            <input type="text" class="form-control mb-5" name="Respuesta1" id="Respuesta1" placeholder="Respuesta" style="width: 100%;">
            <!--Select para pregunta 2-->
            <select class="form-select border border-dark border-2 mb-2" name="Pregunta2Paciente" id="Pregunta2Paciente">
              <option value="0" selected>Seleccione una Pregunta</option>
              <option value="¿Cual es tu comida favorita?">¿Cual es tu comida favorita?</option>
              <option value="¿Cual es tu fecha de nacimiento?">¿Cual es tu fecha de nacimiento?</option>
              <option value="¿Cuál es tu lugar de nacimiento?">¿Cuál es tu lugar de nacimiento?</option>
              <option value="¿Cuál es el nombre de tu mascota?">¿Cuál es el nombre de tu mascota?</option>
              <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
              <option value="¿Cuál es el nombre de tu mejor amigo/a de la infancia?">¿Cuál es el nombre de tu mejor amigo/a de la infancia?</option>
              <option value="¿Cuál es tu película favorita?">¿Cuál es tu película favorita?</option>
              <option value="¿Cuál es el nombre de tu primer colegio?">¿Cuál es el nombre de tu primer colegio?</option>
              <option value="¿Cuál es el segundo nombre de tu madre?">¿Cuál es el segundo nombre de tu madre?</option>
              <option value="¿Cuál es el nombre de tu abuelo/a?">¿Cuál es el nombre de tu abuelo/a?</option>
              <option value="¿Cuál es el modelo de tu primer coche?">¿Cuál es el modelo de tu primer coche?</option>
              <option value="¿Cuál es tu canción favorita?">¿Cuál es tu canción favorita?</option>
            </select>
            <!--Input para respuesta de la pregunta 2-->
            <input type="text" class="form-control" name="Respuesta2" id="Respuesta2" placeholder="Respuesta" style="width: 100%;">
          </div>
        </div>
      </div>
    </div>


<script type="text/javascript">
  // Obtener referencias a los elementos del formulario
  const inputImagenPaciente = document.getElementById('fotoPaciente');
  const imagenPrevisualizacionPaciente = document.getElementById('previsualizacionPaciente');

  // Escuchar el evento "change" del input de imagen
  inputImagenPaciente.addEventListener('change', function () {
    const archivoPaciente = inputImagenPaciente.files[0]; // Obtener el archivo seleccionado

    if (archivoPaciente) {
      const readerPaciente = new FileReader(); // Crear un lector de archivos

      // Cuando se cargue la imagen, mostrarla en la previsualización
      readerPaciente.onload = function () {
        imagenPrevisualizacionPaciente.src = readerPaciente.result;
      };

      // Leer el archivo como URL
      readerPaciente.readAsDataURL(archivoPaciente);
    }
  });  
</script>