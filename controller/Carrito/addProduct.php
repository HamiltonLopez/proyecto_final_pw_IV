<?php
  require_once ('config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
  
  $carrito = new Carrito();

  $carrito->addProduct();

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;
    