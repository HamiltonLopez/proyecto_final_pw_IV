<?php
  require_once ('../../configs/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/User.php');

  if(!empty($_POST['userName'])){
    
    $user = new User();

    if(!empty($_POST['userName']) && $_POST['userPassword'] && $_POST['confirmPassword'] && $_POST['userEmail']){

      $password = $_POST['userPassword'];
      $confirmPassword = $_POST['confirmPassword'];

      if ($password == $confirmPassword) {

        $user->createUser($_POST['userName'], $_POST['userPassword'], $_POST['userEmail']);

      }else {
        echo ("Las contraseñas ingresadas no son iguales, por favor verificar de nuevo.");
      }
    }else{
      echo ("Por favor, completar todos los campos");
    }
  }

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;
    