<?php
    require_once ('config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/User.php');
    $idUser = $_GET['idUser'];

    $user = new User();

    $user->delete($idPersona);

    header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    exit;