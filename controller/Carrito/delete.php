<?php
    require_once ('../../configs/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
    $idCarrito = $_GET['idCarrito'];

    $carrito = new Carrito();

    $carrito->removeProduct($idCarrito);

    header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    exit;