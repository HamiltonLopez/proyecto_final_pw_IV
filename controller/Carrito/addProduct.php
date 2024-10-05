<?php
  require_once ('../../configs/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
  $idReloj = $_GET['idReloj'];
  $cantidadRelojes = 1;

  $carrito = new Carrito();
  $carrito->addProduct($idReloj, $cantidadRelojes);

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;
    