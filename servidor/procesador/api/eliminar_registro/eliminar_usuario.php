<?php

  // Cargar controladores.
  require_once('../../controladores/cargador.php');
  
  // Nivel del usuario.
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('users',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Usuario eliminado.");
      redirect('../leer_coleccion/usuarios.php');
  } else {
      $session->msg("d","Falló la eliminación del usuario.");
      redirect('../leer_coleccion/usuarios.php');
  }
?>
