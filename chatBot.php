<?php
    session_start();
    //$usuario = $_SESSION['usuario'];
    $usuario = 1;
    if ($usuario == 1) {
    	$saludo = "Hola usuario";
    } else if ($usuario == 2) {
    	$saludo = "Hola empresa";
    } else {
    	$saludo = "Bienvenido";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/favicon.png" alt="favicon">
	<title>ChatBot</title>
	<!--ESTILOS GENERALES-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

		.mu {
			background-color: #C7F1CA;
			padding: 20px 10px;
			margin-bottom: 10px;
			width: 50%;
			float: right;
			border-radius: 10px;
			font-family: Arial;
		}

		.mm {
			background-color: #F5DFD8;
			padding: 20px 10px;
			margin-bottom: 10px;
			width: 50%;
			float: left;
			border-radius: 10px;
			font-family: Arial;
		}

		.cc {
        	padding: 10px 0px; 
        	overflow-y: auto; 
        	height: 100%;
        }

		.cc::-webkit-scrollbar { /* CSS scrollbar del body*/
	        width: 3px;               
        }.cc::-webkit-scrollbar-track {
	        background: #e0ecff;        
            border-radius: 10px;
        }.cc::-webkit-scrollbar-thumb {
            background-color: #913ECD;
            border-radius: 10px;
        }

        .logo-user {
        	margin-bottom: 5px;
        }

        .principal {
        	width: 80%;
        	background-color: #c6d8f0;
        	border: 2px solid darkblue;
        	padding: 20px 30px;
        	margin-bottom: 20px;
        	border-radius: 10px;
        	box-shadow: 0px 0px 3px black;
        	text-align: center;
        }

        .principal button {
        	padding: 8px 20px;
        	background-color: black;
        	color: whitesmoke;
        	border-radius: 10px;
        	width: 300px;
        }

        .elementos {
        	display: none;
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
			<img class="logo-user" src="img/user.png" width="50px">
		</div>
	</div>

	<div id="cc" class="cc">
		<?php
		echo '<center>
		<div class="principal">
		    <b class="fo" style="font-size:2rem;">' .$saludo. '</b><hr>
		    <button id="principal1" onclick="lstfrecuentes()" class="fp" style="margin-bottom:5px;" disabled=""><b>Preguntas frecuentes</b></button><br>
		    <button id="principal2" onclick="hblrmoderador()" class="fp" disabled=""><b>Hablar con un moderador</b></button>
		</div>
		</center>
		<div id="cc-response">
		</div>';
		?>
	</div>
    <form id="chat" method="POST" action="" class="cg cg-p ft" style="background-color: #8797ff; margin-top: 10px;">
	    <div class="at elementos" id="elemento1">
		    <input id="pregunta" type="text" class="formSecondary" placeholder="Escribe tu pregunta" required>
		    <input id="idchat" type="text" value="1" style="display: none;">
		    <input id="remitente" type="text" value="1" style="display: none;">
	    </div>
	    <div class="at elementos" id="elemento2">
			<button type="submit" class="btnSecondary ft">ENVIAR</button>
		</div>
    </form>
</div>
<script src="js/script.js"></script>

    <!--Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<script type="text/javascript">
	var principal1 = document.getElementById("principal1");
    var principal2 = document.getElementById("principal2");
    principal1.disabled = false;
	principal2.disabled = false;

	$(document).ready(function() {
        $('#chat').submit(function(e) {
            e.preventDefault(); // Prevenir el envío del formulario por defecto

            var idchat = $('#idchat').val();
            var pregunta = $('#pregunta').val();
            var remitente = $('#remitente').val();

            // Realizar la petición AJAX
            $.ajax({
                type: 'POST',
                url: 'Procesos/registrar_mensaje.php', // Archivo PHP para procesar los datos en el servidor
                data: { id: idchat, ask: pregunta, send: remitente}, // Se envia el dato
                success: function(response) {
                    $('#cc-response').load("Procesos/consulta_mensajes.php");
                    $('#pregunta').val('');
                }
            });
        });
    });

    function lstfrecuentes(){
	    principal1.disabled = true;
	    principal2.disabled = true;
	    $('#cc-response').load("Procesos/preguntas_frecuentes.php");
    }

    function hblrmoderador(){
    	let elemento1 = document.getElementById("elemento1");
    	let elemento2 = document.getElementById("elemento2");
	    principal1.disabled = true;
	    principal2.disabled = true;
	    elemento1.style.display = "flex";
	    elemento2.style.display = "flex";
	    $('#cc-response').load("Procesos/consulta_mensajes.php");
    }
</script>