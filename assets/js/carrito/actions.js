function borrar_registro(idCarrito){
    if(confirm("Está seguro de eliminar el registro?")){
      location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/delete.php?id='+idCarrito);
    }
}
  
function editar_registro(idCarrito){
    location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/edit.php?id='+idCarrito);
}