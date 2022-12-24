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
 // Incluir el encabezado.
include_once('../../../../cliente/planta/decoracion/encabezado.php')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Mostrar el mensaje actual de la sesión. -->
	    <h1 class="h3 mb-0 text-gray-800">Nuevo Grupo</h1>
        <a href="../leer_coleccion/grupos.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-list fa-sm text-white-50"></i> Lista de grupos</a>
    </div>
	
	
	 <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-edit-group"></div>
                    <div class="col-lg-7">
                        <div class="p-5">  
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><?php echo display_msg($msg); ?></h1>
                            </div>
                            <form method="post" action="nuevo_grupo.php" class="user">
                                 <div class="form-group">
									<label for="name" class="control-label">Nombre del grupo</label>
                                    <input type="name" class="form-control form-control-user" name="group-name">
                                 </div>
                                 <div class="form-group">
                                     <label for="level" class="control-label">Nivel del grupo</label>
                                     <input type="number" class="form-control form-control-user" name="group-level">
                                 </div>
                                 <div class="form-group">
                                     <label for="status">Estado</label>
                                     <select class="form-control" name="status">
                                        <option value="1">Activo</option>
                                        <option value="0">Desactivado</option>
                                      </select>
                                 </div>
                                 <div class="form-group clearfix">
                                       <button type="submit" name="add" class="btn btn-primary btn-user btn-block">Crear grupo</button>
                                 </div>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="../leer_coleccion/grupos.php">Listar grupos</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
					
					
	

</div>
<!-- /.container-fluid -->



<?php 
// Incluir el pie de página.

include_once('../../../../cliente/planta/decoracion/pie_pagina.php'); ?>