<!-- Iniciar el cargador de controladores. -->
<?php

  // Título de la página.
  $page_title = 'Página en blanco';
  
  // Incluir el cargador.
  require_once('../../../servidor/procesador/controladores/cargador.php');
  
  // Analizar sí el usuario tiene una sesión iniciada. Sino redireccionar a la página index.php
  if (!$session->isUserLoggedIn(true)) { redirect('../../../index.php', false);}
?>

<?php 
// Incluir el encabezado.
include_once('../../../cliente/planta/decoracion/encabezado.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bienvenidos a Mazalsoft Inventario V1.0.0</h1>

</div>
<!-- /.container-fluid -->
<?php 
// Incluir el pie de página.
include_once('../../../cliente/planta/decoracion/pie_pagina.php'); ?>