<?php
require_once __DIR__.'/../configs/config.php';   // aquí ya se hizo session_start()

if (!empty($_GET['active_module'])) {
    // Valida que exista la clave en $module_title para evitar notices
    if (isset($module_title[$_GET['active_module']])) {
        $_SESSION['module_name']  = $_GET['active_module'];
        $_SESSION['module_title'] = $module_title[$_SESSION['module_name']];
    } else {
        // Opcional: manejar módulo inválido
        $_SESSION['module_name']  = 'home';
        $_SESSION['module_title'] = $module_title['home'];
    }
}

header('Location: ' . $BASE_ROOT_URL_PATH);  // redirige al index
exit;
