<?php
    session_start();
    include('conexion.php');

	$cnn = new Conexion();
	$lista = $cnn->prepare("SELECT * FROM usuarios WHERE id != :iduser ORDER BY nombre");
	$lista->bindParam(':iduser',$_SESSION['IdUsuarioActivo']);
	$lista->execute();
	$contarusuarios = $lista->rowCount();

	if ($contarusuarios>0) {
	    while ($info=$lista->fetch(PDO::FETCH_ASSOC)) {

	    	if ($info['rol'] == 2){
	    		$roluser = "<b class='text-success Fuente-Encode'>Enfermero</b>";
	    	} else {
	    		$roluser = "<b class='text-primary Fuente-Encode'>Paciente</b>";
	    	}

	    	echo '
	    	<button type="button" class="ContenedorInfoUser" data-correo="'.$info['correo'].'">
	    	    <div><img src="Procesos/'.$info['imagen'].'"></div>
	    	    <div><b class="Fuente-Hina" style="font-size: 1.4rem;">'.$info['nombre'].'</b></div>
	    	    <div>'.$roluser.'</div>
	    	</button>
	    	';
	    }
	} else {
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
            data: { id: correo }, // Usar 'correo' en lugar de 'identificadoruser'
            success: function(datouser) {
                $("#ListaUsuarios").html(datouser);
            }
        });
    });

});
</script>