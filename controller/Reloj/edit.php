<?php
    require_once ('../../configs/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
    require_once($BASE_ROOT_FOLDER_PATH.'classes/Reloj.php');
    $id = $_GET['id'];

    $reloj = new Reloj();
    $datos = $reloj->getById($id);

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
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/bootstrap/';?>css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/bootstrap/';?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/style.css" />
</head>
<body>
  <br>
  <div class="container">
    <div class="row align-items-center">
    
    </div>
    
    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-4">Edición y guardado de datos de reloj.</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <form class="row g-3 align-items-center" action="<?php echo $BASE_ROOT_URL_PATH;?>controller/Reloj/update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $datos['idReloj'];?>">
      <div class="px-4 py-2 row">
        <label for="nombreReloj" class="col-6 col-form-label fw-bolder">Nombre</label>
        <div class="col-6">
          <input id="nombreReloj" type="text" class="form-control" name="nombreReloj" value="<?php echo $datos['nombreReloj'];?>" placeholder="Ingrese nombre" required>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="modeloReloj" class="col-6 col-form-label fw-bolder">Modelo</label>
        <div class="col-6">
          <input id="modeloReloj" type="text" class="form-control" name="modeloReloj" value="<?php echo $datos['modeloReloj'];?>" placeholder="Ingrese el modelo">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="tipoReloj" class="col-6 col-form-label fw-bolder">Tipo</label>
        <div class="col-6">
          <select name="tipoReloj" id="tipoReloj">
            <option value="1">Masculino</option>
            <option value="2">Femenino</option>
          </select>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="precioReloj" class="col-6 col-form-label fw-bolder">Precio</label>
        <div class="col-6">
          <input id="precioReloj" type="number" class="form-control" name="precioReloj" value="<?php echo $datos['precioReloj'];?>" placeholder="Ingrese el precio">
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