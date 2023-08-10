<?php
    session_start();
    include('conexion.php');
	/*Consulta los registros de usuarios*/
	$cnn = new Conexion();
	$lista = $cnn->prepare("SELECT * FROM usuarios WHERE id != :iduser ORDER BY nombre");
	$lista->bindParam(':iduser',$_SESSION['IdUsuarioActivo']);
	$lista->execute();
	$contarusuarios = $lista->rowCount();

	/*Hace un bucle para mostrar todos los registros*/
	if ($contarusuarios>0) {
	    while ($info=$lista->fetch(PDO::FETCH_ASSOC)) {

	    	if ($info['rol'] == 2){
	    		$roluser = "<b class='text-success Fuente-Encode'>Enfermero</b>";
	    	} else {
	    		$roluser = "<b class='text-primary Fuente-Encode'>Paciente</b>";
	    	}

			/*Imprimimos la informacion del usuario*/
	    	echo '
	    	<button type="button" class="ContenedorInfoUser" data-correo="'.$info['correo'].'">
	    	    <div><img src="Procesos/'.$info['imagen'].'"></div>
	    	    <div><b class="Fuente-Hina" style="font-size: 1.4rem;">'.$info['nombre'].'</b></div>
	    	    <div>'.$roluser.'</div>
	    	</button>
	    	';
	    }
	} else {
		/*Si no hay registros*/
		echo'
		<div class="SinReferencias">
	        <h2 class="Fuente-Encode"><b>Sin Registros</b></h2>
	    </div>
		';
	}
?>


<script type="text/javascript">
$(document).ready(function() {

    $(".ContenedorInfoUser").click(function() {
        var correo = $(this).data("correo");

        // Ahora puedes usar el valor de 'correo' en tu solicitud AJAX
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