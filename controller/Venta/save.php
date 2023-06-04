<?php
  require_once ('../../configs/config.php');
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/Venta.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
  require_once($BASE_ROOT_FOLDER_PATH.'classes/DetalleVenta.php');

 
  
  if(!empty($_POST['empresa'])){
    
    $venta = new Venta();


      $name =  $_POST['empresa'];
      $telefono =  $_POST['telefono'];
      $fecha =  $_POST['fecha'];
      $id =  $_POST['clientes'];
      $venta->crearVenta($name,$telefono,$id,$fecha);
      $maximo = $venta->getID();
      $total = count($maximo);

      $carrito = new Carrito();
      $detalle = new DetalleVenta();
      $registros = $carrito->getAll(); 
      $idVenta=0;
     
      foreach($registros as $fila){
         $idVenta= $maximo['maximo'];
         $idReloj = $fila['idReloj'];
         $cantidad = $fila['cantidadRelojes'];

         $detalle->addProduct($idVenta,$idReloj,$cantidad);
      }
      $venta->calcularTotal($maximo['maximo']);
     

    }
  

  header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
  exit;
    