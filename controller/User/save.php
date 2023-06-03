<?php
  require_once ('../../configs/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/User.php');

  
  if(!empty($_POST['usernames'] && $_POST['passwords'] && $_POST['confirmPasswords'] && $_POST['emails'])){
    
    $user = new User();

    $num_rows = count($_POST['usernames']);

    for($i = 0; $i < $num_rows; $i++){   

      $password = $_POST['passwords'];
      $confirmPassword = $_POST['confirmPasswords'];

      if ($password == $confirmPassword) {

        $user->createUser($_POST['userName'], $_POST['userPassword'], $_POST['userEmail']);

      }else {
        echo ("Las contraseñas ingresadas no son iguales, por favor verificar de nuevo.");
      }
    }

  }else{
    echo ("Por favor, completar todos los campos");
  }

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;
    