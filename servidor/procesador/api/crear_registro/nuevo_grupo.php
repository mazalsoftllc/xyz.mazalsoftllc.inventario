<?php
  // Agregar un grupo.
  $page_title = 'Agregar grupo';
  require_once('../../controladores/cargador.php');
  // Comprobar el nivel de acceso
   page_require_level(1);
?>
<?php

  // Controlar la acción de agregar un grupo.
  if(isset($_POST['add'])){

   $req_fields = array('group-name','group-level');
   validate_fields($req_fields);

   if(find_by_groupName($_POST['group-name']) === false ){
     $session->msg('d','<b>¡Disculpe!</b> El grupo ya existe en la base de datos.');
     redirect('nuevo_grupo.php', false);
   }elseif(find_by_groupLevel($_POST['group-level']) === false) {
     $session->msg('d','<b>¡Disculpe!</b> El nivel ya existe en la base de datos!');
     redirect('nuevo_grupo.php', false);
   }
   if(empty($errors)){
           $name = remove_junk($db->escape($_POST['group-name']));
          $level = remove_junk($db->escape($_POST['group-level']));
         $status = remove_junk($db->escape($_POST['status']));

        $query  = "INSERT INTO user_groups (";
        $query .="group_name,group_level,group_status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$level}','{$status}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"¡El grupo se creó con éxito! ");
          redirect('nuevo_grupo.php', false);
        } else {
          //failed
          $session->msg('d',' ¡Perdón no fue posible crear el grupo!');
          redirect('nuevo_grupo.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('nuevo_grupo.php',false);
   }
 }
?>
<?php 
  //Estructura DOM para agreagr un nuevo grupo.
 include_once('../../../../cliente/planta/encabezado.php'); ?>
<div class="login-page">
    <div class="text-center">
       <h3>Agregar nuevo grupo de usuario</h3>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="nuevo_grupo.php" class="clearfix">
        <div class="form-group">
              <label for="name" class="control-label">Nombre del grupo</label>
              <input type="name" class="form-control" name="group-name">
        </div>
        <div class="form-group">
              <label for="level" class="control-label">Nivel del grupo</label>
              <input type="number" class="form-control" name="group-level">
        </div>
        <div class="form-group">
          <label for="status">Estado</label>
            <select class="form-control" name="status">
              <option value="1">Activo</option>
              <option value="0">Desactivado</option>
            </select>
        </div>
        <div class="form-group clearfix">
                <button type="submit" name="add" class="btn btn-info">Crear grupo</button>
        </div>
    </form>
</div>

<?php include_once('../../../../cliente/planta/pie_pagina.php'); ?>
