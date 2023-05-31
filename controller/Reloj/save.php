<?php
  require_once ('../../config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Reloj.php');
  
  if(!empty($_POST['nombreReloj'])){
    
    $reloj = new Reloj();

    $num_rows = count($_POST['nombreReloj']);

    for($i = 0; $i < $num_rows; $i++){   
                  
      $ideReloj = $_POST['idReloj'][$i];
      $nombreReloj =  $_POST['nombreReloj'][$i];
      $modeloReloj =  $_POST['modeloReloj'][$i];
      $idTipoReloj =  $_POST['idTipoReloj'][$i];
      $precioReloj =  $_POST['precioReloj'][$i];

      $reloj->save( $ideReloj, $nombreReloj, $modeloeReloj, $idTipoReloj, $precioReloj);
    }
  }

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;