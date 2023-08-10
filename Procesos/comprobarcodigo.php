<?php
/*Estilos*/
$classForm = '
	height: 100%;
	width: 100%;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	text-align: center;
';

/*Js para continuar con el formulario para cambiar contraseña*/
$scriptjs = "
<script type='text/javascript'>
$(document).ready(function() {

    $('#finish').click(function() {
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
                url: 'Procesos/lastRecuperarPsw.php',
                data: {user: property, new: newpsw},
                success: function(response) {
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
session_start();
include('conexion.php');

$codigo = $_POST['codigo']; //traemos el codigo recibido en el input
$codigoenv = $_SESSION['codigo']; //traemos el codigo creado

if ($codigo == $codigoenv) {
    /*Formulario para cambiar contraseña*/
	$response = '
	<div style="'.$classForm.'">
	    <input type="text" class="form-control" id="userproperty" value="'.$_SESSION['property'].'" style="display: none;">
	    <input type="text" class="form-control mb-2" id="newpsw" placeholder="Ingrese una nueva Contraseña">
	    <input type="text" class="form-control mb-3" id="renewpsw" placeholder="Confirme la nueva Contraseña">
	    <button type="button" class="BotonForm p-2 pe-4 ps-4" id="finish">Cambiar Contraseña</button>
	</div>
    '.$scriptjs.'
	';
} else {
	$response = 2;
}

echo $response;
?>