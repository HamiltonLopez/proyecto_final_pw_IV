<?php
require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
require_once($BASE_ROOT_FOLDER_PATH.'classes/Reloj.php');
$reloj = new Reloj();
$registros = $reloj->getByType(1); ?>
<div class="man container">
  <div
    class="cards row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4"
  >
    <?php
      if(count($registros) < 1){
    ?>

    <?php
      } else {
        foreach($registros as $index => $row) {
    ?>
    <?php
          
      $imagen = 'img/relojes/'. $index+1 .'/reloj.png';
    ?>
    <div class="clock col d-flex justify-content-center">
      <div class="card">
        <img src="<?php echo $imagen; ?>" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['nombreReloj']; ?></h5>

          <div class="text">
          <p><?php echo $row['idReloj'];?></p>
          <p class="card-text">
          Modelo :<?php echo $row['modeloReloj']; ?>
          </p>
          <p>Tipo : <?php echo $row['nombreTipo']; ?></p>
          <p>$ <?php echo $row['precioReloj']; ?></p>

         
        </div>
        <div class="d-flex justify-content-center">
          <input type="button" value="Añadir al carrito" class="btn btn-primary d-flex justify-content-center" onClick="añadir_producto(<?php echo $row['idReloj']; ?>);">
        </div>
      </div>
    </div>
  </div>
  <?php
        }
                
      }
    ?>
  </div>
</div>
