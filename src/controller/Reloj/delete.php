<?php
   require_once ('../../configs/database.php');
   require_once('../../classes/Reloj.php');
    $id = $_GET['id'];

    $reloj = new Reloj();

    $reloj->delete($id);
   
    
    header('Location: '.'../../index.php'); // Forma de redireccionar hacia la pagina principal (index.php)
    exit;