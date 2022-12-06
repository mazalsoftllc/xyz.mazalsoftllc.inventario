<?php
  require_once('../../controladores/cargador.php');
  // Verificar el nivel requerido.
  page_require_level(2);
?>
<?php
  $find_media = find_by_id('media',(int)$_GET['id']);
  $photo = new Media();
  if($photo->media_destroy($find_media['id'],$find_media['file_name'])){
      $session->msg("s","La fotografía se eliminó con éxito.");
      redirect('../crear_registro/imagen_producto.php');
  } else {
      $session->msg("d","Falló el intento de eliminar la fotografía.");
      redirect('../crear_registro/imagen_producto.php');
  }
?>
