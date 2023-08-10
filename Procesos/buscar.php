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

/*realiza blucle para presentar a los usuarios*/
if ($count > 0) {
while ($search=$query->fetch(PDO::FETCH_ASSOC)) {

	if ($search['rol'] == 2){
	    $roluser = "<b class='text-success Fuente-Encode'>Enfermero</b>";
	} else {
	    $roluser = "<b class='text-primary Fuente-Encode'>Paciente</b>";
	}
	/*imprime los resultados*/
	echo '
	    <button type="button" class="ContenedorInfoUser" data-correo="'.$search['correo'].'">
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

echo $Salida;
?>

<script type="text/javascript">
/*Script para mostrar la infor de un usuario*/
$(document).ready(function() {

      $(".ContenedorInfoUser").click(function() {
        var correo = $(this).data("correo");

    
        $.ajax({
            type: 'POST',
            url: 'Procesos/presentacionUser.php',
            data: { id: correo },
            success: function(datouser) {
                $("#ListaUsuarios").html(datouser);
            }
        });
      });

});
</script>