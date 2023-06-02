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
  <title>Edicion del usuario</title>
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
        <span class="fw-bolder fs-4">Datos del usuario</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <form class="row g-3 align-items-center" action="<?php echo $BASE_ROOT_URL_PATH;?>includes/update.php" method="post">
      <input type="hidden" name="id" value="<?php echo $datos['idUser'];?>">
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">UserName</label>
        <div class="col-6">
          <input type="text" class="form-control" name="userName" value="<?php echo $datos['userName'];?>" readonly>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Password</label>
        <div class="col-6">
          <input type="text" class="form-control" name="userPassword" value="<?php echo $datos['userPassword'];?>" require>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Password</label>
        <div class="col-6">
          <input type="text" class="form-control" name="userPassword" value="<?php echo $datos['userPassword'];?>" require>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="name" class="col-6 col-form-label fw-bolder">Email</label>
        <div class="col-6">
          <input type="text" class="form-control" name="userEmail" value="<?php echo $datos['userEmail'];?>" require>
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