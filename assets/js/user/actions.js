function borrar_registro(idUser){
    if(confirm("Está seguro de eliminar el registro?")){
      location.replace(BASE_ROOT_URL_PATH+'controller/User/delete.php?id='+idUser);
    }
  }
  
  function editar_registro(idUser){
    location.replace(BASE_ROOT_URL_PATH+'controller/User/edit.php?id='+idUser);
  }