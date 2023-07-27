<?php
	include ("conexion.php");
	$id = 1;
	$cnn = new Conexion();
	$sql = $cnn->prepare("SELECT conversacion.remitente, conversacion.texto, conversacion.fecha, usuarios.rol FROM conversacion INNER JOIN usuarios ON conversacion.remitente = usuarios.id_user WHERE conversacion.idconversation = :id ORDER BY conversacion.fecha ASC");
	$sql->bindParam(':id',$id);
	$sql->execute();
	$contador = $sql->rowCount();

	if ($contador>0) {
	    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
	    		
	    	$rol = $row['rol'];

	    	if ($rol==1) {
			    echo '<div class="mu">
			    <div>' . $row['texto'] . '</div>
			    <div style="margin-top:10px; text-align:end; color:#A3A3A3;"><i>' . $row['fecha'] . '</i></div></div>';
		    } else {
			    echo '<div class="mm">
			    <div>' . $row['texto'] . '</div>
			    <div style="margin-top:10px; text-align:end; color:#A3A3A3;"><i>' . $row['fecha'] . '</i></div></div>';
		    }
	    }
	}
?>