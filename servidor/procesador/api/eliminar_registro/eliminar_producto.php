<?php
  require_once('../../controladores/cargador.php');
  // Verificar el nivel del usuario.
  page_require_level(2);
?>
<?php
  $product = find_by_id('products',(int)$_GET['id']);
  if(!$product){
    $session->msg("d","Missing Product id.");
    redirect('../leer_coleccion/producto.php');
  }
?>
<?php
  $delete_id = delete_by_id('products',(int)$product['id']);
  if($delete_id){
      $session->msg("s","Producto eliminado.");
      redirect('../leer_coleccion/producto.php');
  } else {
      $session->msg("d","Falló la eliminación del producto.");
      redirect('../producto.php');
  }
?>
