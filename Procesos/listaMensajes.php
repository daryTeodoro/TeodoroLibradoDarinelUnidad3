<?php
    session_start();
    include('conexion.php');

	$cnn = new Conexion();
	$datosmensaje = $cnn->prepare("SELECT * FROM usuarios WHERE id != :iduser AND correo IN 
		(SELECT remitente FROM mensajes WHERE destinatario = :iduser
           UNION
        SELECT destinatario FROM mensajes WHERE remitente = :iduser)");
	$datosmensaje->bindParam(':iduser',$_SESSION['UsuarioActivo']);
	$datosmensaje->execute();
	$contarmensajes = $datosmensaje->rowCount();

	if ($contarmensajes>0) {
	    while ($datamessage=$datosmensaje->fetch(PDO::FETCH_ASSOC)) {

	    	$datosmensajep = $cnn->prepare("SELECT * FROM mensajes WHERE remitente = :remi AND destinatario = :desinfo AND leido = 1");
	    	$datosmensajep->bindParam(':remi',$datamessage['correo']);
	    	$datosmensajep->bindParam(':desinfo',$_SESSION['UsuarioActivo']);
	    	$datosmensajep->execute();
	    	$contarmensajesp = $datosmensajep->rowCount();

	    	if ($contarmensajesp == 0){
	    		$r = '<ion-icon name="checkmark-circle-outline" style="font-size: 2rem;"></ion-icon>';
	    	} else {
	    		$r = '<b class="bg-danger text-white p-2 pt-1 pb-1 rounded">'.$contarmensajesp.'</b>';
	    	}

	    	echo '
	    	<button type="button" class="ContenedorInfoMensajes" data-id="'.$datamessage['correo'].'">
	    	    <div><img src="Procesos/'.$datamessage['imagen'].'"></div>
	    	    <div><b class="Fuente-Hina" style="font-size: 1.4rem;">'.$datamessage['nombre'].'</b></div>
	    	    <div>'.$r.'</div>
	    	</button>
	    	';
	    }
	} else {
		echo'
		<div class="SinReferencias">
	        <h2 class="Fuente-Encode"><b>Sin Mensajes</b></h2>
	    </div>
		';
	}
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
                $("#ListaMensajeria").load('Procesos/ListaMensajes.php');
            }
        });
      });

});
</script>