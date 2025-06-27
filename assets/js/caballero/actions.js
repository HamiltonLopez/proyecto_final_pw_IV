function añadir_producto(idReloj){
  location.replace(BASE_ROOT_URL_PATH+'controller/Carrito/addProduct.php?idReloj='+idReloj);
  swal({
    title: "Good job!",
    text: "El producto fue agregado éxitosamente al carrito!",
    icon: "success",
    button: "Aww yiss!",
  });
 
}