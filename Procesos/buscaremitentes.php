<?php 
session_start();
include('conexion.php');
//Datos ingresados en el buscador
$Busqueda = $_POST["Filtro"];
//Busqueda de similitudes
$conexion= new conexion();
$query = $conexion->prepare("SELECT * FROM usuarios WHERE id != :iduser AND nombre LIKE '%$Busqueda%' ORDER BY nombre");
$query->bindParam(':iduser',$_SESSION['IdUsuarioActivo']);
$query->execute();
$count=$query->rowCount();

$Salida = "";

if ($count > 0) {
while ($search=$query->fetch(PDO::FETCH_ASSOC)) {

	if ($search['rol'] == 2){
	    $roluser = "<b class='text-success Fuente-Encode'>Enfermero</b>";
	} else {
	    $roluser = "<b class='text-primary Fuente-Encode'>Paciente</b>";
	}

	echo '
	    <button type="button" class="ContenedorInfoMensajes" data-id="'.$search['correo'].'">
	    	<div><img src="Procesos/'.$search['imagen'].'"></div>
	    	<div><b class="Fuente-Hina" style="font-size: 1.4rem;">'.$search['nombre'].'</b></div>
	    	<div>'.$roluser.'</div>
	    </button>
	';
}
}else{ //Si no hay coincidencias mostramos un mensaje
	$Salida='
	<div class="SinReferencias">
	    <h2 class="Fuente-Encode"><b>No hay Coincidencias</b></h2>
	</div>
	';
}
//Imprime los datos de los podcasts resultantes
echo $Salida;
?>

<script type="text/javascript">
$(document).ready(function() {

    $(".ContenedorInfoMensajes").click(function() {
        var iddes = $(this).data("id");

        // Ahora puedes usar el valor de 'correo' en tu solicitud AJAX
        $.ajax({
            type: 'POST',
            url: 'Procesos/mensajes.php',
            data: { id: iddes }, // Usar 'correo' en lugar de 'identificadoruser'
            success: function(datouser) {
            	mensajespersonal.style.display = 'grid';
                $("#intermen").html(datouser);
            }
        });
      });

});
</script>