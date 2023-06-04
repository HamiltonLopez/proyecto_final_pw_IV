
function borrar_registro(idCarrito){
   /* if(confirm("Está seguro de eliminar el registro?")){
      location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/delete.php?idCarrito='+idCarrito);
    }*/
    swal({
        title: "Estás seguro de eliminar el registro?",
        text: "Una vez eliminado, no se puede recuperar!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
         
          swal("Eliminado", location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/delete.php?idCarrito='+idCarrito) ,{
          
            icon: "success",
            
            
          });
        } else {
          swal("Se canceló");
        }
      });
}
  
function editar_registro(idCarrito){
    location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/edit.php?idCarrito='+idCarrito);
}

function limpiar_carrito(){
  swal({
    title: "Estás seguro de limpiar el carrito?",
    text: "Una vez eliminado, no se puede recuperar!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
     
      swal("Limpiado", location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/clearCar.php') ,{
      
        icon: "success",
        
        
      });
    } else {
      swal("Cancelado");
    }
  });
    
}
function generar_venta(total){

  if(total<1){
    swal("AGREGA ALGO AL CARRITO!");
  }else if(total>=1){
    location.replace(BASE_ROOT_URL_PATH+'controller/Venta/generacion.php');
  }
 
    
}
