<style type="text/css">
    /*estilos*/
    .modal-cuarto{
        background: rgba(0, 0, 0, 1) url(https://c5e6g5f8.rocketcdn.me/wp-content/uploads/2020/03/decoraci%C3%B3n-de-cuartos-pastel.jpg) no-repeat;
        background-size: cover;
    }
</style>
<?php
include('Procesos/conexion.php');
include('Procesos/funciones.php');
/*selecciona la informacion de las habitaciones*/
$conexion = new Conexion();
$select = $conexion->prepare("SELECT * FROM usuarios WHERE rol = 3 AND id NOT IN (SELECT idpaciente FROM habitaciones WHERE idpaciente IS NOT NULL)");
$select->execute();
$resultados = $select->fetchAll(PDO::FETCH_ASSOC);

/*DATOS DE LA HABITACION*/
$habitantece1 = habitaciones('CE-1');

if ($habitantece1['idpaciente'] == 'vacio') {
	$statusce1 = 'cuarto-desocupado';

	$valorce1 = "
	<h1 class='Fuente-Mochiy mb-3'>El Cuarto esta Desocupado</h1>
	<select name='selectce1' id='selectce1' class='form-control mb-3'>
        <option value='0' selected>Seleccione un Paciente</option>";
            foreach ($resultados as $lineace1) {
                $valorce1 .= "<option value='". $lineace1['id'] . "'>". $lineace1['nombre'] . "</option>";
            }
    $valorce1 .= "</select>
    <button type='button' class='BotonForm p-2 pe-4 ps-4 mb-3' id='botonce1'>Guardar</button>";

} else if ($habitantece1['idpaciente'] != 'vacio') {
	$datoshabitantece1 = identificar($habitantece1['idpaciente']);
	$statusce1 = "cuarto-ocupado";
	$valorce1 = '
	<img src="Procesos/'.$datoshabitantece1['imagen'].'" class="mb-4" style="width: 14rem; height: 14rem;">
	<h1 class="Fuente-Mochiy mb-4">'.$datoshabitantece1['nombre'].'</h1>
    <button type="button" class="BotonForm p-2 pe-4 ps-4 mb-3" id="freece1">Liberar</button>
	';
}

/*DATOS DE LA HABITACION*/
$habitantece2 = habitaciones('CE-2');

if ($habitantece2['idpaciente'] == 'vacio') {
	$statusce2 = 'cuarto-desocupado';

	$valorce2 = "
	<h1 class='Fuente-Mochiy mb-3'>El Cuarto esta Desocupado</h1>
	<select name='selectce2' id='selectce2' class='form-control mb-3'>
        <option value='0' selected>Seleccione un Paciente</option>";
            foreach ($resultados as $lineace2) {
                $valorce2 .= "<option value='". $lineace2['id'] . "'>". $lineace2['nombre'] . "</option>";
            }
    $valorce2 .= "</select>
    <button type='button' class='BotonForm p-2 pe-4 ps-4 mb-3' id='botonce2'>Guardar</button>";

} else if ($habitantece2['idpaciente'] != 'vacio') {
	$datoshabitantece2 = identificar($habitantece2['idpaciente']);
	$statusce2 = "cuarto-ocupado";
	$valorce2 = '
	<img src="Procesos/'.$datoshabitantece2['imagen'].'" class="mb-4" style="width: 14rem; height: 14rem;">
	<h1 class="Fuente-Mochiy mb-4">'.$datoshabitantece2['nombre'].'</h1>
    <button type="button" class="BotonForm p-2 pe-4 ps-4 mb-3" id="freece2">Liberar</button>
	';
}

/*DATOS DE LA HABITACION*/
$habitanteci1 = habitaciones('CI-1');

if ($habitanteci1['idpaciente'] == 'vacio') {
	$statusci1 = 'cuarto-desocupado';

	$valorci1 = "
	<h1 class='Fuente-Mochiy mb-3'>El Cuarto esta Desocupado</h1>
	<select name='selectci1' id='selectci1' class='form-control mb-3'>
        <option value='0' selected>Seleccione un Paciente</option>";
            foreach ($resultados as $lineaci1) {
                $valorci1 .= "<option value='". $lineaci1['id'] . "'>". $lineaci1['nombre'] . "</option>";
            }
    $valorci1 .= "</select>
    <button type='button' class='BotonForm p-2 pe-4 ps-4 mb-3' id='botonci1'>Guardar</button>";

} else if ($habitanteci1['idpaciente'] != 'vacio') {
	$datoshabitanteci1 = identificar($habitanteci1['idpaciente']);
	$statusci1 = "cuarto-ocupado";
	$valorci1 = '
	<img src="Procesos/'.$datoshabitanteci1['imagen'].'" class="mb-4" style="width: 14rem; height: 14rem;">
	<h1 class="Fuente-Mochiy mb-4">'.$datoshabitanteci1['nombre'].'</h1>
    <button type="button" class="BotonForm p-2 pe-4 ps-4 mb-3" id="freeci1">Liberar</button>
	';
}

/*DATOS DE LA HABITACION*/
$habitanteci2 = habitaciones('CI-2');

if ($habitanteci2['idpaciente'] == 'vacio') {
	$statusci2 = 'cuarto-desocupado';

	$valorci2 = "
	<h1 class='Fuente-Mochiy mb-3'>El Cuarto esta Desocupado</h1>
	<select name='selectci2' id='selectci2' class='form-control mb-3'>
        <option value='0' selected>Seleccione un Paciente</option>";
            foreach ($resultados as $lineaci2) {
                $valorci2 .= "<option value='". $lineaci2['id'] . "'>". $lineaci2['nombre'] . "</option>";
            }
    $valorci2 .= "</select>
    <button type='button' class='BotonForm p-2 pe-4 ps-4 mb-3' id='botonci2'>Guardar</button>";

} else if ($habitanteci2['idpaciente'] != 'vacio') {
	$datoshabitanteci2 = identificar($habitanteci2['idpaciente']);
	$statusci2 = "cuarto-ocupado";
	$valorci2 = '
	<img src="Procesos/'.$datoshabitanteci2['imagen'].'" class="mb-4" style="width: 14rem; height: 14rem;">
	<h1 class="Fuente-Mochiy mb-4">'.$datoshabitanteci2['nombre'].'</h1>
    <button type="button" class="BotonForm p-2 pe-4 ps-4 mb-3" id="freeci2">Liberar</button>
	';
}

/*DATOS DE LA HABITACION*/
$habitanteci3 = habitaciones('CI-3');

if ($habitanteci3['idpaciente'] == 'vacio') {
	$statusci3 = 'cuarto-desocupado';
	
	$valorci3 = "
	<h1 class='Fuente-Mochiy mb-3'>El Cuarto esta Desocupado</h1>
	<select name='selectci3' id='selectci3' class='form-control mb-3'>
        <option value='0' selected>Seleccione un Paciente</option>";
            foreach ($resultados as $lineaci3) {
                $valorci3 .= "<option value='". $lineaci3['id'] . "'>". $lineaci3['nombre'] . "</option>";
            }
    $valorci3 .= "</select>
    <button type='button' class='BotonForm p-2 pe-4 ps-4 mb-3' id='botonci3'>Guardar</button>";

} else if ($habitanteci3['idpaciente'] != 'vacio') {
	$datoshabitanteci3 = identificar($habitanteci3['idpaciente']);
	$statusci3 = "cuarto-ocupado";
	$valorci3 = '
	<img src="Procesos/'.$datoshabitanteci3['imagen'].'" class="mb-4" style="width: 14rem; height: 14rem;">
	<h1 class="Fuente-Mochiy mb-4">'.$datoshabitanteci3['nombre'].'</h1>
    <button type="button" class="BotonForm p-2 pe-4 ps-4 mb-3" id="freeci3">Liberar</button>
	';
}

/*DATOS DE LA HABITACION*/
$habitanteci4 = habitaciones('CI-4');

if ($habitanteci4['idpaciente'] == 'vacio') {
	$statusci4 = 'cuarto-desocupado';
	
	$valorci4 = "
	<h1 class='Fuente-Mochiy mb-3'>El Cuarto esta Desocupado</h1>
	<select name='selectci4' id='selectci4' class='form-control mb-3'>
        <option value='0' selected>Seleccione un Paciente</option>";
            foreach ($resultados as $lineaci4) {
                $valorci4 .= "<option value='". $lineaci4['id'] . "'>". $lineaci4['nombre'] . "</option>";
            }
    $valorci4 .= "</select>
    <button type='button' class='BotonForm p-2 pe-4 ps-4 mb-3' id='botonci4'>Guardar</button>";

} else if ($habitanteci4['idpaciente'] != 'vacio') {
	$datoshabitanteci4 = identificar($habitanteci4['idpaciente']);
	$statusci4 = "cuarto-ocupado";
	$valorci4 = '
	<img src="Procesos/'.$datoshabitanteci4['imagen'].'" class="mb-4" style="width: 14rem; height: 14rem;">
	<h1 class="Fuente-Mochiy mb-4">'.$datoshabitanteci4['nombre'].'</h1>
    <button type="button" class="BotonForm p-2 pe-4 ps-4 mb-3" id="freeci4">Liberar</button>
	';
}

/*DATOS DE LA HABITACION*/
$habitanteci5 = habitaciones('CI-5');

if ($habitanteci5['idpaciente'] == 'vacio') {
	$statusci5 = 'cuarto-desocupado';
	
	$valorci5 = "
	<h1 class='Fuente-Mochiy mb-3'>El Cuarto esta Desocupado</h1>
	<select name='selectci5' id='selectci5' class='form-control mb-3'>
        <option value='0' selected>Seleccione un Paciente</option>";
            foreach ($resultados as $lineaci5) {
                $valorci5 .= "<option value='". $lineaci5['id'] . "'>". $lineaci5['nombre'] . "</option>";
            }
    $valorci5 .= "</select>
    <button type='button' class='BotonForm p-2 pe-4 ps-4 mb-3' id='botonci5'>Guardar</button>";

} else if ($habitanteci5['idpaciente'] != 'vacio') {
	$datoshabitanteci5 = identificar($habitanteci5['idpaciente']);
	$statusci5 = "cuarto-ocupado";
	$valorci5 = '
	<img src="Procesos/'.$datoshabitanteci5['imagen'].'" class="mb-4" style="width: 14rem; height: 14rem;">
	<h1 class="Fuente-Mochiy mb-4">'.$datoshabitanteci5['nombre'].'</h1>
    <button type="button" class="BotonForm p-2 pe-4 ps-4 mb-3" id="freeci5">Liberar</button>
	';
}

/*DATOS DE LA HABITACION*/
$habitanteci6 = habitaciones('CI-6');

if ($habitanteci6['idpaciente'] == 'vacio') {
	$statusci6 = 'cuarto-desocupado';

	$valorci6 = "
	<h1 class='Fuente-Mochiy mb-3'>El Cuarto esta Desocupado</h1>
	<select name='selectci6' id='selectci6' class='form-control mb-3'>
        <option value='0' selected>Seleccione un Paciente</option>";
            foreach ($resultados as $lineaci6) {
                $valorci6 .= "<option value='". $lineaci6['id'] . "'>". $lineaci6['nombre'] . "</option>";
            }
    $valorci6 .= "</select>
    <button type='button' class='BotonForm p-2 pe-4 ps-4 mb-3' id='botonci6'>Guardar</button>";

} else if ($habitanteci6['idpaciente'] != 'vacio') {
	$datoshabitanteci6 = identificar($habitanteci6['idpaciente']);
	$statusci6 = "cuarto-ocupado";
	$valorci6 = '
	<img src="Procesos/'.$datoshabitanteci6['imagen'].'" class="mb-4" style="width: 14rem; height: 14rem;">
	<h1 class="Fuente-Mochiy mb-4">'.$datoshabitanteci6['nombre'].'</h1>
    <button type="button" class="BotonForm p-2 pe-4 ps-4 mb-3" id="freeci6">Liberar</button>
	';
}

/*Mapea los cuartos y habitaciones*/
echo"
<div class='jardin border border-dark border-4 border-bottom-0 border-end-0'>1</div>
<div class='jardin border border-dark border-4 border-bottom-0 border-start-0'>2</div>


<div class='".$statusce1." border border-dark border-4 border-bottom-0 border-start-0 border-end-0' data-bs-toggle='modal' data-bs-target='#CE-1'><h2 class='Fuente-Mochiy'>CE-1</h2></div>

    <div class='modal fade' id='CE-1' data-bs-backdrop='static' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='padding: 0; --bs-modal-width: 100%;'>
      <div class='modal-dialog modal-dialog-centered bg-success' style='height: 100vh; margin: 0;'>
            <div class='modal-content'>
                <div class='modal-body modal-cuarto' align='center' style='
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;'>
                    ".$valorce1."
                    <b class='Fuente-Mochiy b-Ancla' data-bs-dismiss='modal'>Cerrar</b>
                </div>
             </div>
      </div>
    </div>


<div class='cocina border border-dark border-4 border-bottom-0 border-end-0'>4</div>
<div class='cocina border border-dark border-4 border-bottom-0 border-start-0'>5</div>







<div class='".$statusci1." border border-dark border-4 border-end-0' data-bs-toggle='modal' data-bs-target='#CI-1'><h2 class='Fuente-Mochiy'>CI-1</h2></div>

    <div class='modal fade' id='CI-1' data-bs-backdrop='static' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='padding: 0; --bs-modal-width: 100%;'>
      <div class='modal-dialog modal-dialog-centered bg-success' style='height: 100vh; margin: 0;'>
            <div class='modal-content'>
                <div class='modal-body modal-cuarto' align='center' style='
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;'>
                    ".$valorci1."
                    <b class='Fuente-Mochiy b-Ancla' data-bs-dismiss='modal'>Cerrar</b>
                </div>
             </div>
      </div>
    </div>

<div class='piso border border-dark border-4 border-bottom-0 border-end-0'></div>
<div class='piso border border-dark border-4 border-bottom-0 border-start-0 border-end-0'>3</div>
<div class='piso border border-dark border-4 border-bottom-0 border-start-0'>4</div>

<div class='".$statusci4." border border-dark border-4 border-start-0' data-bs-toggle='modal' data-bs-target='#CI-4'><h2 class='Fuente-Mochiy'>CI-4</h2></div>

    <div class='modal fade' id='CI-4' data-bs-backdrop='static' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='padding: 0; --bs-modal-width: 100%;'>
      <div class='modal-dialog modal-dialog-centered bg-success' style='height: 100vh; margin: 0;'>
            <div class='modal-content'>
                <div class='modal-body modal-cuarto' align='center' style='
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;'>
                    ".$valorci4."
                    <b class='Fuente-Mochiy b-Ancla' data-bs-dismiss='modal'>Cerrar</b>
                </div>
             </div>
      </div>
    </div>







<div class='".$statusci2." border border-dark border-4 border-end-0' data-bs-toggle='modal' data-bs-target='#CI-2'><h2 class='Fuente-Mochiy'>CI-2</h2></div>

    <div class='modal fade' id='CI-2' data-bs-backdrop='static' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='padding: 0; --bs-modal-width: 100%;'>
      <div class='modal-dialog modal-dialog-centered bg-success' style='height: 100vh; margin: 0;'>
            <div class='modal-content'>
                <div class='modal-body modal-cuarto' align='center' style='
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;'>
                    ".$valorci2."
                    <b class='Fuente-Mochiy b-Ancla' data-bs-dismiss='modal'>Cerrar</b>
                </div>
             </div>
      </div>
    </div>

<div class='piso border border-dark border-4 border-bottom-0 border-top-0 border-end-0'>2</div>
<div class='escalera border border-dark border-4 border-top-0'>3</div>
<div class='piso border border-dark border-4 border-bottom-0 border-top-0 border-start-0'>4</div>

<div class='".$statusci5." border border-dark border-4 border-start-0' data-bs-toggle='modal' data-bs-target='#CI-5'><h2 class='Fuente-Mochiy'>CI-5</h2></div>

    <div class='modal fade' id='CI-5' data-bs-backdrop='static' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='padding: 0; --bs-modal-width: 100%;'>
      <div class='modal-dialog modal-dialog-centered bg-success' style='height: 100vh; margin: 0;'>
            <div class='modal-content'>
                <div class='modal-body modal-cuarto' align='center' style='
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;'>
                    ".$valorci5."
                    <b class='Fuente-Mochiy b-Ancla' data-bs-dismiss='modal'>Cerrar</b>
                </div>
             </div>
      </div>
    </div>







<div class='".$statusci3." border border-dark border-4 border-end-0' data-bs-toggle='modal' data-bs-target='#CI-3'><h2 class='Fuente-Mochiy'>CI-3</h2></div>

    <div class='modal fade' id='CI-3' data-bs-backdrop='static' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='padding: 0; --bs-modal-width: 100%;'>
      <div class='modal-dialog modal-dialog-centered bg-success' style='height: 100vh; margin: 0;'>
            <div class='modal-content'>
                <div class='modal-body modal-cuarto' align='center' style='
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;'>
                    ".$valorci3."
                    <b class='Fuente-Mochiy b-Ancla' data-bs-dismiss='modal'>Cerrar</b>
                </div>
             </div>
      </div>
    </div>

<div class='piso border border-dark border-4 border-top-0 border-end-0'>2</div>
<div class='piso border border-dark border-4 border-top-0 border-start-0 border-end-0'>3</div>
<div class='piso border border-dark border-4 border-top-0 border-start-0'>4</div>

<div class='".$statusci6." border border-dark border-4 border-start-0' data-bs-toggle='modal' data-bs-target='#CI-6'><h2 class='Fuente-Mochiy'>CI-6</h2></div>

    <div class='modal fade' id='CI-6' data-bs-backdrop='static' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='padding: 0; --bs-modal-width: 100%;'>
      <div class='modal-dialog modal-dialog-centered bg-success' style='height: 100vh; margin: 0;'>
            <div class='modal-content'>
                <div class='modal-body modal-cuarto' align='center' style='
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;'>
                    ".$valorci6."
                    <b class='Fuente-Mochiy b-Ancla' data-bs-dismiss='modal'>Cerrar</b>
                </div>
             </div>
      </div>
    </div>







<div class='recreacion border border-dark border-4 border-top-0 border-end-0'>1</div>
<div class='recreacion border border-dark border-4 border-top-0 border-start-0'>2</div>


<div class='".$statusce2." border border-dark border-4 border-top-0 border-start-0 border-end-0' data-bs-toggle='modal' data-bs-target='#CE-2'><h2 class='Fuente-Mochiy'>CE-2</h2></div>
    
    <div class='modal fade' id='CE-2' data-bs-backdrop='static' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='padding: 0; --bs-modal-width: 100%;'>
      <div class='modal-dialog modal-dialog-centered bg-success' style='height: 100vh; margin: 0;'>
            <div class='modal-content'>
                <div class='modal-body modal-cuarto' align='center' style='
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;'>
                    ".$valorce2."
                    <b class='Fuente-Mochiy b-Ancla' data-bs-dismiss='modal'>Cerrar</b>
                </div>
             </div>
      </div>
    </div>


<div class='pisomadera border border-dark border-4 border-top-0 border-end-0'>4</div>
<div class='pisomadera border border-dark border-4 border-top-0 border-start-0'>5</div>
";

?>

<script type="text/javascript">
/*Scripts para Asignar y vaciar habitaciones*/
$(document).ready(function() {

    $("#botonce1").click(function() {
      	var pacientece1 = $('#selectce1').val();
      	var habitacionce1 = 'CE-1';

        if ($("#selectce1").val() == 0) {
          alert("Selecciona a un Paciente");
        } else {
            $.ajax({
          	    type: 'POST',
                url: 'Procesos/asignarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
                data: { habitacion: habitacionce1, paciente: pacientece1}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno la habitacion');
                        $("#contAsignHab").load('habitaciones.php');
                        $('#selectce1').val(0);
                    } else if (response == 2) {
                    	alert('error');
                    }
                }
            });
        }
    });


    $("#botonce2").click(function() {
        var pacientece2 = $('#selectce2').val();
        var habitacionce2 = 'CE-2';

        if ($("#selectce2").val() == 0) {
          alert("Selecciona a un Paciente");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/asignarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
                data: { habitacion: habitacionce2, paciente: pacientece2}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno la habitacion');
                        $("#contAsignHab").load('habitaciones.php');
                        $('#selectce2').val(0);
                    } else if (response == 2) {
                        alert('error');
                    }
                }
            });
        }
    });


    $("#botonci1").click(function() {
        var pacienteci1 = $('#selectci1').val();
        var habitacionci1 = 'CI-1';

        if ($("#selectci1").val() == 0) {
          alert("Selecciona a un Paciente");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/asignarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
                data: { habitacion: habitacionci1, paciente: pacienteci1}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno la habitacion');
                        $("#contAsignHab").load('habitaciones.php');
                        $('#selectci1').val(0);
                    } else if (response == 2) {
                        alert('error');
                    }
                }
            });
        }
    });


    $("#botonci2").click(function() {
        var pacienteci2 = $('#selectci2').val();
        var habitacionci2 = 'CI-2';

        if ($("#selectci2").val() == 0) {
          alert("Selecciona a un Paciente");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/asignarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
                data: { habitacion: habitacionci2, paciente: pacienteci2}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno la habitacion');
                        $("#contAsignHab").load('habitaciones.php');
                        $('#selectci2').val(0);
                    } else if (response == 2) {
                        alert('error');
                    }
                }
            });
        }
    });


    $("#botonci3").click(function() {
        var pacienteci3 = $('#selectci3').val();
        var habitacionci3 = 'CI-3';

        if ($("#selectci3").val() == 0) {
          alert("Selecciona a un Paciente");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/asignarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
                data: { habitacion: habitacionci3, paciente: pacienteci3}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno la habitacion');
                        $("#contAsignHab").load('habitaciones.php');
                        $('#selectci3').val(0);
                    } else if (response == 2) {
                        alert('error');
                    }
                }
            });
        }
    });


    $("#botonci4").click(function() {
        var pacienteci4 = $('#selectci4').val();
        var habitacionci4 = 'CI-4';

        if ($("#selectci4").val() == 0) {
          alert("Selecciona a un Paciente");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/asignarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
                data: { habitacion: habitacionci4, paciente: pacienteci4}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno la habitacion');
                        $("#contAsignHab").load('habitaciones.php');
                        $('#selectci4').val(0);
                    } else if (response == 2) {
                        alert('error');
                    }
                }
            });
        }
    });


    $("#botonci5").click(function() {
        var pacienteci5 = $('#selectci5').val();
        var habitacionci5 = 'CI-5';

        if ($("#selectci5").val() == 0) {
          alert("Selecciona a un Paciente");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/asignarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
                data: { habitacion: habitacionci5, paciente: pacienteci5}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno la habitacion');
                        $("#contAsignHab").load('habitaciones.php');
                        $('#selectci5').val(0);
                    } else if (response == 2) {
                        alert('error');
                    }
                }
            });
        }
    });


    $("#botonci6").click(function() {
        var pacienteci6 = $('#selectci6').val();
        var habitacionci6 = 'CI-6';

        if ($("#selectci6").val() == 0) {
          alert("Selecciona a un Paciente");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/asignarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
                data: { habitacion: habitacionci6, paciente: pacienteci6}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno la habitacion');
                        $("#contAsignHab").load('habitaciones.php');
                        $('#selectci6').val(0);
                    } else if (response == 2) {
                        alert('error');
                    }
                }
            });
        }
    });



    $("#freece1").click(function() {
        var habfreece1 = 'CE-1';
        $.ajax({
            type: 'POST',
            url: 'Procesos/vaciarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
            data: { habitacion: habfreece1}, // Se envia el dato
            success: function(response) {
            // Manejar la respuesta del servidor aquí
                if (response == 1) {
                    alert('La habitacion esta libre');
                    $("#contAsignHab").load('habitaciones.php');
                } else if (response == 2) {
                    alert('error');
                }
            }
        });
    });

    $("#freece2").click(function() {
        var habfreece2 = 'CE-2';
        $.ajax({
            type: 'POST',
            url: 'Procesos/vaciarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
            data: { habitacion: habfreece2}, // Se envia el dato
            success: function(response) {
            // Manejar la respuesta del servidor aquí
                if (response == 1) {
                    alert('La habitacion esta libre');
                    $("#contAsignHab").load('habitaciones.php');
                } else if (response == 2) {
                    alert('error');
                }
            }
        });
    });

    $("#freeci1").click(function() {
        var habfreeci1 = 'CI-1';
        $.ajax({
            type: 'POST',
            url: 'Procesos/vaciarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
            data: { habitacion: habfreeci1}, // Se envia el dato
            success: function(response) {
            // Manejar la respuesta del servidor aquí
                if (response == 1) {
                    alert('La habitacion esta libre');
                    $("#contAsignHab").load('habitaciones.php');
                } else if (response == 2) {
                    alert('error');
                }
            }
        });
    });

    $("#freeci2").click(function() {
        var habfreeci2 = 'CI-2';
        $.ajax({
            type: 'POST',
            url: 'Procesos/vaciarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
            data: { habitacion: habfreeci2}, // Se envia el dato
            success: function(response) {
            // Manejar la respuesta del servidor aquí
                if (response == 1) {
                    alert('La habitacion esta libre');
                    $("#contAsignHab").load('habitaciones.php');
                } else if (response == 2) {
                    alert('error');
                }
            }
        });
    });

    $("#freeci3").click(function() {
        var habfreeci3 = 'CI-3';
        $.ajax({
            type: 'POST',
            url: 'Procesos/vaciarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
            data: { habitacion: habfreeci3}, // Se envia el dato
            success: function(response) {
            // Manejar la respuesta del servidor aquí
                if (response == 1) {
                    alert('La habitacion esta libre');
                    $("#contAsignHab").load('habitaciones.php');
                } else if (response == 2) {
                    alert('error');
                }
            }
        });
    });

    $("#freeci4").click(function() {
        var habfreeci4 = 'CI-4';
        $.ajax({
            type: 'POST',
            url: 'Procesos/vaciarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
            data: { habitacion: habfreeci4}, // Se envia el dato
            success: function(response) {
            // Manejar la respuesta del servidor aquí
                if (response == 1) {
                    alert('La habitacion esta libre');
                    $("#contAsignHab").load('habitaciones.php');
                } else if (response == 2) {
                    alert('error');
                }
            }
        });
    });

    $("#freeci5").click(function() {
        var habfreeci5 = 'CI-5';
        $.ajax({
            type: 'POST',
            url: 'Procesos/vaciarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
            data: { habitacion: habfreeci5}, // Se envia el dato
            success: function(response) {
            // Manejar la respuesta del servidor aquí
                if (response == 1) {
                    alert('La habitacion esta libre');
                    $("#contAsignHab").load('habitaciones.php');
                } else if (response == 2) {
                    alert('error');
                }
            }
        });
    });

    $("#freeci6").click(function() {
        var habfreeci6 = 'CI-6';
        $.ajax({
            type: 'POST',
            url: 'Procesos/vaciarhabitacion.php', // Archivo PHP para procesar los datos en el servidor
            data: { habitacion: habfreeci6}, // Se envia el dato
            success: function(response) {
            // Manejar la respuesta del servidor aquí
                if (response == 1) {
                    alert('La habitacion esta libre');
                    $("#contAsignHab").load('habitaciones.php');
                } else if (response == 2) {
                    alert('error');
                }
            }
        });
    });
});
</script>