<?php
  // Cargar los controladores.
  require_once('../../controladores/cargador.php');
  // Nivel de usuario requerido para eliminar un grupo de usuarios.
   page_require_level(1);
?>
<?php

  $delete_id = delete_by_id('user_groups',(int)$_GET['id']);
  
  if($delete_id){
      $session->msg("s","El grupo se eliminó con éxito.");
      redirect('../leer_coleccion/grupos.php');
  } else {
      $session->msg("d","Falló la eliminación del grupo.");
      redirect('../leer_coleccion/grupos.php');
  }
?>
