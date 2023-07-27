<?php
include('conexion.php');

$conexion= new conexion();
$query=$conexion->prepare('SELECT * FROM estados ORDER BY estado ASC');
$query->execute();
$count=$query->rowCount(); 

if ($count > 0) {

    while($campo=$query->fetch(PDO::FETCH_ASSOC)) {
        echo'
        <form method="post" action="">
          <div class="at mb-4">
            <button type="submit" name="state" class="card fst" style="width: 18rem;border: 2px solid #000000;" value="'. $campo['idstate'] .'">
              <div style="width: 100%;">
                <img src="'. $campo['escudo'] .'" alt="'. $campo['estado'] .'" style="height: 14rem;background-color: #fff;margin: 15px 10px 0px;">
              </div>
              <div class="card-body" style="width: 100%;">
                <h4 class="card-text">'. $campo['estado'] .'</h4>
              </div>
            </button>
          </div>
        </form>';
    }

} else {
    echo 'Sin Registros';
}
?>