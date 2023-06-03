<?php
    require_once ('../../configs/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
    require_once($BASE_ROOT_FOLDER_PATH.'classes/Venta.php');
    $id = $_GET['id'];

    $venta = new Venta();
    $datos = $venta->getById($id);
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
  <title>Factura</title>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/bootstrap/';?>css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/bootstrap/';?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/style.css" />
</head>
<body>
  <br>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">Factura</span>
      </div>
    </div>
    
    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-4">Datos de la venta</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row g-3 align-items-center">
      <input type="hidden" name="id" value="<?php echo $datos['idVenta'];?>">
      <div class="px-4 py-2 row">
        <label for="estadoVenta" class="col-6 col-form-label fw-bolder">Estado</label>
        <div class="col-6">
          <input id="estadoVenta" type="text" class="bg-trasnparent border border-0" name="nombreVenta" value="<?php echo $datos['estadoVenta'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="nombreEmpresa" class="col-6 col-form-label fw-bolder"></label>
        <div class="col-6">
          <input id="nombreEmpresa" type="text" class="bg-trasnparent border border-0" name="nombreEmpresa" value="TEMPUS FUGIT" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="telefonoEmpresa" class="col-6 col-form-label fw-bolder">Telefono de la empresa</label>
        <div class="col-6">
        <input id="telefonoEmpresa" type="text" class="bg-trasnparent border border-0" name="telefonoEmpresa" value="<?php echo $datos['telefonoEmpresa'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="fechaRealizacionVenta" class="col-6 col-form-label fw-bolder">Fecha de venta</label>
        <div class="col-6">
          <input id="fechaRealizacionVenta" type="number" class="bg-trasnparent border border-0" name="fechaRealizacionVenta" value="<?php echo $datos['fechaRealizacionVenta'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="clienteVenta" class="col-6 col-form-label fw-bolder">Id del Cliente</label>
        <div class="col-6">
          <input id="clienteVenta" type="text" class="bg-trasnparent border border-0" name="clienteVenta" value="<?php echo $datos['idCliente'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="totalVenta" class="col-6 col-form-label fw-bolder">Total a pagar</label>
        <div class="col-6">
          <input id="totalVenta" type="text" class="bg-trasnparent border border-0" name="totalVenta" value="<?php echo $datos['totalVenta'];?>" disabled>
        </div>
      </div>
    </div>

    <br><br>
  </div>
</body>
</html>

<?php
    //header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    //exit;