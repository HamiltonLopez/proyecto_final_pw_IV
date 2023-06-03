<?php
    require_once ('../../configs/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/User.php');
    $idUser = $_GET['idUser'];

    $user = new User();

    $user->delete($idUser);

    header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    exit;