<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/favicon.png" alt="favicon">
	<title>ChatBot</title>
	<!--ESTILOS GENERALES-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--ESTILOS PROPIOS-->
	<style type="text/css">
		.cg-g{
			grid-template-rows: 10vh 80vh 10vh;
			margin: 0;
		}.cg-e{
			grid-template-columns: 20vw 60vw 20vw;
		}.cg-p{
			grid-template-columns: 80% 20%;
		}

		ion-icon{
			font-size: 2rem;
			cursor: pointer;
		}ion-icon:hover{
			color: white;
		}
	</style>
</head>
<body style="margin: 0;">

<!--ESTRUCTURA DEL CHATBOT-->
<div class="cf cg cg-g">
	<div class="cg cg-e fe" style="background-color: #8797ff;">
		<div class="at">
			<ion-icon name="arrow-back-outline" onclick="volver('index.php')"></ion-icon>
		</div>
		<div class="at" style="text-align: center;">
			<h2>Bienvenido al ChatBot</h2>
		</div>
		<div class="at">
			<ion-icon name="help-circle-outline"></ion-icon>
		</div>
	</div>

	<div>Contenido</div>

	<div class="cg cg-p ft" style="background-color: #8797ff;">
		<div class="at">
			<input type="text" class="formSecondary" placeholder="Escribe tu pregunta">
		</div>
		<div class="at">
			<button type="button" class="btnSecondary ft">ENVIAR</button>
		</div>
	</div>
</div>

<script src="js/script.js"></script>

    <!--Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>