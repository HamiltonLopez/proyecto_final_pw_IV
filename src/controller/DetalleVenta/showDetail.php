<?php
  require_once ('../../configs/database.php');
  require_once('../../classes/DetalleVenta.php');
  $detalleVenta = new DetalleVenta();
  $idVenta = $_GET['idVenta'];
  $registros = $detalleVenta->getProducts($idVenta); //obtenemos todos los registros de la tabla
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
  <title>Generación de compra</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/bootstrap/';?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../assets/css/ventas/style.css" />
  <link rel="stylesheet" href="../../assets/css/footer/style.css" />
</head>
<body>
  <br>
    <div class="container" id="main-content">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">DETALLE DE LA VENTA</span>
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
            <th>Venta</th>
            <th>Marca Reloj</th>
            <th>Tipo Reloj</th>
            <th>Modelo Reloj</th>
            <th>Cantidad Relojes</th>
            <th>Precio Unitario</th>
          </thead>
          <tbody>
            <?php
                foreach($registros as $index => $fila) {
            ?>
                <tr>
                  <td><?php echo ($index + 1)?></td>
                  <td><?php echo $fila['idVenta']?></td>
                  <td><?php echo $fila['nombreReloj']?></td>
                  <td><?php echo $fila['nombreTipo']?></td>
                  <td><?php echo $fila['modeloReloj']?></td>
                  <td><?php echo $fila['cantidadRelojes']?></td>
                  <td><?php echo $fila['precioReloj']?></td>
                </tr>
            <?php
                }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    </div>
    <?php 
        require_once('../../layout/partials/footer.php')
    ?>
</body>
</html>