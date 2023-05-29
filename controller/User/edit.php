<?php
    require_once ('config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'includes/database.php');
    require($BASE_ROOT_FOLDER_PATH.'classes/User.php');
    $idUser = $_GET['idUser'];

    $user = new User();
    $datos = $user->getById($idUser);
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
        <span class="fw-bolder fs-3">Edición del usuario</span>
      </div>
    </div>
    
    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-4">Datos del usuario.</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <form class="row g-3 align-items-center" action="<?php echo $BASE_ROOT_URL_PATH;?>includes/update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $datos['id'];?>">
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Nombre</label>
        <div class="col-6">
          <input type="text" class="form-control" name="name" value="<?php echo $datos['name'];?>" placeholder="Ingrese nombre" required>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Apellido</label>
        <div class="col-6">
          <input type="text" class="form-control" name="lastname" value="<?php echo $datos['lastname'];?>" placeholder="Ingrese apellido">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Dirección</label>
        <div class="col-6">
          <input type="text" class="form-control" name="address" value="<?php echo $datos['address'];?>" placeholder="Ingrese dirección">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Teléfono</label>
        <div class="col-6">
          <input type="text" class="form-control" name="phone" value="<?php echo $datos['phone'];?>" placeholder="Ingrese teléfono">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Correo electrónico</label>
        <div class="col-6">
          <input type="email" class="form-control" name="email" value="<?php echo $datos['email'];?>" placeholder="Ingrese correo electrónico">
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Fecha de nacimiento</label>
        <div class="col-6">
          <input type="date" class="form-control" name="birthday" value="<?php echo $dateStr;?>" placeholder="Ingrese fecha de nacimiento">
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