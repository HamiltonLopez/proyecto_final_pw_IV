function añadir_producto(idReloj){
  location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/addProduct.php?idReloj='+idReloj);
  alert('El producto fue agregado éxitosamente al carrito');
}