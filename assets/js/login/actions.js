function borrar_registro(id){
    if(confirm("Está seguro de eliminar el registro?")){
      location.replace(BASE_ROOT_URL_PATH+'controller/User/delete.php?id='+id);
    }
  }
  
  function editar_registro(id){
    location.replace(BASE_ROOT_URL_PATH+'controller/User/edit.php?id='+id);
  }