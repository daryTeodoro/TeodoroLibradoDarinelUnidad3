<!--FORMULARIO PARA ASIGNAR ENFERMERO A PACIENTE (FUNCION DEL DIRECTOR)-->
<style type="text/css">
    .formasen{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
</style>

<?php include('Procesos/conexion.php');
$conexion = new Conexion();
/*Consulta usuarios que sean pacientes y no tengan enfermeros asignados*/
$select1 = $conexion->prepare("SELECT * FROM usuarios WHERE rol = 3 AND id NOT IN (SELECT idpaciente FROM cuidadores WHERE idpaciente IS NOT NULL)");
$select1->execute();

$resultados1 = $select1->fetchAll(PDO::FETCH_ASSOC);

/*consulta a los enfermeros que tengan menos de 3 pacientes asignados*/
$select2 = $conexion->prepare("SELECT u.* FROM usuarios u WHERE u.rol = 2
    AND (
        SELECT COUNT(*)
        FROM cuidadores c
        WHERE c.idenfermero = u.id
    ) < 3");

$select2->execute();

$resultados2 = $select2->fetchAll(PDO::FETCH_ASSOC);
?>
<!--Formulario para asignar enfermeros a pacientes-->
<form class="formasen" method="post" action="">
    <?php
    //muestra los pacientes en un select
    echo '<select id="datosdepac" class="form-control mb-3">
    <option value="0" selected>Selecciona un Paciente</option>';
    foreach ($resultados1 as $linea1) {
        echo '<option value="' . $linea1['id'] . '">' . $linea1['nombre'] . '</option>';
    }
    echo '</select>';
    ?>

    <?php
    //muestra los enfermeros
    echo '<select id="datosdeenf" class="form-control mb-3">
    <option value="0" selected>Selecciona una Enfermero</option>';
    foreach ($resultados2 as $linea2) {
        echo '<option value="' . $linea2['id'] . '">' . $linea2['nombre'] . '</option>';
    }
    echo '</select>';
    ?>

    <div>
        <!--Boton para asignar-->
        <button class="BotonForm p-2 pe-4 ps-4" type="button" id="Asgn">Asignar</button>
    </div>
</form>


<script type="text/javascript">
$(document).ready(function() {
    /*Script para hacer el proceso de asignacion*/
    $("#Asgn").click(function() {
        var beneficiario = $('#datosdepac').val();
        var asignado = $('#datosdeenf').val();

        if ($("#datosdepac").val() == 0) {
          alert("Selecciona a un Paciente");
        } else if ($("#datosdeenf").val() == 0) {
          alert("Selecciona a un Enfermero");
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/asignarenfermero.php', // Archivo PHP para procesar los datos en el servidor
                data: {enfermero: asignado, paciente: beneficiario}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                        alert('se asigno un enfermero');
                        $("#contAsignEnf").load('asignarEnfermeroForm.php');
                        $('#datosdepac').val(0);
                        $('#datosdeenf').val(0);
                    } else if (response == 2) {
                        alert('ERROR');
                    }
                }
            });
        }
    });

});
</script>