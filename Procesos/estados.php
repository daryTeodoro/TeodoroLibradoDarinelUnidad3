<?php
include('conexion.php');

$conexion= new conexion();
$query=$conexion->prepare('SELECT * FROM estados ORDER BY estado ASC');
$query->execute();
$count=$query->rowCount(); 

if ($count > 0) {

    while($campo=$query->fetch(PDO::FETCH_ASSOC)) {
        echo'
          <div class="at mb-4">
            <div class="card fst" style="width: 18rem;border: 2px solid #000000;">
              <img src="'. $campo['escudo'] .'" alt="'. $campo['estado'] .'" style="height: 14rem;background-color: #ffffff;margin: 10px 10px 0px;">
              <div class="card-body">
                <h4 class="card-text">'. $campo['estado'] .'</h4>
              </div>
            </div>
          </div>';
    }

} else {
    echo 'Sin Registros';
}
?>