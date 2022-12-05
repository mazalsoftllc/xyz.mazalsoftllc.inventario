<?php

  // Nuevo usuario.
  $page_title = 'Nuevo usuario';
  require_once('../../controladores/cargador.php');
  //Verificar el nivel de un usuario.
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php

  // Controlar el proceso para crear un nuevo usuario.
  if(isset($_POST['add_user'])){

   $req_fields = array('full-name','username','password','level' );
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $user_level = (int)$db->escape($_POST['level']);
       $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}','1'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"¡La cuenta de usuario se creo con éxito! ");
          redirect('nuevo_usuario.php', false);
        } else {
          //failed
          $session->msg('d',' ¡Falló crear una nueva cuenta de usuario!');
          redirect('nuevo_usuario.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('nuevo_usuario.php',false);
   }
 }
?>
<?php include_once('../../../../cliente/planta/encabezado.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Crear un nuevo usuario</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="nuevo_usuario.php">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="full-name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name ="password"  placeholder="Password">
            </div>
            <div class="form-group">
              <label for="level">Rol</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_user" class="btn btn-primary">Agregar usuario</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('../../../../cliente/planta/pie_pagina.php'); ?>
