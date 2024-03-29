<?php
  $module = isset($_SESSION['module_name'])?$_SESSION['module_name'].'/':'';
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
  <title><?php echo isset($_SESSION['module_title'])?$_SESSION['module_title']:'Home';?></title>
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>bootstrap/css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/footer/style.css">
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH.'assets/';?>css/header/style.css">
  <link rel="stylesheet" href="<?php echo $BASE_ROOT_URL_PATH."assets/css/{$module}style.css"?>"; />

    <script>
      let module_name = 'home--';
      <?php if(isset($_SESSION['module_name'])){ ?>
        module_name ='<?php echo $_SESSION['module_name'];?>';
      <?php }?>

      <?php if(isset($BASE_ROOT_URL_PATH)){ ?>
        let BASE_ROOT_URL_PATH = '<?php echo $BASE_ROOT_URL_PATH; ?>';
      <?php }?>
    </script>
  
  <script src="<?php echo $BASE_ROOT_URL_PATH."assets/js/{$module}script.js"?>"></script>
  <script src="<?php echo $BASE_ROOT_URL_PATH."assets/js/{$module}actions.js"?>"></script>  
</head>
  <body>
  <div class="container">
      <header>
        <div class="head-row">
          <nav id="navbar" class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex justify-content-between">
            
              <img class="navbar-brand col-3" src="img/logo.png" alt="">
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item col-3">
                    <a class="nav-link<?php echo $menu['active_home']?' active':''?>" aria-current="page" href="<?php echo $BASE_ROOT_URL_PATH.'routes/controller.php?active_module=home'?>" href="#">Home</a>
                  </li>
                  <li class="nav-item col-3">
                    <a class="nav-link<?php echo $menu['active_caballero']?' active':''?>" aria-current="page" href="<?php echo $BASE_ROOT_URL_PATH.'routes/controller.php?active_module=caballero'?>" href="#">Caballero</a>
                  </li>
                  <li class="nav-item col-3">
                    <a class="nav-link<?php echo $menu['active_dama']?' active':''?>" aria-current="page" href="<?php echo $BASE_ROOT_URL_PATH.'routes/controller.php?active_module=dama'?>" href="#">Damas</a>
                  </li>
                  <li class="nav-item col-3">
                    <a class="nav-link<?php echo $menu['active_producto']?' active':''?>" aria-current="page" href="<?php echo $BASE_ROOT_URL_PATH.'routes/controller.php?active_module=producto'?>" href="#">Productos</a>
                  </li>
                  <li class="nav-item col-3">
                    <a class="nav-link<?php echo $menu['active_about']?' active':''?>" aria-current="page" href="<?php echo $BASE_ROOT_URL_PATH.'routes/controller.php?active_module=about'?>" href="#">About us</a>
                  </li>
                  <li class="nav-item col-3">
                    <a class="nav-link<?php echo $menu['active_login']?' active':''?>" aria-current="page" href="<?php echo $BASE_ROOT_URL_PATH.'routes/controller.php?active_module=login'?>" href="#">Login</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
      </div>
  </body>
</html>
