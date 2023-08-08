<style type="text/css">
      .RegistroForm{
        display: grid;
        grid-template-columns: 40% 60%;
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
      }.Columna2 button{
        width: 80%;
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
</style>

<div class="RegistroForm" id="RegistroForm">

  <div class="Columna1">
    <img src="https://princesasdelhogar.com/wp-content/uploads/2021/11/Enfermera.png">
  </div>

  <div class="Columna2">
    <div class="VisualizacionFoto mb-2">
      <img src="https://i.pinimg.com/474x/3d/27/c1/3d27c1d91548b66bbe4d0610d9515615.jpg" id="previsualizacionEnfermero" src="#" alt="Vista previa">
    </div>

    <label for="fotoEnfermero" class="p-1 pe-3 ps-3 BotonFoto shadow rounded mb-3" style="cursor: pointer;">
      <ion-icon name="camera" style="font-size: 1.3rem;"></ion-icon>
    </label>
    <input type="file" id="fotoEnfermero" name="fotoEnfermero" accept=".jpg, .jpeg, .png" style="display: none;">

    <input type="e-mail" class="form-control mb-2" name="CorreoEnfermero" id="CorreoEnfermero" placeholder="Correo Electronico">
    <input type="text" class="form-control mb-2" name="NombreEnfermero" id="NombreEnfermero" placeholder="Nombre Completo">
    <input type="Number" class="form-control mb-2" name="TelefonoEnfermero" id="TelefonoEnfermero" placeholder="Numero Telefonico">
    
    <button type="button" class="BotonForm" id="enfermeroRegistrar">Registrar</button>
  </div>
</div><br>

<center><b class="Fuente-Mochiy b-Ancla" onclick="minimizaRegistro()">Cerrar</b></center>


<script type="text/javascript">
  // Obtener referencias a los elementos del formulario
  const inputImagenEnfermero = document.getElementById('fotoEnfermero');
  const imagenPrevisualizacionEnfermero = document.getElementById('previsualizacionEnfermero');

  // Escuchar el evento "change" del input de imagen
  inputImagenEnfermero.addEventListener('change', function () {
    const archivoEnfermero = inputImagenEnfermero.files[0]; // Obtener el archivo seleccionado

    if (archivoEnfermero) {
      const readerEnfermero = new FileReader(); // Crear un lector de archivos

      // Cuando se cargue la imagen, mostrarla en la previsualización
      readerEnfermero.onload = function () {
        imagenPrevisualizacionEnfermero.src = readerEnfermero.result;
      };

      // Leer el archivo como URL
      readerEnfermero.readAsDataURL(archivoEnfermero);
    }
  });
</script>