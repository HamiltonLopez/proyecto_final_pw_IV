function añadir_producto(idReloj){
    if(confirm("Está seguro de eliminar el registro?")){
      location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/addProduct.php?id='+idReloj);
    }
}