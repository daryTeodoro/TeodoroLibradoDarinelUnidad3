<?php
/*Estilos*/
$classform = '
		height: 100%;
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		text-align: center;
';
/*Script para ejecutar la verificacion*/
$script = '
<script type="text/javascript">
let changepsw = document.getElementById("CambiarPsw");

$(document).ready(function() {
	$("#sign").click(function() {

	    var serie = $("#codigorecibido").val();

        if ($("#codigorecibido").val() == "") {
          alert("Ingrese un codigo");
        } else {
            $.ajax({
                type: "POST",
                url: "Procesos/comprobarcodigo.php",
                data: {codigo: serie},
                success: function(response) {
                    if (response == 2) {
                    	alert("Error de Verificacion");
                    } else {
                    	codigo.style.display = "none";
                        changepsw.style.display = "flex";
                        $("#CambiarPsw").html(response);
                        $("#codigorecibido").val("");
                    }
                }
            });
        }
    });
});
</script>
';
?>

<?php
session_start();
include('conexion.php');
include('funciones.php');

/*Recibir el usuario y traer sus datos por una consulta*/
$User = $_POST['user'];
$rectificar = loguear($User);

/*Se genera un codigo aleatorio*/
$codigo = generarCodigo();

/*Si el correo esta registrado*/
if ($rectificar) {
	/*formualrio que solicita el codigo*/
	$response = '
	<div class="bg-light" style="'.$classform.'">
       <input type="text" class="form-control" placeholder="Ingresa el Codigo" id="codigorecibido">
       <button type="button" class="BotonForm p-2 pe-4 ps-4 mt-3" id="sign">Continuar</button>
	</div>'.$script.'
	';

	/*parametros del correo*/
	$paracorreo = $User;
	$titulo = "Codigo para Recuperar la Contraseña";
	$mensaje = "Codigo: ".$codigo;
	$tucorreo = "From: 20045110@alumno.utc.edu.mx";

	mail($paracorreo, $titulo, $mensaje, $tucorreo); //envia el correo

	$_SESSION['codigo'] = $codigo;//genera una variable de sesion para el codigo
	$_SESSION['property'] = $User; //genera una variable de sesion para el usuario
} else {
	$response = 2;
}

echo $response;
?>