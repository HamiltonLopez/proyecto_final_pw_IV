<?php
    require_once ('../../configs/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
    $idCarrito = $_GET['idCarrito'];

    $carrito = new Carrito();
    $datos = $carrito->getProduct($idCarrito);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <title>Edición y guardado de datos de forma dinámica con Javascript y PHP</title>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/style.css" />
</head>
<body>
  <br>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">Edición y guardado de datos de forma dinámica con Javascript y PHP</span>
      </div>
    </div>
    
    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-4">Datos del Reloj</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <form class="row g-3 align-items-center" action="<?php echo $BASE_ROOT_URL_PATH;?>controller/Carrito/update.php" method="post">
      <input type="hidden" name="idCarrito" value="<?php echo $datos['idCarrito'];?>">
      <div class="px-4 py-2 row">
        <label for="nombreReloj" class="col-6 col-form-label fw-bolder">Nombre Reloj</label>
        <div class="col-6">
          <input type="text" class="form-control" name="nombreReloj" value="<?php echo $datos['nombreReloj'];?>" placeholder="Ingrese nombre" readonly>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="tipoReloj" class="col-6 col-form-label fw-bolder">Tipo Reloj</label>
        <div class="col-6">
          <input type="text" class="form-control" name="tipoReloj" value="<?php echo $datos['tipoReloj'];?>" placeholder="Ingrese nombre" readonly>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="modeloReloj" class="col-6 col-form-label fw-bolder">Modelo Reloj</label>
        <div class="col-6">
          <input type="text" class="form-control" name="modeloReloj" value="<?php echo $datos['modeloReloj'];?>" placeholder="Ingrese nombre" readonly>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="cantidadRelojes" class="col-6 col-form-label fw-bolder">Cantidad Relojes</label>
        <div class="col-6">
          <input type="number" class="form-control" name="cantidadRelojes" value="<?php echo $datos['cantidadRelojes'];?>" readonly>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <div class="col-3">&nbsp;</div>
        <div class="col-6">
          <input type="submit" class="form-control btn btn-primary" name="submit" value="Actualizar" require>
        </div>
        <div class="col-3">&nbsp;</div>
      </div>
    </form>

    <br><br>
  </div>
</body>
</html>

<?php
    //header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    //exit;