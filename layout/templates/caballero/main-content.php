<?php
require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
require_once($BASE_ROOT_FOLDER_PATH.'classes/Reloj.php');
$reloj = new Reloj();
$registros = $reloj->getAll(); ?>
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
          <h5 class="card-title"><?php echo $row['name']; ?></h5>
          <div class="text">
          <p class="card-text">
            Esta es una tarjeta más larga con texto de apoyo a continuación como
            introducción natural a contenido adicional. Este contenido es un
            poco más largo.
          </p>
          </div>
          <a href="#" class="btn btn-primary d-flex justify-content-center ">Añadir   <i class="bi bi-cart3"></i></a>
         
        </div>
      </div>
    </div>
    <?php
                }
                
              }
            ?>
  </div>
</div>
