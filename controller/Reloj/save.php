<?php
  require_once ('../../configs/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/Reloj.php');
  
  if(!empty($_POST['name'])){
    
    $reloj = new Reloj();

    $num_rows = count($_POST['name']);

    for($i = 0; $i < $num_rows; $i++){   
                  
      $idReloj = $_POST['ids'][$i];
      $nombreReloj =  $_POST['name'][$i];
      $modeloReloj =  $_POST['modelos'][$i];
      $idTipoReloj =  $_POST['type'][$i];
      $precioReloj =  $_POST['precio'][$i];

      $reloj->save( $idReloj,$nombreReloj, $modeloReloj,  $idTipoReloj, $precioReloj);
    }
  }

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;