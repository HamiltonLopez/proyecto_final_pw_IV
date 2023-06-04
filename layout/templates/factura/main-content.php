<?php
    require_once ('../../configs/config.php');
    require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
    require_once($BASE_ROOT_FOLDER_PATH.'classes/Venta.php');
    require_once($BASE_ROOT_FOLDER_PATH.'classes/DetalleVenta.php');
    $id = $_GET['id'];

    $venta = new Venta();
    $detalle = new DetalleVenta();
    $datos = $venta->getById($id);
    $datosReloj = $detalle->getRelojById($id);
?>

<div id="modal-factura" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Factura</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row g-3 align-items-center">
      <input type="hidden" name="id" value="<?php echo $datos['idVenta'];?>">
      <div class="px-4 py-2 row">
        <label for="estadoVenta" class="col-6 col-form-label fw-bolder">Estado</label>
        <div class="col-6">
          <input id="estadoVenta" type="text" class="bg-trasnparent border border-0" name="nombreVenta" value="<?php echo $datos['estadoVenta'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="nombreEmpresa" class="col-6 col-form-label fw-bolder"></label>
        <div class="col-6">
          <input id="nombreEmpresa" type="text" class="bg-trasnparent border border-0" name="nombreEmpresa" value="TEMPUS FUGIT" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="telefonoEmpresa" class="col-6 col-form-label fw-bolder">Telefono de la empresa</label>
        <div class="col-6">
        <input id="telefonoEmpresa" type="text" class="bg-trasnparent border border-0" name="telefonoEmpresa" value="<?php echo $datos['telefonoEmpresa'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="fechaRealizacionVenta" class="col-6 col-form-label fw-bolder">Fecha de venta</label>
        <div class="col-6">
          <input id="fechaRealizacionVenta" type="number" class="bg-trasnparent border border-0" name="fechaRealizacionVenta" value="<?php echo $datos['fechaRealizacionVenta'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="relojVenta" class="col-6 col-form-label fw-bolder">Reloj</label>
        <div class="col-6">
          <input id="relojVenta" type="number" class="bg-trasnparent border border-0" name="relojVenta" value="<?php echo $datosReloj['nombreReloj'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="cantidadRelojVenta" class="col-6 col-form-label fw-bolder">Cantidad de Relojes</label>
        <div class="col-6">
          <input id="cantidadRelojVenta" type="number" class="bg-trasnparent border border-0" name="cantidadRelojVenta" value="<?php echo $datosReloj['cantidadRelojes'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="clienteVenta" class="col-6 col-form-label fw-bolder">Id del Cliente</label>
        <div class="col-6">
          <input id="clienteVenta" type="text" class="bg-trasnparent border border-0" name="clienteVenta" value="<?php echo $datos['idCliente'];?>" disabled>
        </div>
      </div>
      <div class="px-4 py-2 row">
        <label for="totalVenta" class="col-6 col-form-label fw-bolder">Total a pagar</label>
        <div class="col-6">
          <input id="totalVenta" type="text" class="bg-trasnparent border border-0" name="totalVenta" value="<?php echo $datos['totalVenta'];?>" disabled>
        </div>
      </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>