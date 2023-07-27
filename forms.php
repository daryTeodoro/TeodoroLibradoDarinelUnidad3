<?php
session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="img/favicon.png" alt="favicon">
	<title>MEXICO ES MAGICO</title>
 	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	    <!--JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--SweetAlert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<style type="text/css">
	input[type="number"]::-webkit-inner-spin-button,
	input[type="number"]::-webkit-outer-spin-button{
	    -webkit-appearance:none;
	}
	input[type=number] { -moz-appearance:textfield; }

		.CampoFormulario{
			padding: 10px 20px;
			width: 80%;
			border: 3px solid #c5d6f0;
			margin-bottom: 15px;
			background-color: #e8f9f6;
		}.CampoFormulario:focus{
		outline: none;
		background: #ffe4ed;
		}

		.boton-continue{
			padding: 5px 10px;
			border: 2px solid #01db00;
			cursor: pointer;
			border-radius: 10px;
			background-color: #e7ffdf;
		}
		.boton-cancel{
			padding: 5px 10px;
			border: 2px solid #fb0039;
			cursor: pointer;
			border-radius: 10px;
			background-color: #ffdce5;

		}

		.opcion-selecionada{
			background: #3a0075;
			color: white;
			padding: 5px 15px;
			opacity: .7;
			cursor: pointer;
			border-radius: 10px;
			border: none;
		}

		.boton{
			background-color: #d7d8ff;
			padding: 5px 15px;
			
			border-radius: 10px;
			border: none;
			cursor: default;
		}


		form{
			width: 80%;
			text-align: center;
			color: #ffffff;
		}
		.ancla-b{
			color: #8fe2c7;
			cursor: pointer;
		}
		.ancla-b:hover{
			text-decoration: underline;
		} 

		#registroForm{
			display: none;
		}
		#cuenta-empresa{
			display: none;
		}

		#recuperarContraForm{
			display: none;
		}

		.swal2-container.swal2-center>.swal2-popup{
            background-color: #000000;
            border-radius: 10px;
            border: #174C4F 3px solid;
            padding: 0px 10px 20px;
        }.swal2-html-container{
            color: #ffffff !important;
            font-size: 1rem;
            font-family: verdana;
        }.swal2-title{
            color: #FF9666 !important;
            font-size: 1.4rem;
            font-family: arial;
		}

	</style>

</head>
<body style="margin: 0; background: #000000">

<div class="cf at">

	
  
    
        <!--Fomulario de Inicio de Sesion-->
        <form method="post" action="" class="L-C L-R" id="loginForm">
            <div class="fo" style="font-size: 2rem; margin: 10px 0px;"><b class="TextResponsive">Iniciar Sesión</b></div>
            <!--Campos del formulario-->
            <input type="e-mail" id="L-Correo" class="CampoFormulario"  placeholder="Ingresa tu Correo" autocomplete="off">
            
            <input type="password"  id="L-Password" class="CampoFormulario"  placeholder="Ingresa tu Contraseña">
            <!--Boton para Ejecutar-->
            <div>
                <button type="sumbit" class="boton-continue">Iniciar Sesion</button>
            </div><br>
            <!--Opcion para cambiar a formulario de registro-->
            <div class="change-view fp" id="cambiar-vista">
                ¿Aún no tienes una cuenta? <b class="change_L-C ancla-b">Crea una cuenta</b>
                <br>
                ¿Olvidaste tu contraseña? <b class="change_L-R ancla-b">Recupera tu contraseña</b>
            </div>
        </form>
    


   
        <!--Fomulario de Registro-->
        <div class="L-C" id="registroForm" style=" width: 80%; text-align: center ;color: #ffffff;">
            <div class="fo" style="font-size: 2rem; margin: 10px 0px;"><b>Crear Cuenta</b></div>
	            <div style=" margin-bottom: 20px; ">
		            <button type="button" class="boton" id="crear-usuario" onclick="usuarios()" disabled="">Usuario</button>
		            <button type="button" class="opcion-selecionada" id="crear-empresa" onclick="empresas()" disabled="">Empresa</button>
	            </div>

			<!--Campos del formulario Usuario-->
            <form id="cuenta-usuario" style="width: 100%;">

	            <input type="e-mail"  id="RU-Correo" class="CampoFormulario"  placeholder="Ingresa un Correo" autocomplete="off">
	            <input type="text"  id="RU-Nombre" class="CampoFormulario"  placeholder="Ingresa tu Nombre" autocomplete="off">
	            <input type="number"  id="RU-Telefono" class="CampoFormulario"  placeholder="Ingresa un Telefono" autocomplete="off">
	            <input type="password" id="RU-Password" class="CampoFormulario"  placeholder="Ingresa una Contraseña">


	            <!--Boton para Ejecutar-->
	            <div>
	                <button type="sumbit" class="boton-continue">Crear Cuenta</button>
	            </div>
            </form>


            	<!--Campos del formulario Empresa-->
            <form id="cuenta-empresa" style="width: 100%;">
	           <input type="e-mail"  id="RE-Correo" class="CampoFormulario"  placeholder="Ingrese un Correo" autocomplete="off">
	            <input type="text"  id="RE-Nombre" class="CampoFormulario"  placeholder="Ingrese el Nombre de la Empresa" autocomplete="off">
	            <input type="number"  id="RE-Telefono" class="CampoFormulario"  placeholder="Ingrese un Telefono" autocomplete="off">
	            <input type="password" id="RE-Password" class="CampoFormulario"  placeholder="Ingrese una Contraseña">



	            <!--Boton para Ejecutar-->
	            <div>
	                <button type="sumbit" class="boton-continue">Crear Cuenta</button>
	            </div>
            </form>

            <!--Opcion para cambiar a formulario de Login-->
            <br>
            <div class="change-view fp">
                ¿Ya tienes una cuenta? <b class="change_L-C ancla-b">Iniciar Sesión</b>
            </div>
        </div>
        
    





            <!--Fomulario de Recuperar contraseña-->
        <form method="post" action="" class="L-R" id="recuperarContraForm">
            <div class="fo" style="font-size: 2rem; margin: 10px 0px;"><b>Recuperar Contraseña</b></div>
            <!--Campos del formulario-->
			<input type="e-mail"  id="" class="CampoFormulario"  placeholder="Ingresa tu Correo" autocomplete="off">

            
            <!--Boton para Ejecutar-->
            <div class="change-view">
            	<button type="button" class="boton-cancel change_L-R">Cancelar</button>
                <button type="sumbit" class="boton-continue">Recuperar</button>
            </div><br>
        </form> 
   

<b class="ancla-b fe" style="margin-top: 20px; color: #ff5661;" onclick="volver('index.php')">Volver al Inico</b>
</div>


</body>
</html>
 <script src="js/script.js"></script>
 <script src="js/alertas.js"></script>

 <!--Animaciones y transiciones-->
<script type="text/javascript">
	document.getElementById("crear-usuario").disabled=true;
    document.getElementById("crear-empresa").disabled=false;

    var boton1 = document.getElementById("crear-usuario");
    var boton2 = document.getElementById("crear-empresa");


    /*Cambiar Formulario de Login a Registro y vicebersa Antiguo formato*/
    $('.change-view .change_L-C').click(function(){
        $('.L-C').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

    $('.change-view .change_L-R').click(function(){
        $('.L-R').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

    function empresas(){ 
    $('#cuenta-usuario').fadeOut("fast",function(){
        $("#cuenta-empresa").fadeIn();
		boton2.disabled=true;
		boton2.classList.remove("opcion-selecionada");
		boton2.classList.add("boton");

		boton1.disabled=false;
		boton1.classList.remove("boton");
		boton1.classList.add("opcion-selecionada");
		

     });
	}

	 function usuarios(){ 
    $('#cuenta-empresa').fadeOut("fast",function(){
        $("#cuenta-usuario").fadeIn();
        boton1.disabled=true;
        boton1.classList.remove("opcion-selecionada");
		boton1.classList.add("boton");
        boton2.disabled=false;
        boton2.classList.remove("boton");
        boton2.classList.add("opcion-selecionada");

     });
	}
</script>





 <!--Ejecuciones-->
<script type="text/javascript">

$(document).ready(function() {


		//LOGIN
        $('#loginForm').submit(function(e) {
            e.preventDefault(); // Prevenir el envío del formulario por defecto

            var Correo = $('#L-Correo').val();
            var Contrasena = $('#L-Password').val();

            // Realizar la petición AJAX
            $.ajax({
                type: 'POST',
                url: 'Procesos/loguear.php', // Archivo PHP para procesar los datos en el servidor
                data: { Psw: Contrasena, Correo: Correo }, // Se envia el dato
                success: function(response) {
                    // Manejar la respuesta del servidor aquí
                    if (response == 1) {
                    		 $('#L-Nombre').val('');
                             $('#L-Password').val('');
                        window.location.href = "inicioModerador.php";
                    } else if (response == 2) {
                    		 $('#L-Nombre').val('');
                             $('#L-Password').val('');
                        window.location.href = "inicioUser.php";
                    } else if (response == 3) {
                    		 $('#L-Nombre').val('');
                             $('#L-Password').val('');
                        window.location.href = "inicioEmpresa.php";
                    }else if (response == 4) {
                    		 $('#L-Nombre').val('');
                             $('#L-Password').val('');
                        mensajeError("Acceso Denegado", "El correo/contraseña es incorrecto");
                    } else {
                    		 $('#L-Nombre').val('');
                             $('#L-Password').val('');
                        mensajeError("Error en el Proceso", "Intente nuevamente");
                    }

                }
            });
        });



	//Registro Usuario
	$('#cuenta-usuario').submit(function(e) {
	            e.preventDefault(); // Prevenir el envío del formulario por defecto

	            var Nombre = $('#RU-Nombre').val();
	            var Correo = $('#RU-Correo').val();
	            var Contrasena = $('#RU-Telefono').val();
	            var Telefono = $('#RU-Password').val();


	            // Realizar la petición AJAX
	            $.ajax({
	                type: 'POST',
	                url: 'Procesos/registrar.php', // Archivo PHP para procesar los datos en el servidor
	                data: { Correo: Correo, Telefono: Telefono, Psw: Contrasena, Nombre: Nombre, Rol: 1 }, // Se envia el dato
	                success: function(response) {
	                    // Manejar la respuesta del servidor aquí
	                    if (response == 1) {
	                    	 $('#Ru-Nombre').val('');
                             $('#Ru-Correo').val('');
                             $('#Ru-Telefono').val('');
                             $('#Ru-Password').val('');
	                        window.location.href = "inicioUser.php";
	                    } else if (response == 2) {
	                    	 $('#Ru-Nombre').val('');
                             $('#Ru-Correo').val('');
                             $('#Ru-Telefono').val('');
                             $('#Ru-Password').val('');
	                        campoInvalido("Correo Invalido", "El correo ya esta registrado");
	                    } else if (response == 4) {
	                    	 $('#Ru-Nombre').val('');
                             $('#Ru-Correo').val('');
                             $('#Ru-Telefono').val('');
                             $('#Ru-Password').val('');
	                        campoInvalido("Telefono Invalido", "El telefono ya esta registrado");
	                    } else {
	                    	 $('#Ru-Nombre').val('');
                             $('#Ru-Correo').val('');
                             $('#Ru-Telefono').val('');
                             $('#Ru-Password').val('');
	                        mensajeError("Error en el Proceso", "Intente nuevamente");
	                    }
	                }
	            });
	});





	//Registro Empresa
	$('#cuenta-empresa').submit(function(e) {
	            e.preventDefault(); // Prevenir el envío del formulario por defecto

	            var Nombre = $('#RE-Nombre').val();
	            var Correo = $('#RE-Correo').val();
	            var Contrasena = $('#RE-Telefono').val();
	            var Telefono = $('#RE-Password').val();


	            // Realizar la petición AJAX
	            $.ajax({
	                type: 'POST',
	                url: 'Procesos/registrar.php', // Archivo PHP para procesar los datos en el servidor
	                data: { Correo: Correo, Telefono: Telefono, Psw: Contrasena, Nombre: Nombre, Rol: 2 }, // Se envia el dato
	                success: function(response) {
	                    // Manejar la respuesta del servidor aquí
	                    if (response == 1) {
	                    	 $('#RE-Nombre').val('');
                             $('#RE-Correo').val('');
                             $('#RE-Telefono').val('');
                             $('#RE-Password').val('');

	                        window.location.href = "inicioEmpresa.php";
	                    } else if (response == 2) {
	                    	$('#RE-Nombre').val('');
                             $('#RE-Correo').val('');
                             $('#RE-Telefono').val('');
                             $('#RE-Password').val('');
	                        campoInvalido("Correo Invalido", "El correo ya esta registrado");
	                    } else {
	                    	$('#RE-Nombre').val('');
                             $('#RE-Correo').val('');
                             $('#RE-Telefono').val('');
                             $('#RE-Password').val('');
	                        mensajeError("Error en el Proceso", "Intente nuevamente");
	                    }
	                }
	            });
	});


});
</script>









<script type="text/javascript">
//Validacion de campos del formulaio del Login
$(document).ready(function() {
    let emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

    $("#IniciarSesion").click(function() {
        if ($("#L-Correo").val() == "") {
            campoInvalido('Campo Vacio','El correo esta vacio');
            return false;
        }else{
            if (!emailreg.test($("#L-Correo").val())) {
                campoInvalido('Campo Invalido','El formato del correo es invalido')
                return false;
            }
        } 

        if ($("#L-Contrasena").val() == "") {
            campoInvalido('Campo Vacio','La contraseña esta vacia')
            return false; 
        }
    });
});

//Validacion de campos del formulaio del Registro
$(document).ready(function() {
    let emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

    $("#Crear").click(function() {
        if ($("#C-Nombre").val() == "") {
            campoInvalido('Campo Vacio','El nombre esta vacio')
            return false; 
        }

        if ($("#C-Correo").val() == "") {
            campoInvalido('Campo Vacio','El correo esta vacio');
            return false;
        }else{
            if (!emailreg.test($("#C-Correo").val())) {
                campoInvalido('Campo Invalido','El formato del correo es invalido')
                return false;
            }
        } 

        if ($("#C-Contrasena").val() == "") {
            campoInvalido('Campo Vacio','La contraseña esta vacia')
            return false; 
        }
    });
});
</script>




