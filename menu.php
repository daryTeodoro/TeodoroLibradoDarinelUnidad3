<style type="text/css">
	    .Menu{
        height: 80px;
        display: grid;
        grid-template-columns: 80% 20%;
        background: #86c2ff;
        z-index: 1;
      }

      .IconoMenu{
      	font-size: 2.7rem;
      	float: right;
      	cursor: pointer;
        transition: color 0.3s ease;
      }.IconoMenu:hover{
      	color: #ff315a;
      }

      .MenuColumna1{
      	display: flex;
      	justify-content: start;
      	align-items: center;
      }

      .MenuColumna2{
      	display: flex;
      	justify-content: end;
      	align-items: center;
      }

      .MenuCompleto{
        position: absolute;
        z-index: 2;
        height: 100vh;
        width: 100%;
        background: #ffffff;

        display: none;
        justify-content: end;
        animation: entrada 0.3s linear forwards;
      }

      .MenuCompleto form{
        width: 100%;
        height: 100%;
        background: #e7f3ff;

        display: flex;
        align-items: center;
        justify-content: center;
      }
</style>
<!--Navbar con opciones-->
<div class="Menu shadow fixed-top">
	<div class="MenuColumna1 ms-3"><h3 class="Fuente-Mochiy"><b class="Color-Smart">Smart</b><b class="Color-Care">Care</b></h3></div>
	<div class="MenuColumna2 me-3"><ion-icon name="menu" class="IconoMenu" onclick="maximizar()"></ion-icon></div>
</div>
<!--Menu con Opcion para cerrar sesion-->
<div class="MenuCompleto Fuente-Englebert" id="MenuCompleto">
  <ion-icon name="close" class="IconoClose mt-3 me-3" onclick="minimizar()"></ion-icon>
  <form method="post" action="">
    <button type="submit" name="Exit" class="btn btn-danger">Cerrar Sesión</button>
  </form>
</div>

<!--Al dar clic en el boton para cerrar sesion:-->
<?php
if(isset($_POST['Exit'])){
  session_destroy();
  echo'<script>window.location.href = "index.php";</script>';
}
?>

<!--Funciones de JS para mostrar y ocultar el menu completo-->
<script type="text/javascript">
  let menuCompleto = document.getElementById("MenuCompleto");
  /*Maximizar*/
  function maximizar(){
    menuCompleto.style.display = 'flex';
  }
  /*Minimizar*/
  function minimizar(){
    menuCompleto.style.display = 'none';
  }
</script>