<?php
 require_once ($BASE_ROOT_FOLDER_PATH.'configs/database.php');
 require_once($BASE_ROOT_FOLDER_PATH.'classes/User.php');

 $user = new User();

 $registros = $user->getAll();


  ?>
 
<div class="container">
<div class ="row">
	<div class="col-md-6 mx-auto p-0">
	
<div class="login-box">
	<div class="login-snip">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Login</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-space">
			<div class="login">
        <form action="<?php echo $BASE_ROOT_URL_PATH;?>controller/User/validateCredentials.php" method="post">

       
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" name="userEmail" type="text" class="input"  placeholder="Enter your email" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="userPassword" type="password" class="input" data-type="password" placeholder="Enter your password" required>
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
        </form>
				<div class="hr"></div>
				<div class="foot">
					<a href="#">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-form">
        <form action="<?php echo $BASE_ROOT_URL_PATH;?>controller/User/save.php" method="post">

       
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="userName" type="text" class="input" placeholder="Create your Username" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="userPassword" type="password" class="input" data-type="password" placeholder="Create your password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" name="confirmPassword" type="password" class="input" data-type="password" placeholder="Repeat your password" required>
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" name="userEmail" type="email" class="input" placeholder="Enter your email address" required>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
        </form>
				<div class="hr"></div>
				<div class="foot">
					<label for="tab-1">Already Member?</label>
				</div>
			</div>
		</div>
	</div>
</div>  
<div class="row align-items-center">
      <div class="col-12 text-center">
        <span class="fw-bolder fs-3">CRUD RELOJ</span>
      </div>
    </div>

    <div class="row">
      <div class="span12">&nbsp;</div>
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
       
                <th>ID</th>
                <th>UserName</th>
                <th>UserPassword</th>
                <th>UserEmail</th>
                
                <th>Acciones</th>
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
                  
                  <td><?php echo $fila['idUser']?></td>
                  <td><?php echo $fila['userName']?></td>
                  <td><?php echo $fila['userPassword']?></td>
                  <td><?php echo $fila['userEmail']?></td>
               
               

                  <td>
                    
                      
                  <input class ="button-edit" type="button" value="Editar" onClick="editar_registro(<?php echo $fila['idReloj']; ?>);">
                  <input class ="button-delete" type="button" value="Borrar" onClick="borrar_registro(<?php echo $fila['idReloj']; ?>);">
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
</div>
</div>
