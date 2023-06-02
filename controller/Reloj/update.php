<?php
  require_once ('../../configs/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/Reloj.php');
  
  if(!empty($_POST['id'])){
    
    $reloj = new Reloj();
    $reloj->update( $_POST['id'], $_POST['nombreReloj'], $_POST['modeloReloj'], $_POST['tipoReloj'], $_POST['precioReloj']);
  }

  //echo '<pre>';
  //print_r($_POST);
  //echo '</pre>';

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;