function show_detail(idVenta){
    location.replace(BASE_ROOT_URL_PATH+'controller/DetalleVenta/showDetail.php?idVenta='+idVenta);
}

function anular_venta(idVenta){
    if(confirm("Está seguro de anular la venta?")){
      location.replace(BASE_ROOT_URL_PATH+'controller/DetalleVenta/anularVenta.php?idVenta='+idVenta);
    }
  }