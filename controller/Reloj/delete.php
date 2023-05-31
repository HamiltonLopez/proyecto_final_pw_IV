<?php
    require_once('../../configs/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/Reloj.php');
    $id = $_GET['idReloj'];


    $reloj = new Reloj();

    $reloj->delete($id);

    header('Location: '.'../../index.php'); // Forma de redireccionar hacia la pagina principal (index.php)
    exit;