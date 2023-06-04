function show_detail(idVenta){
    location.replace(BASE_ROOT_URL_PATH+'controller/DetalleVenta/showDetail.php?idVenta='+idVenta);
}

function anular_venta(idVenta){
  swal({
    title: "Está seguro de anular la venta??",
    text: "Una vez eliminado, no se puede recuperar!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
     
      swal("Eliminado", location.replace(BASE_ROOT_URL_PATH+'controller/DetalleVenta/anularVenta.php?idVenta='+idVenta) ,{
      
        icon: "success",
        
        
      });
    } else {
      swal("Se canceló");
    }
  });
}
   /* if(confirm("Está seguro de anular la venta?")){
      location.replace(BASE_ROOT_URL_PATH+'controller/DetalleVenta/anularVenta.php?idVenta='+idVenta);
    }*/

  