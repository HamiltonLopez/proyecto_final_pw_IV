<?php
  require_once ('config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Persona.php');
  
  if(!empty($_POST['name'])){
    
    $persona = new Persona();

    $num_rows = count($_POST['name']);

    for($i = 0; $i < $num_rows; $i++){   
                  
      $name =  $_POST['name'][$i];
      $lastname =  $_POST['lastname'][$i];
      $document_type =  $_POST['document_type'][$i];
      $document =  $_POST['document'][$i];
      $address =  $_POST['address'][$i];
      $phone =  $_POST['phone'][$i];
      $email =  $_POST['email'][$i];
      $birthday =  $_POST['birthday'][$i];

      $persona->save( $name, $lastname, $document_type, $document, $address, $phone, $email, $birthday);
    }
  }

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;
    