<?php

  // Título de la página.
  $page_title = 'Agregar venta';
  require_once('../../controladores/cargador.php');
  // Verificar el nivel del usuario.
   page_require_level(3);
?>
<?php

  if(isset($_POST['add_sale'])){
    $req_fields = array('s_id','quantity','price','total', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();

          $sql  = "INSERT INTO sales (";
          $sql .= " product_id,qty,price,date";
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
          $sql .= ")";

                if($db->query($sql)){
                  update_product_qty($s_qty,$p_id);
                  $session->msg('s',"¡Nueva venta registrada! :)");
                  redirect('crear_venta.php', false);
                } else {
                  $session->msg('d','¡Falló al registrar la venta! :(');
                  redirect('crear_venta.php', false);
                }
        } else {
           $session->msg("d", $errors);
           redirect('crear_venta.php',false);
        }
  }

?>
<?php include_once('../../../../cliente/planta/encabezado.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="post" action="../crear_registro/crear_venta_ajax.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Buscar esto</button>
            </span>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Nombre del producto...">
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Editar venta</span>
       </strong>
      </div>
      <div class="panel-body">
        <form method="post" action="crear_venta.php">
         <table class="table table-bordered">
           <thead>
            <th> Item </th>
            <th> Precio </th>
            <th> Cantidad </th>
            <th> Total </th>
            <th> Fecha</th>
            <th> Acciones</th>
           </thead>
             <tbody  id="product_info"> </tbody>
         </table>
       </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('../../../../cliente/planta/pie_pagina.php'); ?>
