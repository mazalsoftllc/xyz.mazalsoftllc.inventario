<?php
  // Cerrar sesión.
  require_once('../controladores/cargador.php');
  if(!$session->logout()) {redirect(ROUTE_SERVER_HOST."index.php");}
?>
