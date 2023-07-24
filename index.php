<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/favicon.png" alt="favicon">
	<title>MEXICO ES MAGICO</title>
	<!--Boostrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<!--ESTILOS GENERALES-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--ESTILOS PROPIOS-->
	<style type="text/css">
		.imgSlide{
			height: 100vh;
			width: 100vw;
			filter: brightness(0.7);
		}.carousel-caption{
			right: 0;
			left: 0;
			bottom: 0;
			width: 100%;
		}

		.cg-i{
			grid-template-columns: 60% 40%;
		}.imgInfo{
			width: 80%;
			height: 80%;
		}

		.cg-m{
			grid-template-columns: 20% 80%;
			background-color: #ffd8d2;
			border-bottom: 2px solid #000000;
		}.col-list::-webkit-scrollbar { /* CSS scrollbar del body*/
			width: 3px;               
		}.col-list::-webkit-scrollbar-track {
			background: #e0ecff;        
			border-radius: 10px;
		}.col-list::-webkit-scrollbar-thumb {
			background-color: #8797ff;
			border-radius: 10px;
		}

		.cg-t{
			grid-template-columns: 25% 25% 25% 25%;
			padding: 0px 50px;
			text-align: center;
		}

		.cg-c{
			grid-template-columns: 25% 25% 25% 25%;
			padding: 0px 50px 70px;
			text-align: center;
		}

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

        .cg-ms{
        	grid-template-columns: 33% 34% 33%;
        }
	</style>
</head>
<body>
<!--NAVBAR-->
<?php include('navbar.php'); ?>


<!--PRESENTACION (Slide de Imagenes)-->
<div id="carouselExampleDark" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false">

	<div class="carousel-indicators">
		<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
    	<div class="carousel-item active" data-bs-interval="4000">
    		<img src="https://images.pexels.com/photos/1573471/pexels-photo-1573471.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block imgSlide" alt="Imagen 1">
    		<div class="carousel-caption d-none d-md-block">
    			<h5 class="ft" style="font-size: 3.5rem;">ATREVETE A ENAMORATE</h5>
    			<p class="fp" style="font-size: 1.3rem;">Conoce, disfuta y enamorate de los hermosos paisajes y de su gente.</p>
    		</div>
    	</div>
    	<div class="carousel-item" data-bs-interval="4000">
    		<img src="https://i0.wp.com/blog.vivaaerobus.com/wp-content/uploads/2020/02/Lugares-para-visitar-en-Mexico.jpg?resize=1200%2C640&ssl=1" class="d-block imgSlide" alt="Imagen 2">
    		<div class="carousel-caption d-none d-md-block">
    			<h5 class="ft" style="font-size: 3.5rem;">VIVE SUS PLAYAS</h5>
    			<p class="fp" style="font-size: 1.3rem;">Belleza natural, aguas turquesas y diversidad que ofrece.</p>
        	</div>
        </div>
        <div class="carousel-item" data-bs-interval="4000">
        	<img src="https://www.mexicodesconocido.com.mx/wp-content/uploads/2021/06/cultura-de-mexico-depositphotos.jpg" class="d-block imgSlide" alt="Imagen 3">
        	<div class="carousel-caption d-none d-md-block">
        		<h5 class="ft" style="font-size: 3.5rem;">VIVE SU CULTURA Y TRADICION</h5>
        		<p class="fp" style="font-size: 1.3rem;">México es diversa y rica, con una mezcla de influencias indígenas y europeas.</p>
        	</div>
        </div>
    </div>

</div>


<!--INFORMACION-->
<div class="cg cg-i" style="padding: 120px 20px;">
	<div class="at p-5">
		<h1 class="ft" align="center">SABIAS QUE...</h1><hr>
	    <ol class="fe" style="font-size: 1.5rem;" align="justify">
		    <li class="mb-3">México es el país hispanohablante más poblado del mundo y el tercer país más grande de América Latina, después de Brasil y Argentina.</li>
		    <li class="mb-3">La gastronomía mexicana es reconocida como Patrimonio Cultural Inmaterial de la Humanidad por la UNESCO, y es famosa por platos como los tacos, las enchiladas, el guacamole y el mole.</li>
		    <li class="mb-3">El Chihuahua, una pequeña raza de perro originaria de México, es considerado el perro más pequeño del mundo.</li>
	    </ol>
	    <h4 class="ft">¿Quieres conocer mas?, Entonces que esperas para venir a visitarnos.</h4>
	</div>
	<div class="at">
		<img src="https://images.vexels.com/media/users/3/163404/isolated/preview/1c1af0288aac15f38170041ed64ae18e-cinta-de-la-bandera-viva-mexico-pegatina.png" class="imgInfo">
	</div>
</div>
<!--MAPA-->
<div style="padding: 20px 10px 10px;background-color: #009520;color: #ffffff;">
	<h4 class="ft" align="center">Interactura y Conoce</h4>
</div>
<div class="cg cg-m" style="justify-content: center;align-items: center;">
	<div style="height: 553px;overflow-y: auto;padding: 10px 20px;" class="col-list">
		<h4>
			<div class="content_list_states fe">
            <li id="letrasAGU" data-parent-map="#AGU" class="listaEdos" >Aguascalientes</li>
            <li id="letrasBCN" data-parent-map="#BCN" class="listaEdos" >Baja California</li>
            <li id="letrasBCS" data-parent-map="#BCS" class="listaEdos" >Baja California Sur</li>
            <li id="letrasCAM" data-parent-map="#CAM" class="listaEdos" >Campeche</li>
            <li id="letrasCOA" data-parent-map="#COA" class="listaEdos" >Coahuila</li>
            <li id="letrasCOL" data-parent-map="#COL" class="listaEdos" >Colima</li>
            <li id="letrasCHP" data-parent-map="#CHP" class="listaEdos" >Chiapas</li>
            <li id="letrasCHH" data-parent-map="#CHH" class="listaEdos" >Chihuahua</li>
            <li id="letrasDIF" data-parent-map="#DIF" class="listaEdos" >Ciudad de México</li>
            <li id="letrasDUR" data-parent-map="#DUR" class="listaEdos" >Durango</li>
            <li id="letrasGUA" data-parent-map="#GUA" class="listaEdos" >Guanajuato</li>
            <li id="letrasGRO" data-parent-map="#GRO" class="listaEdos" >Guerrero</li>
            <li id="letrasHID" data-parent-map="#HID" class="listaEdos" >Hidalgo</li>
            <li id="letrasJAL" data-parent-map="#JAL" class="listaEdos" >Jalisco</li>
            <li id="letrasMEX" data-parent-map="#MEX" class="listaEdos" >Estado de México</li>
            <li id="letrasMIC" data-parent-map="#MIC" class="listaEdos" >Michoacán</li>
            <li id="letrasMOR" data-parent-map="#MOR" class="listaEdos" >Morelos</li>
            <li id="letrasNAY" data-parent-map="#NAY" class="listaEdos" >Nayarit</li>
            <li id="letrasNLE" data-parent-map="#NLE" class="listaEdos" >Nuevo León</li>
            <li id="letrasOAX" data-parent-map="#OAX" class="listaEdos" >Oaxaca</li>
            <li id="letrasPUE" data-parent-map="#PUE" class="listaEdos" >Puebla</li>
            <li id="letrasQUE" data-parent-map="#QUE" class="listaEdos" >Querétaro</li>
            <li id="letrasROO" data-parent-map="#ROO" class="listaEdos" >Quintana roo</li>
            <li id="letrasSLP" data-parent-map="#SLP" class="listaEdos" >San Luis Potosí;</li>
            <li id="letrasSIN" data-parent-map="#SIN" class="listaEdos" >Sinaloa</li>
            <li id="letrasSON" data-parent-map="#SON" class="listaEdos" >Sonora</li>
            <li id="letrasTAB" data-parent-map="#TAB" class="listaEdos" >Tabasco</li>
            <li id="letrasTAM" data-parent-map="#TAM" class="listaEdos" >Tamaulipas</li>
            <li id="letrasTLA" data-parent-map="#TLA" class="listaEdos" >Tlaxcala</li>
            <li id="letrasVER" data-parent-map="#VER" class="listaEdos" >Veracruz</li>
            <li id="letrasYUC" data-parent-map="#YUC" class="listaEdos" >Yucatán</li>
            <li id="letrasZAC" data-parent-map="#ZAC" class="listaEdos" >Zacatecas</li>
        </div>
		</h4>
	</div>
	<div class="bg-info" style="width: 100%;height: 100%;overflow-y: auto;">
		<?php include('mapa.php') ?>
	</div>
</div>
<!--INFORMACION-->
<div style="padding: 120px 50px 30px;">
	<h2 class="ft" align="center">¿Que ofrecemos?</h2><hr>
	<p class="fp" style="font-size: 1.4rem;" align="justify">Reunimos una gama amplia de agencias y negocios independientes que ofertan viajes a los destinos turisticos mas demandados y maravillosos de cada estado de <b style="color: #006847;">MÉ</b><b style="color: #b17a00;">XI</b><b style="color: #CE1125;">CO</b>, los servicios que se ofrecen son de forma individual ya sea que solo deseas ir a un destino especifico, tambien se ofrecen paquetes en caso de que quieras visitar varios puntos de un estado.</p>
	<ul style="font-size: 1rem;">
		<li>Cotiza viajes.</li>
		<li>Informate sobre lo que ofrece cada estado.</li>
		<li>Comunicacion directa con los responsables.</li>
		<li>Seriedad en los procesos.</li>
	</ul>
</div>

<div class="cg cg-t">
	<div class="at">
	    <div class="card bg-success text-white fst" style="width: 18rem;">
		    <img src="https://www.mexicodesconocido.com.mx/wp-content/uploads/2020/07/Taxco.jpg" class="card-img-top" alt="Taxco" style="height: 12rem;">
		    <div class="card-body">
			    <h4 class="card-text">Taxco, Gerrero</h4>
		    </div>
	    </div>
	</div>

    <div class="at">
	    <div class="card bg-success text-white fst" style="width: 18rem;">
		    <img src="https://mexicodesconocidoviajes.mx/wp-content/uploads/2019/04/jardin-rafael-perez-jerez.jpg" class="card-img-top" alt="Jerez" style="height: 12rem;">
		    <div class="card-body">
			    <h4 class="card-text">Jerez, Zacatecas</h4>
		    </div>
	    </div>
	</div>

    <div class="at">
    	<div class="card bg-success text-white fst" style="width: 18rem;">
    		<img src="https://mexicorutamagica.mx/wp-content/uploads/2022/04/cholula-puebla.jpg" class="card-img-top" alt="Cholula" style="height: 12rem;">
    		<div class="card-body">
    			<h4 class="card-text">Cholula, Puebla</h4>
    		</div>
    	</div>
	</div>

    <div class="at">
    	<div class="card bg-success text-white fst" style="width: 18rem;">
    		<img src="https://mexicodesconocidoviajes.mx/wp-content/uploads/2018/10/IMG7712_COAH_CUATRO-CIENEGAS_POZA-AZUL_AMmd-1.jpg" class="card-img-top" alt="Cuatrocienegas" style="height: 12rem;">
    		<div class="card-body">
    			<h4 class="card-text">Cuatro Ciénegas, Coahuila</h4>
    		</div>
    	</div>
	</div>
</div>


<div style="padding: 120px 50px 30px;">
	<h2 class="ft" align="center">Nuestro Compromiso</h2><hr>
	<p class="fp" style="font-size: 1.4rem;" align="justify">Somos una organizacion seria y comprometida con el país que tanto nos ha dado. Estamos seguros que el proyecto beneficiara a miles de personas tanto directa, como indirectamente. Queremos dar a conocer el pais del que estamos orgullosos, porque no todo es violencia e inseguridad, tambien hay calidez y lugares que roban las palabras.</p>
	<ul style="font-size: 1rem;">
		<li>Proteccion de datos personales.</li>
		<li>Transparencia en los procesos.</li>
		<li>Seguridad y disponibilidad del sistema.</li>
		<li>Soporte y apoyo en cada momento.</li>
	</ul>
</div>

<!--CARDS-->
<div class="cg cg-c">
	<div class="at">
	    <div class="card bg-danger text-white fst" style="width: 18rem;">
		    <img src="https://icorp.com.mx/wp-content/uploads/2015/05/%C2%BFCuales-son-los-3-pilares-de-la-seguridad-informatica-scaled.webp" class="card-img-top" alt="Taxco" style="height: 12rem;">
		    <div class="card-body">
			    <h4 class="card-text">Seguridad</h4>
		    </div>
	    </div>
	</div>

    <div class="at">
	    <div class="card bg-danger text-white fst" style="width: 18rem;">
		    <img src="https://pc29laguna.org.mx/wp-content/uploads/2023/01/informacion-publica.jpg" class="card-img-top" alt="Jerez" style="height: 12rem;">
		    <div class="card-body">
			    <h4 class="card-text">Transparencia</h4>
		    </div>
	    </div>
	</div>

    <div class="at">
    	<div class="card bg-danger text-white fst" style="width: 18rem;">
    		<img src="https://www.generixgroup.com/sites/default/files/2020-03/disponibilidad-sistemas-informaticos-riesgo-operacion-logistica.jpg" class="card-img-top" alt="Cholula" style="height: 12rem;">
    		<div class="card-body">
    			<h4 class="card-text">Disponibilidad</h4>
    		</div>
    	</div>
	</div>

    <div class="at">
    	<div class="card bg-danger text-white fst" style="width: 18rem;">
    		<img src="https://www.cloudcenterandalucia.es/wp-content/uploads/2021/08/Cloud-Center-Andaluc%C3%ADa_Soporte-T%C3%A9cnico.png" class="card-img-top" alt="Cuatrocienegas" style="height: 12rem;">
    		<div class="card-body">
    			<h4 class="card-text">Soporte</h4>
    		</div>
    	</div>
	</div>
</div>
<!--VIDEO PROMOCIONAL-->
<div id="video-container">
    <video autoplay loop>
      <source src="img/mexicomagico.mp4" type="video/mp4">
      <!-- Puedes agregar más fuentes de video para compatibilidad con diferentes navegadores -->
    </video>
  </div>
<!--MAPA DEL SITIO-->
<div style="padding: 30px 20px;background-color: #000000;color:#ffffff;" align="center">
	<h2 class="ft mb-3">Mapa del Sitio</h2>
	<div class="cg cg-ms fe">
		<div><h6 style="color:#aeeab5;">Información</h6></div>
		<div><h6>Servicios</h6></div>
		<div><h6 style="color:#edbfb8;">Conocenos</h6></div>
	</div>
</div>

    <script>
    	var video = document.querySelector("video");
    	var videoContainer = document.getElementById("video-container");

    	function checkVisibility() {
    		var rect = videoContainer.getBoundingClientRect();

    		// Reproducir el video si está dentro de la vista y pausarlo si está fuera
    		if (rect.bottom >= 0 && rect.top <= window.innerHeight) {
    			video.play();
    		} else {
    			video.pause();
    		}
    	}

    	// Comprobar la visibilidad del video al cargar la página
    	checkVisibility();
    	// Comprobar la visibilidad del video al hacer scroll
    	window.addEventListener("scroll", checkVisibility);
    </script>

    <!--Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>