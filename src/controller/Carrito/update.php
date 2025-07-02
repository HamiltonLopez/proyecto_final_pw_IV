<?php
  require_once ('../../configs/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
  
  if(!empty($_POST['nombreReloj'])){
    
    $carrito = new Carrito();
    $carrito->updateCountProduct($_POST['idCarrito'], $_POST['cantidadRelojes']);
  }

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;