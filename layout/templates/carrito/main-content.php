<?php
  /*require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
  require($BASE_ROOT_FOLDER_PATH.'classes/Carrito.php');
  $carrito = new Carrito();
  $registros = $carrito->getAll(); //obtenemos todos los registros de la tabla*/
  //echo $_SESSION['module_title'];
?>

<div class="container">
    <div class="row align-items-center py-5" id="show-content">
      <div class="col-12 text-center">
        <h1 class="py-4 text-white pb-3">CARRITO DE COMPRAS</h1>
      </div>
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
              /*if(count($registros) < 1){
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
                      <input type="button" value="Borrar" onClick="borrar_registro(<?php echo $fila['idCarrito']; ?>);">
                      <input type="button" value="Editar" onClick="editar_registro(<?php echo $fila['idCarrito']; ?>);">
                  </td>
                </tr>
            <?php
                }
              }*/
            ?>
          </tbody>
        </table>
      </div>    
    </div>
</div>