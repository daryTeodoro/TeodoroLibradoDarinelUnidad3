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
<div class="cf at">
	<h1>Hola</h1>
</div>
<!--MAPA-->
<div>
</div>
<!--INFORMACION-->
<!--MAPA DEL SITIO-->

    <!--Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>