<?php
  require_once('configs/config.php');
  require_once($BASE_ROOT_FOLDER_PATH.'layout/partials/header.php');
  require_once($BASE_ROOT_FOLDER_PATH."layout/templates/{$_SESSION['module_name']}/main-content.php");
  require_once($BASE_ROOT_FOLDER_PATH.'layout/partials/footer.php');