<?php
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
  $carrito = new Carrito();
  $registros = $carrito->getAll(); //obtenemos todos los registros de la tabla
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
  <div class="container" id="main-content">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">CARRITO DE COMPRAS</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center" id="show-content">
      <div class="table-responsive">
        <table class="table table-bordered align-middle" id="edit-table">
          <thead class="table-light">
            <th>#</th>
            <th>Nombre Reloj</th>
            <th>Tipo Reloj</th>
            <th>Modelo Reloj</th>
            <th>Cantidad</th>
            <th>Acción</th>
          </thead>
          <tbody>
            <?php
            if(count($registros) < 1){
            ?>
              <tr>
                <td colspan="7">No hay registros</td>
              </tr>
            <?php
              } else {

                foreach($registros as $index => $fila) {
            ?>
                <tr>
                  <td><?php echo ($index + 1)?></td>
                  <td><?php echo $fila['nombreReloj']?></td>
                  <td><?php echo $fila['nombreTipo']?></td>
                  <td><?php echo $fila['modeloReloj']?></td>
                  <td><?php echo $fila['cantidadRelojes']?></td>
                  <td>
                      <input type="button" class="button-delete" value="Borrar" onClick="borrar_registro(<?php echo $fila['idCarrito']; ?>);">
                      <input type="button" class="button-edit" value="Editar" onClick="editar_registro(<?php echo $fila['idCarrito']; ?>);">
                  </td>
                </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>    
      <div class="col-12 text-center" id="action-button-container">
        <input type="button" class="btn-clean" value="Limpiar Carrito" onClick="limpiar_carrito();">
      </div>
    </div>
</div>
</body>
</html>

<?php
    //header('Location: '.$BASE_ROOT_URL_PATH); // Forma de redireccionar hacia la pagina principal (index.php)
    //exit;