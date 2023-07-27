<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.png" alt="favicon">
    <title>MEXICO ES MAGICO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--ESTILOS GENERALES-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
      .cg-c{
        grid-template-columns: 25% 25% 25% 25%;
      }


      .sc::-webkit-scrollbar { /* CSS scrollbar del body*/
        width: 3px;               
      }.sc::-webkit-scrollbar-track {
        background: #e0ecff;        
        border-radius: 10px;
      }.sc::-webkit-scrollbar-thumb {
          background-color: #8797ff;
          border-radius: 10px;
      }

      .cg-barra{
        height: 60px;
        grid-template-columns: 20% 70% 10%;
      }
    </style>
  </head>
  <body>

    <div class="bg-dark fixed-top cg cg-barra">
      <div class="at" style="padding: 0px 20px 0px 0px;">
        <img src="img/mexico.png" alt="logo" style="width: 50px; height: 50px;">
      </div>
      <div class="at">
        <input type="text" placeholder="Estado / Ciudad" style="padding: 5px 10px;margin-right: 20px;">
      </div>
      <div class="at">
        <ion-icon name="reorder-three-outline" style="color: white;font-size: 3rem;"></ion-icon>
      </div>
    </div>
    
    <!--Contenido-->
    <div class="sc" align="center" style="height: 100vh; overflow-y: auto;">
        
      <div align="center" style="margin: 80px 20px 30px;">
        <h1 class="ft">Bienvenido</h1>
        <h4 class="ft">Informate Sobre los Estados de México</h4>
      </div>

      <div class="cg cg-c" align="center">
        <?php include('Procesos/estados.php'); ?>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!--Libreria de Iconos-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>