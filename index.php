
<!-- Estructura de la página principal. -->

<!-- Incluir el cargador de controladores.
     Cargador principal es: cargador.php
 -->
<?php
  ob_start();
  require_once('servidor/procesador/controladores/cargador.php');
  if($session->isUserLoggedIn(true)) { redirect('servidor/procesador/api/leer_coleccion/tablero.php', false);}
?>
 
<!-- Incluir un componente compuesto del diseño de planta(GUI) una sola vez.
     Incluir el encabezado.
 -->
<?php include_once('cliente/planta/encabezado.php'); ?>

<!-- Componente compuesto para que el usuario pueda iniciar sesión. -->

<!-- Estilo de la página para iniciar sesión. -->
<div class="login-page"> 
    <div class="text-center">
       <h1>Bienvenido/a</h1>
       <p>Por favor inicia sesión.</p>
     </div>
	  
	  <!-- Mostrar el mensaje actual de la sesión. -->
	  <?php echo display_msg($msg); ?>
	  
      <!-- Formulario para iniciar sesión. -->
      <form method="post" action="servidor/procesador/autenticacion/autorizacion.php" class="clearfix">
        <div class="form-group">
		
		      <!-- Elemento de interfaz gráfica de usuario para ingresar el nombre. -->
              <label for="username" class="control-label">Usuario</label>
              <input type="name" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
   	       <!-- Elemento de interfaz gráfica de usuario para ingresar la contraseña. -->
            <label for="Password" class="control-label">Contraseña</label>
            <input type="password" name= "password" class="form-control" placeholder="Contraseña">
        </div>
		
		<!-- Elemento de interfaz gráfica de usuario para ingresar el nombre. -->
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Iniciar sesión</button>
        </div>
    </form>
</div>

<!-- Incluir un componente compuesto del diseño de planta(GUI) una sola vez. 
     Incluir el pie de página.
-->
<?php include_once('cliente/planta/pie_pagina.php'); ?>
