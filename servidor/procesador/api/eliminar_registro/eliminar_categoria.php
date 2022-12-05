<?php
  require_once('../../controladores/cargador.php');
  // Verificar el nivel requerido para eliminar una categoría.
  page_require_level(1);
?>
<?php
  $categorie = find_by_id('categories',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Missing Categorie id.");
    redirect('../leer_coleccion/categorias.php');
  }
?>
<?php
  $delete_id = delete_by_id('categories',(int)$categorie['id']);
  if($delete_id){
      $session->msg("s","Categoría eliminada.");
      redirect('../leer_coleccion/categorias.php');
  } else {
      $session->msg("d","Falló eliminar la categoría.");
      redirect('../leer_coleccion/categorias.php');
  }
?>
