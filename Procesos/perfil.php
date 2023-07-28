<?php 
include('funciones.php');

$id = 'darinel.teodoro@gmail.com';

$datosuser = consulta_users($id);

echo '
<form method="post" action="">
<div align="center">
   <img src="'. $datosuser['imagen'] .'" class="border border-4 border-light" alt="usuario" style="width: 200px; height: 200px; border-radius: 100px;">
</div>

<div class="mt-3 mb-5" align="center">
   <h2 class="ft text-white">'. $datosuser['nombre'] .'</h2>
</div>


<div class="border border-1 border-end-0 border-start-0 border-bottom-0 border-light p-2 po">
    <div class="at">
        <ion-icon name="home-outline" class="io"></ion-icon>
    </div>
    <div class="ps-2">
        <h4 class="fp">Inicio</h4>
    </div>
</div>

<div class="border border-1 border-end-0 border-start-0 border-bottom-0 border-light p-2 po">
    <div class="at">
        <ion-icon name="eye-outline" class="io"></ion-icon>
    </div>
    <div class="ps-2">
        <h4 class="fp">Vista Usuario</h4>
    </div>
</div>

<div class="border border-1 border-end-0 border-start-0 border-bottom-0 border-light p-2 po">
    <div class="at">
        <ion-icon name="notifications-outline" class="io"></ion-icon>
    </div>
    <div class="ps-2">
        <h4 class="fp">Notificaciones</h4>
    </div>
</div>

<div class="border border-1 border-end-0 border-start-0 border-light p-2 po">
    <div class="at">
        <ion-icon name="settings-outline" class="io"></ion-icon>
    </div>
    <div class="ps-2">
        <h4 class="fp">Configuración</h4>
    </div>
</div>

<center>
<button type="submit" class="btn btn-outline-light mt-4 po" name="exit" style="width: 80%;">
    <div class="at" style="height: 100%;">
        <ion-icon name="log-out-outline" style="width: 100%; height: 100%;"></ion-icon>
    </div>
    <div>
        <h4 class="fp">Cerrar Sesión</h4>
    </div>
</button>
</center>
</form>
';
?>