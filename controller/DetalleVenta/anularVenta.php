<?php
   require_once ('../../configs/config.php');
   require_once ('../../configs/database.php');
   require_once('../../classes/Venta.php');
    $idVenta = $_GET['idVenta'];

    $venta = new Venta();

    $venta->anularVenta($idVenta);

    header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
   exit;