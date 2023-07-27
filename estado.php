<?php
session_start();
$estado = $_SESSION['idstate'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/favicon.png" alt="favicon">
	<title>MEXICO ES MAGICO</title>
	<!--Boostrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--ESTILOS GENERALES-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
    	#video-container {
			position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        video {
        	width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            pointer-events: none; /* para que el video no capture los eventos del ratón y scroll */
        }
    </style>
</head>
<body>

	<?php include('navbar.php'); ?>
	<?php
	    include('Procesos/funciones.php');

	    $consultaEstado = consultarestado($estado);

	    echo'<div id="video-container">
			<video autoplay loop muted>
		        <source src="'. $consultaEstado['video'] .'" type="video/mp4">
			</video>
		</div>';
	?>

	<div class="cf at">
		<div>
			<button>Individuales</button>
			<button>Paquetes</button>
		</div>
	</div>

	<!--JS Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!--Libreria de Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>