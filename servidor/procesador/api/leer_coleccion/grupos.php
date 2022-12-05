<?php

  // Título de la página.
  $page_title = 'Todos los grupos';
  
  // Cargar controlador.
  require_once('../../controladores/cargador.php');
  
   // Checkin ¿Qué nivel de usuario tiene permiso para ver esta página?
   page_require_level(1);
  $all_groups = find_all('user_groups');
?>

<?
 // Incluir el encabezado.
 <?php include_once('../../../../cliente/planta/encabezado.php'); ?>
 
<!-- Mostrar mensaje. -->
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">

  <!-- Agregar un nuevo grupo. -->

  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>Grupos</span>
     </strong>
       <a href="../crear_registro/nuevo_grupo.php" class="btn btn-info pull-right btn-sm"> Nuevo grupo</a>
    </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Nombre Grupo</th>
            <th class="text-center" style="width: 20%;">Nivel grupo</th>
            <th class="text-center" style="width: 15%;">Estado</th>
            <th class="text-center" style="width: 100px;">Acciones</th>
          </tr>
        </thead>
		
		<!-- Iterar en los datos del grupo para mostrar los items. -->

        <tbody>
        <?php foreach($all_groups as $a_group): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_group['group_name']))?></td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_group['group_level']))?>
           </td>
           <td class="text-center">
           <?php if($a_group['group_status'] === '1'): ?>
            <span class="label label-success"><?php echo "Activo"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Desactivado"; ?></span>
          <?php endif;?>
           </td>
           <td class="text-center">
             <div class="btn-group">
                <a href="../editar_registro/editar_grupo.php?id=<?php echo (int)$a_group['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="../eliminar_registro/eliminar_grupo.php?id=<?php echo (int)$a_group['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>

   <!-- Inlcuir el pie de página. -->

 <?php include_once('../../../../cliente/planta/pie_pagina.php'); ?>