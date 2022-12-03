<!-- Leer el perfil de un usuario. -->

<?php

  // Titulo de la página.
  $page_title = 'Mi perfil';
  
  // Requerir el cargador de controladores.
  require_once('../../controladores/cargador.php');
  
  // Seguridad: ¿Qué nivel de usuario tiene permiso para ver esta página?
  page_require_level(3);
?>
  <?php
  
  // Variable que almacena el id del usuario actual. Esto es un número.
  $user_id = (int)$_GET['id'];
  
  // Comprobar que el id del usuario no esté vacío.
  if(empty($user_id)):
    
  // Redirecionar al tablero.
  redirect('../leer_coleccion/tablero.php',false);
  else:
  
  // Buscar el perfil del usuario actual. 
  $user_p = find_by_id('users',$user_id);
  endif;
?>

<!-- Incluir el encabezado. -->
<?php include_once('../../../../cliente/planta/encabezado.php'); ?>
<div class="row">
   <div class="col-md-4">
       <div class="panel profile">
         <div class="jumbotron text-center bg-red">
		 
		    <!-- Imagen del usuario. -->
            <img class="img-circle img-size-2" src="<?php echo ROUTE_SERVER_HOST?>servidor/memoria/persistente/almacenamiento-usuario/imagenes/<?php echo $user_p['image'];?>" alt="">
            
			<!-- Nombre del usuario. -->
		    <h3><?php echo first_character($user_p['name']); ?></h3>
         </div>
		 
		 
		 <!-- Acciones sobre el perfil del usuario. -->
         <?php if( $user_p['id'] === $user['id']):?>
         <ul class="nav nav-pills nav-stacked">
          <li><a href="../editar_registro/editar_cuenta.php"> <i class="glyphicon glyphicon-edit"></i> Editar perfil</a></li>
         </ul>
       <?php endif;?>
       </div>
   </div>
</div>
<!-- Pie de página. -->
<?php include_once('../../../../cliente/planta/pie_pagina.php'); ?>
