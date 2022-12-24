<?php
  
  // Título de la página.
  $page_title = 'Gestionar grupos';
  require_once('../../controladores/cargador.php');
  
   // Nivel de usuario requerido.
   page_require_level(1);
   
   $all_groups = find_all('user_groups');
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
		<h1 class="h3 mb-0 text-gray-800">Gestionar Grupos</h1>
        <a href="../crear_registro/nuevo_grupo.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Nuevo grupo</a>
    </div>
	
	<!-- Inicio de la tabla. -->
	
	                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Descripción</h1>
                    <p class="mb-4">"Los grupos de usuarios hacen que organizar usuarios, estructuras organizativas y permisos sea más fácil." <a target="_blank"
                            href="https://es.wikipedia.org/wiki/Wikipedia:Tipos_de_usuarios">Wikipedia</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de grupos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
										    <th>Id</th>
											<th>Nombre Grupo</th>
                                            <th>Nivel grupo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
										    <th>Id</th>
											<th>Nombre Grupo</th>
                                            <th>Nivel grupo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th> 
                                        </tr>
                                    </tfoot>
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
                                                
												<a href="../editar_registro/editar_grupo.php?id=<?php echo (int)$a_group['id'];?>" class="btn btn-xs btn-info btn-circle btn-sm" class="btn btn-info btn-circle btn-sm">
                                                   <i class="fas fa-info-circle"></i>
                                                </a>
												
												<a href="../eliminar_registro/eliminar_grupo.php?id=<?php echo (int)$a_group['id'];?>" class="btn btn-xs btn-danger  btn-circle btn-sm" class="btn btn-danger btn-circle btn-sm">
													<i class="fas fa-trash"></i>
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
	
	<!-- /.Fin de la tabla -->	
							
					
					
					
	

</div>
<!-- /.container-fluid -->



<?php 
// Incluir el pie de página.

include_once('../../../../cliente/planta/decoracion/pie_pagina.php'); ?>