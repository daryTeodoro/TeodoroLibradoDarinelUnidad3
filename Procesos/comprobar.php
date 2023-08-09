<?php
$classForm = '
	height: 100%;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	text-align: center;
';

$scriptjs = "
<script type='text/javascript'>
$(document).ready(function() {

    $('#finished').click(function() {
        var property = $('#userproperty').val();
        var newpsw = $('#newpsw').val();
        var renewpsw = $('#renewpsw').val();

        if ($('#newpsw').val() == '') {
          alert('Ingrese una Nueva Contraseña');
        } else if ($('#renewpsw').val() == '') {
          alert('Confirme la Contraseña');
        } else if ($('#newpsw').val() != $('#renewpsw').val()) {
          alert('Las Contraseñas debe de Coincidir');
        } else {
            $.ajax({
                type: 'POST',
                url: 'Procesos/lastRecuperarPsw.php', // Archivo PHP para procesar los datos en el servidor
                data: {user: property, new: newpsw}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 2) {
                        alert('Error');
                    } else if (response == 1) {
                        $('#newpsw').val('');
                        $('#renewpsw').val('');
                        window.location.href = 'index.php';
                    }
                }
            });
        }
    });

});
</script>
";
?>

<?php
include('conexion.php');
include('funciones.php');

$id1 = $_POST['p1'];
$respuesta1 = $_POST['r1'];

$comprobar1 = comprobarespuestas($id1);
$transformacionrr1 = strtoupper($comprobar1['respuesta']);
$transformacionre1 = strtoupper($respuesta1);


$id2 = $_POST['p2'];
$respuesta2 = $_POST['r2'];

$comprobar2 = comprobarespuestas($id2);
$transformacionrr2 = strtoupper($comprobar2['respuesta']);
$transformacionre2 = strtoupper($respuesta2);

if ($transformacionre1 == $transformacionrr1 AND $transformacionre2 == $transformacionrr2) {
	$response = '
	<div style="'.$classForm.'">
	    <input type="text" class="form-control" id="userproperty" value="'.$comprobar2['usuario'].'" style="display: none;">
	    <input type="text" class="form-control mb-2" id="newpsw" placeholder="Ingrese una nueva Contraseña">
	    <input type="text" class="form-control mb-3" id="renewpsw" placeholder="Confirme la nueva Contraseña">
	    <button type="button" class="BotonForm p-2 pe-4 ps-4" id="finished">Cambiar Contraseña</button>
	</div>
    '.$scriptjs.'
	';
} else {
	$response = 2;
}

echo $response;
?>