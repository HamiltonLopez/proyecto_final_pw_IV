<?php
  require_once ('../../configs/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/Venta.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/DetalleVenta.php');

 
  
  if(!empty($_POST['empresa'])){
    
    $venta = new Venta();

    


    $idVenta= 1;
      $name =  $_POST['empresa'];
      $telefono =  $_POST['telefono'];
      $fecha =  $_POST['fecha'];
      $id =  $_POST['clientes'];
      $venta->crearVenta($name,$telefono,$id,$fecha);

      $carrito = new Carrito();
      $detalle = new DetalleVenta();
      $registros = $carrito->getAll(); 
      foreach($registros as $fila){
         $idVenta= 1;
         $idReloj = $fila['idReloj'];
         $cantidad = $fila['cantidadRelojes'];

         $detalle->addProduct($idVenta,$idReloj,$cantidad);
      }
      $idVenta+= 1;

    }
  

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;
    