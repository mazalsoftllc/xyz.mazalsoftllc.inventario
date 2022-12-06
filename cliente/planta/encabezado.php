<!-- Obtener el objeto de datos del usuario actual. -->
<?php $user = current_user(); ?>

<!DOCTYPE html><!-- Tipo de documento. -->
  
  <!-- Inicio del documento HTML. -->
  <html lang="es">
     
	<!-- Inicio del encabezado del documento. -->
    <head>    <meta charset="UTF-8">

		<!-- El título del documento es dinámico. -->
		<title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Mazalsoft Inventario";?></title>
		
		<!-- Favicon. -->
		 <link rel="icon" type="image/x-icon" href="<?php echo ROUTE_SERVER_HOST;?>herramientas/glamur/favicon/favicon.ico">	

 
		
		<!-- Estilo del documento. -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
        <link rel="stylesheet" href="<?php echo ROUTE_SERVER_HOST;?>herramientas/glamur/css/estilo.css"/>

    
   </head> <!-- Fin del encabezado del documento. -->
  <body> <!-- Inicio del cuerpo del documento. -->
  
    <!-- Comprobar si el usuario tiene una sesión activa. -->
    <?php  if ($session->isUserLoggedIn(true)): ?>
  
    <!-- Inicio del encabezado del cuerpo del documento. -->
    <header id="header">
	
	  <!-- Logo del encabezado del cuerpo del documento. -->
      <div class="logo pull-left"> Mazalsoft - Inventario </div>
	  <!-- Contenido  del encabezado del cuerpo del documento. -->
      <div class="header-content">
	  <!-- Inicio de la fecha en el encabezado del cuerpo del documento. -->
      <div class="header-date pull-left">
	    <!-- Fijar la fecha actual del servidor en el encabezado del cliente. -->
        <strong><?php echo date("F j, Y, g:i a");?></strong>
      </div>
	  
	  <!-- Sección para la información básica del usuario. -->
      <div class="pull-right clearfix">
        <ul class="info-menu list-inline list-unstyled">
          <li class="profile">
            <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
			  <!-- Imagen del usuario actual. -->
              <img src="<?php echo ROUTE_SERVER_HOST;?>servidor/memoria/persistente/almacenamiento-usuario/imagenes/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
              <span><?php echo remove_junk(ucfirst($user['name'])); ?><i class="caret"></i></span>
            </a>
			<!-- Inicio del menu para personalizar el usuario actual. -->
            <ul class="dropdown-menu">
              <li>
			  
			      <!-- Item para personalizar el perfil del usuario. -->
                  <a href="<?php echo ROUTE_SERVER_HOST;?>servidor/procesador/api/leer_registro/perfil_usuario.php?id=<?php echo (int)$user['id'];?>">
                      <i class="glyphicon glyphicon-user"></i>
                      Perfil
                  </a>
              </li>
             <li>
			     <!-- Item para personalizar la configuración del usuario. -->
                 <a href="<?php echo ROUTE_SERVER_HOST;?>servidor/procesador/api/editar_registro/editar_cuenta.php" title="Editar cuenta">
                     <i class="glyphicon glyphicon-cog"></i>
                     Configuración
                 </a>
             </li>
             <li class="last">
			 
			     <!-- Item para cerrar sesión del usuario actual. -->
                 <a href= "<?php echo ROUTE_SERVER_HOST;?>servidor/procesador/autenticacion/cerrar_sesion.php">
                     <i class="glyphicon glyphicon-off"></i>
                     Salir
                 </a>
             </li>
           </ul>
          </li>
        </ul>
      </div>
     </div>
    </header> <!-- Fin del encabezado del cuerpo del documento. -->
    <div class="sidebar"> <!-- Inicio del sidebar del cuerpo del documento. -->
	
	 <?php if($user['user_level'] === '1'): ?>
        <!-- admin menu -->
      <?php include_once('menu_admin.php');?>

      <?php elseif($user['user_level'] === '2'): ?>
        <!-- Special user -->
      <?php include_once('menu_especial.php');?>

      <?php elseif($user['user_level'] === '3'): ?>
        <!-- User menu -->
      <?php include_once('menu_usuario.php');?>

      <?php endif;?>
      
   </div> 
   
   <!-- Fin condición que comprueba si el usuario tiene una sesión activa. -->
   <?php endif;?> 
 <!-- Inicio del contenido del cuerpo del documento. -->
<div class="page">
  <div class="container-fluid"> <!-- Inicio del contenedor para el contenido del cuerpo del documento. -->