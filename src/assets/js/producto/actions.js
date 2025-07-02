function borrar_registro(id){
    /*if(confirm("Está seguro de eliminar el registro?")){
      location.replace(BASE_ROOT_URL_PATH+'controller/Reloj/delete.php?id='+id);
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
       
        swal("Eliminado", location.replace(BASE_ROOT_URL_PATH+'controller/Reloj/delete.php?id='+id) ,{
        
          icon: "success",
          
          
        });
      } else {
        swal("Se canceló");
      }
    });
  }
  
  function editar_registro(id){
    location.replace(BASE_ROOT_URL_PATH+'controller/Reloj/edit.php?id='+id);
  }

