<?php
$classformPreguntas = '
		height: 100%;
		width: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		text-align: center;
';

$script = '
<script type="text/javascript">
let changepsw = document.getElementById("CambiarPsw");

$(document).ready(function() {

    $("#NextNumber").click(function() {
        var ask1 = $("#pregunta1").val();
        var response1 = $("#respuesta1").val();
        var ask2 = $("#pregunta2").val();
        var response2 = $("#respuesta2").val();

        if ($("#respuesta1").val() == "") {
          alert("Ingrese una respuesta a la prengunta 1");
        } else if ($("#respuesta2").val() == "") {
          alert("Ingrese una respuesta a la prengunta 2");
        } else {
            $.ajax({
                type: "POST",
                url: "Procesos/comprobar.php", // Archivo PHP para procesar los datos en el servidor
                data: {p1: ask1, r1: response1, p2: ask2, r2: response2}, // Se envia el dato
                success: function(response) {
                // Manejar la respuesta del servidor aquí
                    if (response == 2) {
                    	alert("Error de Verificacion");
                    } else {
                    	preguntas.style.display = "none";
                        changepsw.style.display = "flex";
                        $("#respuesta1").val("");
                        $("#respuesta2").val("");
                        $("#CambiarPsw").html(response);
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
include('conexion.php');
include('funciones.php');

$User = $_POST['user'];
$rectificar = loguear($User);

if ($rectificar) {

	$conexion = new Conexion();
	$rectificarsql = $conexion->prepare('SELECT * FROM preguntas WHERE usuario = :user');
	$rectificarsql->bindParam(':user', $User);
	$rectificarsql->execute();
	$count = $rectificarsql->rowCount();

	$response = '<form class="bg-light" method="post" action="" style="'.$classformPreguntas.'">';
	$Contador=0;

	if ($count > 0) {
		while ($datos=$rectificarsql->fetch(PDO::FETCH_ASSOC)) {
			$Contador++;
			$response .= '
			<input type="text" class="form-control mb-2" id="pregunta'.$Contador.'" value="'.$datos['id'].'" style="display: none;">
			<h4 class="mb-3">'.$datos['pregunta'].'</h4>
			<input type="text" class="form-control" id="respuesta'.$Contador.'" placeholder="Ingresa tu Respuesta">
			<hr>
			'.$script.'
			';
		}
	}

	$response .='<button type="button" class="BotonForm p-2 pe-4 ps-4" id="NextNumber">Continuar</button></form>';

} else {
	$response = 2;
}

echo $response;
?>