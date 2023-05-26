<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $menu = [
        'active_home' => false,
        'active_caballero' => false,
        'active_dama' => false,
        'active_producto' => false,
        'active_about' => false,
        'active_login' => false,
        'active_module5' => false,
        'active_module6' => false,
        'active_module7' => false,
        'active_module8' => false,
    ];

    $module_title = [
        'home' => 'Home!',
        'caballero' => 'Caballero!',
        'dama' => 'Dama!',
        'producto' => 'producto!',
        'about' => 'About!',
        'login' => 'Login!',
        'module5' => 'Module 5!',
        'module6' => 'Module 6!',
        'module7' => 'Module 7!',
        'module8' => 'Module 8!',
    ];

    session_start();

    if(empty($_SESSION['module_name'])){
        $_SESSION['module_name'] = 'home';
        $_SESSION['module_title'] = $module_title[$_SESSION['module_name']];
    }
    
    $BASE_ROOT_FOLDER_PATH = 'C:/xampp/htdocs/tempus_fugit/';;
    $BASE_ROOT_URL_PATH = 'http://localhost/tempus_fugit/';

    $menu['active_'.$_SESSION['module_name']] = true;
?>
