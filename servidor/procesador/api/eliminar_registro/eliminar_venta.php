<?php

  // Incluir controladores.
  require_once('../../controladores/cargador.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php
  $d_sale = find_by_id('sales',(int)$_GET['id']);
  if(!$d_sale){
    $session->msg("d","Missing sale id.");
    redirect('../leer_coleccion/venta.php');
  }
?>
<?php
  $delete_id = delete_by_id('sales',(int)$d_sale['id']);
  if($delete_id){
      $session->msg("s","Venta eliminada.");
      redirect('../leer_coleccion/venta.php');
  } else {
      $session->msg("d","Falló la eliminación de la venta.");
      redirect('../leer_coleccion/venta.php');
  }
?>
