function añadir_producto(idReloj){
  console.log(idReloj);
  location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/addProduct.php?idReloj='+idReloj);
}