<!-- Estructura de la página tablero. -->
<?php

  // Titulo de la página.
  $page_title = 'Tablero';
  
  // Incluir el cargador.
  require_once('../../../../servidor/procesador/controladores/cargador.php');
  
  // Analizar sí el usuario tiene una sesión iniciada. Sino redireccionar a la página index.php
  if (!$session->isUserLoggedIn(true)) { redirect('../../../../index.php', false);}
?>

<?php 
// Incluir el encabezado.
include_once('../../../../cliente/planta/encabezado.php'); ?>
<div class="row">
  <div class="col-md-12">
    
	
    <?php
    // Mostrar el mensaje de la sesión.
	echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
	     
		 <!-- Texto descriptivo. -->
         <h1>¡Esta es tu nueva página de inicio!</h1>
         <p>Simplemente navegue y acceda a las funciones.</p>
      </div>
    </div>
 </div>
</div>
<?php 
// Incluir el pie de página.
include_once('../../../../cliente/planta/pie_pagina.php'); ?>
