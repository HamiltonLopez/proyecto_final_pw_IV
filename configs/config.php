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
        'active_carrito' => false,
        'active_ventas' => false,
    ];

    $module_title = [
        'home' => 'Home!',
        'caballero' => 'Caballero!',
        'dama' => 'Dama!',
        'producto' => 'Producto!',
        'about' => 'About!',
        'login' => 'Login!',
        'carrito' => 'Carrito!',
        'ventas' => 'Ventas!'
    ];

    session_start();

    if(empty($_SESSION['module_name'])){
        $_SESSION['module_name'] = 'home';
        $_SESSION['module_title'] = $module_title[$_SESSION['module_name']];
    }
    
    // config.php o el archivo que mostraste
    $BASE_ROOT_FOLDER_PATH = '/var/www/html/';          // Ruta interna del contenedor
    $BASE_ROOT_URL_PATH    = 'http://localhost:8080/';   // URL pública

    $menu['active_'.$_SESSION['module_name']] = true;
?>
