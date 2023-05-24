<div id="container" class="fs-3">
    <div class="row g-3 p-3 my-2 mx-2 fs-1">
      <div class="col-12">Aquí deberan cargar el logo, header  y el menú</div>
      <div class="col-12 fs-6">
        <a href="<?php echo $WEB_PATH ?>modules/productos/index.php">Productos</a>|
        <a href="<?php echo $WEB_PATH ?>modules/facturacion/main-content.php">Facturación</a>|
        <a href="<?php echo $WEB_PATH ?>modules/productos/index.php">Seguridad</a>|
        <a href="<?php echo $WEB_PATH ?>modules/productos/index.php">Ventas</a>
      </div>
      <div class="col-12  fs-2">Página main content del modulo general</div>
    </div>
    <form action="bill-processing.php" method="post">
        <div class="row g-3 p-3 m-2">
          <div class="col-3 odd">
            <div class="col-12">
                <label class="form-label">Producto</label>
            </div>
            <div class="col-12">
              <select id="producto_0" name="producto[]" class="form-control">
                <option value="3500">Arroz Libra</option>
                <option value="2980">Azucar Libra</option>
                <option value="8500">Atún en Agua</option>
                <option value="3200">Panela (Atado)</option>
                <option value="6790">Aceite Litro</option>
                <option value="4100">Lenteja Libra</option>
                <option value="3950">Arbeja Libraa</option>
                <option value="6890">Frijol Libra</option>
                <option value="970">Agua Botella 500 ML</option>
                <option value="11200">Salchicha x 12 und</option>
                </select>
            </div> 
          </div>
          <div class="col-3 odd">
            <div class="col-12">
                <label class="form-label">Cantidad</label>
            </div>
            <div class="col-12">
              <input type="number" class="form-control" id="cantidad_0" name="cantidad[]">
            </div> 
          </div>
          <div class="col-3 odd">
            <div class="col-12">
                <label class="form-label">Tiene IVA?</label>
            </div>
            <div class="col-12">
              <select id="tiene_iva_0" name="tiene_iva[]" class="form-control" onchange="enableTaxValue(0)">
                <option value="S">Si</option>
                <option value="N" selected>No</option>
              </select>
            </div> 
          </div>
          <div class="col-3 odd">
            <div class="col-12">
                <label class="form-label">% IVA</label>
            </div>
            <div class="col-12">
              <input type="number" class="form-control" id="iva_0" name="iva[]"  value="0" readonly>
            </div> 
          </div>
        </div>
        <div id="container-new" class="row g-3 p-3 m-2"></div>
        <div class="row g-3 p-3 my-2 mx-2">
        <div class="col-4">
          <input type="button" value="Adicionar Linea" id="addLineBtn" onclick="addLine();">
        </div>
        <div class="col-4">
          <input type="button" value="Calcular Total" id="addLineBtn" onclick="totalCalculation();">
        </div> 
        <div class="col-4">
          <input type="submit" value="Enviar">
        </div> 
      </div>
    </form>
      
      
      <div class="row g-3 p-3 my-2 mx-5">
        <div class="col-12">                
            <label for="total_factura" class="fs-3 fw-bold">Total Factura: </label>                
            <span id="total_factura" class="fs-3 fw-bolder">0.0</span>
        </div>

        <div class="col-12">
            <label for="total_iva_factura" class="fs-3 fw-bold">Total IVA Factura: </label>
            <span id="total_iva_factura" class="fs-3 fw-bolder">0.0</span>
        </div>

        <div class="col-12">
            <label for="promedio_producto" class="fs-3 fw-bold">Precio Promedio Producto:</label>
            <span id="promedio_producto" class="fs-3 fw-bolder">0.0</span>
        </div>
      </div>
</div>