<?php

  // Editar el grupo.
  
  $page_title = 'Edit Group';
  require_once('../../controladores/cargador.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php

  // Buscar un grupo a través del ID.
  
  $e_group = find_by_id('user_groups',(int)$_GET['id']);
  if(!$e_group){
    $session->msg("d","Missing Group id.");
    redirect('grupo.php');
  }
?>
<?php

  // Controlar la acción de actualizar.
  
  if(isset($_POST['update'])){

   $req_fields = array('group-name','group-level');
   validate_fields($req_fields);
   if(empty($errors)){
           $name = remove_junk($db->escape($_POST['group-name']));
          $level = remove_junk($db->escape($_POST['group-level']));
         $status = remove_junk($db->escape($_POST['status']));

        $query  = "UPDATE user_groups SET ";
        $query .= "group_name='{$name}',group_level='{$level}',group_status='{$status}'";
        $query .= "WHERE ID='{$db->escape($e_group['id'])}'";
        $result = $db->query($query);
         if($result && $db->affected_rows() === 1){
          //sucess
          $session->msg('s',"¡Grupo actualizado con éxito!");
          redirect('editar_grupo.php?id='.(int)$e_group['id'], false);
        } else {
          //failed
          $session->msg('s','Verifica si el grupo se actualizó...');
          redirect('../leer_coleccion/grupos.php');
        }
   } else {
     $session->msg("d", $errors);
    redirect('editar_grupo.php?id='.(int)$e_group['id'], false);
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
	    <?php echo display_msg($msg); ?>
		<h1 class="h3 mb-0 text-gray-800">Editar Grupo</h1>
        <a href="../crear_registro/nuevo_grupo.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Nuevo grupo</a>
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
                            <form method="post" action="editar_grupo.php?id=<?php echo (int)$e_group['id'];?>" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
									    <label for="name" class="control-label">Nombre del grupo</label>
                                        <input type="text" class="form-control form-control-user" id="group-name" name="group-name"
                                            placeholder="Nombre del grupo" value = "<?php echo remove_junk(ucwords($e_group['group_name'])); ?>">
                                    </div>
                                    <div class="col-sm-6">
									    <label for="level" class="control-label">Nivel del grupo</label>
                                        <input type="number" class="form-control form-control-user" id="group-level" name="group-level"
                                            placeholder="Nivel del grupo" value="<?php echo (int)$e_group['group_level']; ?>">
                                    </div>
                                </div>
                               <div class="form-group">
									<label for="status">Estado</label>
									<select class="form-control" name="status">
										<option <?php if($e_group['group_status'] === '1') echo 'selected="selected"';?> value="1"> Activo </option>
										<option <?php if($e_group['group_status'] === '0') echo 'selected="selected"';?> value="0">Desactivado</option>
									</select>
								</div>
                                
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Actualizar
                                </button>
                                <hr>
                                
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