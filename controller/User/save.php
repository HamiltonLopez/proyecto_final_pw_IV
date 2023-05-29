<?php
  require_once ('config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/User.php');
  
  if(!empty($_POST['userName'])){
    
    $user = new User();

    $num_rows = count($_POST['userName']);

    for($i = 0; $i < $num_rows; $i++){   
                  
      $idUser =  $_POST['idUser'][$i];
      $userName =  $_POST['userName'][$i];
      $userPassword =  $_POST['userPassword'][$i];
      $userEmail =  $_POST['userEmail'][$i];

      $user->save( $idUser, $userName, $userPassword, $userEmail);
    }
  }

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;
    