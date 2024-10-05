<?php
require_once ('../../configs/config.php');
require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
require_once($BASE_ROOT_FOLDER_PATH.'classes/User.php');

if(!empty($_POST['id'])){
  
  $user = new User();
  $user->updateUser( $_POST['id'], $_POST['userPassword'], $_POST['userName'], $_POST['userEmail']);
}

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
exit;