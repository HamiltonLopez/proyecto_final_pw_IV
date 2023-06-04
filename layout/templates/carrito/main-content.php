<?php
  require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
  $carrito = new Carrito();
  $registros = $carrito->getAll(); //obtenemos todos los registros de la tabla
?>

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
            <th>Precio Unitario</th>
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
                  <td><?php echo $fila['precioReloj']?></td>
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
      <div class="col-12 text-center" id="action-button-container">
        <input type="button" class="btn-clean" value="Continuar" onClick="generar_venta();">
      </div>
    </div>
</div>