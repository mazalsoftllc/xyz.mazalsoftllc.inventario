<?php

  // Título de la página.
  $page_title = 'Cambiar contraseña';
  
  // Requerir el cargador.
  require_once('../../controladores/cargador.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>


<?php
    // Crear el usuario actual.
	$user = current_user(); ?>
	
<?php

  // Encontrar la acción de actualización.
  if(isset($_POST['update'])){

    // Requerir campos.
    $req_fields = array('new-password','old-password','id' );
	
	// Validar campos.
    validate_fields($req_fields);


    // Comprobar sí hay errores.
    if(empty($errors)){

             // Razonamiento lógico de seguridad: Coincide el anterior password con el actual password.
             if(sha1($_POST['old-password']) !== current_user()['password'] ){
               $session->msg('d', "La contraseña antigua no coincide.");
               redirect('cambiar_contrasena.php',false);
             }

             
			// Recuperar el id del usuario actual.
            $id = (int)$_POST['id'];
            $new = remove_junk($db->escape(sha1($_POST['new-password'])));
			
			// Actualizar la contraseña del usuario.
            $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->escape($id)}'";
            $result = $db->query($sql);
                if($result && $db->affected_rows() === 1):
                  $session->logout();
                  $session->msg('s',"Actualización de la contraseña se realizó con éxito.");
                  redirect(ROUTE_SERVER_HOST.'index.php', false);
                else:
                  $session->msg('d',' Actualización falló.!');
                  redirect('cambiar_contrasena.php', false);
                endif;
    } else {
      $session->msg("d", $errors);
      redirect('cambiar_contrasena.php',false);
    }
  }
?>


<?php include_once('../../../../cliente/planta/encabezado.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Actualizar la contraseña</h3>
     </div> 
     <?php echo display_msg($msg); ?>
      <form method="post" action="cambiar_contrasena.php" class="clearfix">
        <div class="form-group">Nueva contraseña</label>
              <input type="password" class="form-control" name="new-password" placeholder="Nueva contraseña">
        </div>
        <div class="form-group">
              <label for="oldPassword" class="control-label">Contraseña antigua</label>
              <input type="password" class="form-control" name="old-password" placeholder="Contraseña antigua">
        </div>
        <div class="form-group clearfix">
               <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                <button type="submit" name="update" class="btn btn-info">Cambiar contraseña ahora</button>
        </div>
    </form>
</div>
<?php include_once('../../../../cliente/planta/pie_pagina.php'); ?>
