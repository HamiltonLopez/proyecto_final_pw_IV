<?php
 require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
 require_once($BASE_ROOT_FOLDER_PATH.'classes/User.php');
 $user = new User();
 $registros = $user->getAll();

  ?>

<div class="container" id="main-content">
    <div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">CRUD USER</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <div class="col">
        <label class="control-label fw-bold " for="rows">Número de filas de la tabla:</label>
      </div>
      <div class="col">
        <input class="form-control" type="number" name="rows" id="rows" min="1" max="20" placeholder="Ingrese numero entre 1 y 20">
      </div>
      <div class="col">
        <div class="col">&nbsp;</div>
        <div class="col"><input class="form-control btn btn-primary" type="button" name="btn-create" id="btn-create" value="+"></div>
        <div class="col">&nbsp;</div>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>

    <div class="row align-items-center">
      <form action="<?php echo $BASE_ROOT_URL_PATH;?>controller/User/save.php" method="post">
        <div class="row align-items-center mx-4" id="edit-content">
          <div class="col-12 text-center"><span class="fs-4">Tabla de registro de nuevos datos</span></div>
        </div>
        
        <div class="row align-items-center" id="edit-content">
          <div class="table-responsive col-12 text-center">
            <table class="table table-bordered align-middle" id="edit-table">
              <thead class="table-light" id="top">
              
                <th>Nombre</th>
                <th>ID</th>
                <th>Password</th>
                <th>Email</th>
         
              </thead>
              <tbody>
                  <tr>
                    <td colspan="4"> </td>
                  </tr>
              </tbody>
            </table>
          </div>
          <div class="col-12 text-center" id="action-button-container">
            <input class="btn-save" type="submit" value="Guardar Datos">
          </div>
        </div>
      </form>
    </div>
    <div class="row">
      <div class="span12">&nbsp;</div>
    </div>
    <div class="row align-items-center" id="show-content">
      <div class="col-12 text-center">
          <span class="fs-4">Tabla de presentación de datos</span>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered align-middle" id="edit-table">
          <thead class="table-light">
          <th>#</th>
                <th>Nombre</th>
                <th>ID</th>
                <th>Password</th>
                <th>Email</th>
          </thead>
          <tbody>
            <?php
              if(count($registros) < 1){
            ?>
              <tr>
                <td colspan="7">No hay registros</td>
              </tr>
            <?php
              } else {

                foreach($registros as $index => $fila) {
            ?>
                <tr>
                  <td><?php echo ($index + 1)?></td>
                  <td><?php echo $fila['userName']?></td>
                  <td><?php echo $fila['idUser']?></td>
                  <td><?php echo $fila['userPassword']?></td>
                  <td><?php echo $fila['userEmail']?></td>

                  <td>
                    
                      
                  <input class ="button-edit" type="button" value="Editar" onClick="editar_registro(<?php echo $fila['idUser']; ?>);">
                  <input class ="button-delete" type="button" value="Borrar" onClick="borrar_registro(<?php echo $fila['idUser']; ?>);">
                </td>
                </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>
      </div>    
    </div>
  </div>