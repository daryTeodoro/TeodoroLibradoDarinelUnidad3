<?php
session_start();
$idchat = $_SESSION['idchat'];
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
	</style>
</head>
<body style="margin: 0;">

<!--ESTRUCTURA DEL CHATBOT-->
<div class="cf cg cg-g">
	<div class="cg cg-e fe" style="background-color: #000000;color: #ffffff;">
		<div class="at">
			<ion-icon name="arrow-back-outline" onclick="volver('inicioModerador.php')"></ion-icon>
		</div>
		<div class="at" style="text-align: center;">
			<h2>Soporte</h2>
		</div>
		<div class="at">
			<img class="logo-user" src="img/apoyo-tecnico.png" width="50px">
		</div>
	</div>

	<div id="cc" class="cc">
		<?php
		include("Procesos/consulta_mensajes.php"); 
		?>
	</div>

    <form id="chat" method="POST" action="" class="cg cg-p ft" style="background-color: #000000; color: #ffffff; margin-top: 10px;">
	    <div class="at">
		    <input id="pregunta" type="text" class="formSecondary" placeholder="Escribe tu pregunta">
		    <input id="idchat" type="text" value="1" style="display: none;">
		    <input id="remitente" type="text" value="1" style="display: none;">
	    </div>
	    <div class="at">
			<button type="submit" class="btnSecondary ft" style="border: 2px solid #ffffff;">ENVIAR</button>
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
                    $('#cc').load("Procesos/consulta_mensajes.php");
                    $('#pregunta').val('');
                }
            });
        });
    });
</script>