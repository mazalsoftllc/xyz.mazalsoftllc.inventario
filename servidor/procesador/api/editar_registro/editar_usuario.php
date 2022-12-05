<?php

  // Título de la página.
  $page_title = 'Editar usuario';
  
  // Cargar controladores.
  require_once('../../controladores/cargador.php');
  
  // Nivel del usuario.
   page_require_level(1);
?>
<?php

  // Buscar el usuario a través del id.
  $e_user = find_by_id('users',(int)$_GET['id']);
  $groups  = find_all('user_groups');
  if(!$e_user){
    $session->msg("d","Missing user id.");
    redirect('../leer_coleccion/usuarios.php');
  }
?>

<?php
// Actualizar la información básica del usuario.
  if(isset($_POST['update'])) {
    $req_fields = array('name','username','level');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_user['id'];
           $name = remove_junk($db->escape($_POST['name']));
       $username = remove_junk($db->escape($_POST['username']));
          $level = (int)$db->escape($_POST['level']);
       $status   = remove_junk($db->escape($_POST['status']));
            $sql = "UPDATE users SET name ='{$name}', username ='{$username}',user_level='{$level}',status='{$status}' WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Cuenta actualizada ");
            redirect('editar_usuario.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' ¡Falló actualización!');
            redirect('editar_usuario.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('editar_usuario.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php
// Actualizar la contraseña del usuario.
if(isset($_POST['update-pass'])) {
  $req_fields = array('password');
  validate_fields($req_fields);
  if(empty($errors)){
           $id = (int)$e_user['id'];
     $password = remove_junk($db->escape($_POST['password']));
     $h_pass   = sha1($password);
          $sql = "UPDATE users SET password='{$h_pass}' WHERE id='{$db->escape($id)}'";
       $result = $db->query($sql);
        if($result && $db->affected_rows() === 1){
          $session->msg('s',"La contraseña del usuario se actualizó con éxito.");
          redirect('editar_usuario.php?id='.(int)$e_user['id'], false);
        } else {
          $session->msg('d',' Falló actualizar la contraseña del usuario!');
          redirect('editar_usuario.php?id='.(int)$e_user['id'], false);
        }
  } else {
    $session->msg("d", $errors);
    redirect('editar_usuario.php?id='.(int)$e_user['id'],false);
  }
}

?>
<?php include_once('../../../../cliente/planta/encabezado.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Actualizar <?php echo remove_junk(ucwords($e_user['name'])); ?> Cuenta
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="editar_usuario.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="name" class="control-label">Nombre</label>
                  <input type="name" class="form-control" name="name" value="<?php echo remove_junk(ucwords($e_user['name'])); ?>">
            </div>
            <div class="form-group">
                  <label for="username" class="control-label">Nombre usuario</label>
                  <input type="text" class="form-control" name="username" value="<?php echo remove_junk(ucwords($e_user['username'])); ?>">
            </div>
            <div class="form-group">
              <label for="level">Rol</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option <?php if($group['group_level'] === $e_user['user_level']) echo 'selected="selected"';?> value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
              <label for="status">Estado</label>
                <select class="form-control" name="status">
                  <option <?php if($e_user['status'] === '1') echo 'selected="selected"';?>value="1">Activo</option>
                  <option <?php if($e_user['status'] === '0') echo 'selected="selected"';?> value="0">Desactivado</option>
                </select>
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
            </div>
        </form>
       </div>
     </div>
  </div>
  <!-- Change password form -->
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Cambiar<?php echo remove_junk(ucwords($e_user['name'])); ?> contraseña
        </strong>
      </div>
      <div class="panel-body">
        <form action="editar_usuario.php?id=<?php echo (int)$e_user['id'];?>" method="post" class="clearfix">
          <div class="form-group">
                <label for="password" class="control-label">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Digita la nueva contraseña">
          </div>
          <div class="form-group clearfix">
                  <button type="submit" name="update-pass" class="btn btn-danger pull-right">Cambiar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

 </div>
<?php include_once('../../../../cliente/planta/pie_pagina.php'); ?>
