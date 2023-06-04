<?php
  require_once ('../../configs/database.php');
  require_once('../../classes/Carrito.php');
  require_once('../../classes/Cliente.php');
  $carrito = new Carrito();
  $registros = $carrito->getAll(); //obtenemos todos los registros de la tabla
  $cliente = new Cliente();
  $clientes = $cliente->getAll();
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

  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
  <script src="<?php echo $BASE_ROOT_URL_PATH.'assets/bootstrap/';?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../assets/css/venta/style.css" />
</head>
<body>
  <br>
  <div class="container">
  <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3 text-center">CLIENTES :</span>
      </div>
    </div>
    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center" >
       <span>ELIGE UN CLIENTE :</span>
       <select name="clientes" class="form-select-lg mb-3" aria-label="Default select example">
       <option value="">Selecciona alguno</option>
      <?php
      if(count($clientes)<1){
      ?>
        <option value="">No hay clientes</option>
      <?php
      }else{
        
        foreach($clientes as $index => $fila){
      ?>
        <option value="<?php echo $fila['idCliente']?>"><?php echo $fila['nombreCliente']?> : CC : <?php echo $fila['idCliente']?> </option>
      <?php
      }
    }
     ?>

    </select>

    </div>
    


    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3 text-center">LISTA DE COMPRA</span>
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
            <th>Precio</th>
       
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
                  <td><?php echo $fila['precioReloj']?></td>
                  
                </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>    
      <div class="col-12 text-center" id="action-button-container">
        <input type="button" class="btn-clean" value="GENERAR" onClick="limpiar_carrito();">
      </div>
    </div>
   
</div>
</body>
</html>

<?php
 ?>