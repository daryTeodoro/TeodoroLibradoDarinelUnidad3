<style type="text/css">
.menu {
    width: 100%;
    height: 80px;
    position: fixed;
    text-align: center;

    padding: 0px 10px 0px 30px;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
    z-index: 100;
}

.menu div.logo {
    float: left;
    width: auto;
    height: auto;
}

.menu div.logo a {
    text-decoration: none;
}


.affix {
    background-color: #000000;
}

.search{
    height: 40px;
    width: 100px;
    background-color: #e5eeff;
    border: 2px solid #698aff;
    border-radius: 10px;
    width: 80%;
    padding: 2px 10px;
}.search:focus{
    outline: none;
    border-color: #3fb800;
}

.cg-m{
    grid-template-columns: 80% 10% 10%;
}

.icono{
    font-size: 2rem;
    color: #698aff;
    cursor: pointer;
}.icono:hover{
    color: #3fb800;
}

.btnVolver{
    background-color: #e5eeff;
    border-radius: 10px;
    padding: 2px 20px;
    border: 2px solid #698aff;
}.btnVolver:hover{
    background-color: #3fb800;
}
</style>
<nav class="menu">
        <div class="Contenedor" style="height: 100%;">
            <div class="logo at" style="height: 100%;">
                <a href="index.php" class="fl" style="font-size: 3rem;">
                    <b style="color: #006847;">MÉ</b><b style="color: #ffffff; -webkit-text-stroke: .1px #473101;">XI</b><b style="color: #CE1125;">CO</b>
                </a>
            </div>
            <!--Menu-->
            <div class="cg cg-m" style="height: 100%;">
                    <div class="at">
                        <input type="text" name="search" class="search" placeholder="Estado / Destino">
                    </div>
                    <div class="at">
                        <ion-icon name="chatbubbles-outline" class="icono" onclick="ir('chatBot.php')"></ion-icon>
                    </div>
                    <div class="at" id="MiPerfil">
                        <ion-icon name="grid-outline" class="icono" data-bs-toggle="modal" data-bs-target="#exampleModal"></ion-icon>
                    </div>
                    <div class="at" id="Volver">
                        <button class="btnVolver fp" onclick="ir('<?php echo $ruta; ?>')"><b>Volver</b></button>
                    </div>
            </div>
        </div>
    </nav>

<!-- Jquery needed -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/scripts.js"></script>

<!-- Function used to shrink nav bar removing paddings and adding black background -->
<script>
    $(window).scroll(function() {
        if ($(document).scrollTop() > 50) {
            $('.menu').addClass('affix');
        } else {
            $('.menu').removeClass('affix');
        }
    });

    function ir(ruta){
        window.location.href = ruta;
    }
</script>