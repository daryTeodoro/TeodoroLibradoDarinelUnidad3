<?php
    session_start();
    include('conexion.php');

	/*Consulta los usuarios que han enviado mensajes al usuario o a quienes el usuario ha enviado*/
	$cnn = new Conexion();
	$datosmensaje = $cnn->prepare("SELECT * FROM usuarios WHERE id != :iduser AND correo IN 
		(SELECT remitente FROM mensajes WHERE destinatario = :iduser
           UNION
        SELECT destinatario FROM mensajes WHERE remitente = :iduser)");
	$datosmensaje->bindParam(':iduser',$_SESSION['UsuarioActivo']);
	$datosmensaje->execute();
	$contarmensajes = $datosmensaje->rowCount();

	//bucle para mostrar a los usuarios
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

			//imprime la informacion de los usuarios
	    	echo '
	    	<button type="button" class="ContenedorInfoMensajes" data-id="'.$datamessage['correo'].'">
	    	    <div><img src="Procesos/'.$datamessage['imagen'].'"></div>
	    	    <div><b class="Fuente-Hina" style="font-size: 1.4rem;">'.$datamessage['nombre'].'</b></div>
	    	    <div>'.$r.'</div>
	    	</button>
	    	';
	    }
	} else { //si no hay ningun chat
		echo'
		<div class="SinReferencias">
	        <h2 class="Fuente-Encode"><b>Sin Mensajes</b></h2>
	    </div>
		';
	}
?>

<script type="text/javascript">
//script para consultar historial de chat
$(document).ready(function() {

    $(".ContenedorInfoMensajes").click(function() {
        var iddes = $(this).data("id");

        $.ajax({
            type: 'POST',
            url: 'Procesos/mensajes.php',
            data: { id: iddes },
            success: function(datouser) {
            	mensajespersonal.style.display = 'grid';
                $("#intermen").html(datouser);
                $("#ListaMensajeria").load('Procesos/ListaMensajes.php');
            }
        });
      });

});
</script>