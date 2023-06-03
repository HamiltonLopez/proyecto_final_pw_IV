<?php
    require_once ('../../configs/database.php');
    require_once('../../classes/User.php');

 
   
    $idUser = $_GET['id'];

    $user = new User();

    $user->deleteUser($idUser);

    header('Location: '.'../../index.php'); // Forma de redireccionar hacia la pagina principal (index.php)
    exit;