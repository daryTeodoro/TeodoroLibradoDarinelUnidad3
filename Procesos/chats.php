<?php
	$conexion= new conexion();
	$sql = $conexion->prepare("SELECT * FROM chat");
	$sql->execute();
	$contador = $sql->rowCount();

	if ($contador>0) {
	    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {

	    	$Remitente = $row['iduser'];

	    	$sql2 = $conexion->prepare("SELECT * FROM usuarios WHERE id_user = :id");
	    	$sql2->bindParam(':id',$Remitente);
	        $sql2->execute();
	        $campo=$sql2->fetch(PDO::FETCH_ASSOC);

			    echo '<form method="post" action="" class="mt-2 border border-dark border-2 p-2 cg cg-s">
			      <div>'. $campo['nombre'] .'</div>
			      <button type="submit" value="'. $row['idchat'] .'" name="atender">Atender</button>
			    </form>';
	    }
	}
?>