<?php
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Venta.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/DetalleVenta.php');
  $venta = new Venta();
  $registros = $venta->getAll(); //obtenemos todos los registros de la tabla
  
?>

<div class="container" id="main-content">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">HISTORIAL DE VENTAS</span>
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
            <th>Estado Venta</th>
            <th>Empresa</th>
            <th>Teléfono Empresa</th>
            <th>Nombre Cliente</th>
            <th>Apellido Cliente</th>
            <th>Fecha Venta</th>
            <th>Total Venta</th>
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
                  <td><?php echo $fila['estadoVenta']?></td>
                  <td><?php echo $fila['nombreEmpresa']?></td>
                  <td><?php echo $fila['telefonoEmpresa']?></td>
                  <td><?php echo $fila['nombreCliente']?></td>
                  <td><?php echo $fila['apellidoCliente']?></td>
                  <td><?php echo $fila['fechaRealizacionVenta']?></td>
                  <td><?php echo $fila['totalVenta']?></td>
                  <td>
                      <input type="button" class="button-show" value="Ver" onClick="show_detail(<?php echo $fila['idVenta']; ?>);">
                      <input type="button" class="button-anular" value="Anular" onClick="anular_venta(<?php echo $fila['idVenta']; ?>);">
                  </td>
                </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</div>