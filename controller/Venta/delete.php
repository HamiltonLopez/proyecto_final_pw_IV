<?php
    require_once ('config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/Persona.php');
    $id = $_GET['id'];

    $persona = new Persona();

    $persona->delete($id);

    header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    exit;