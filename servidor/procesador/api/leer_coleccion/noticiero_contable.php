<?php
  
  // Título de la página.
  $page_title = 'Noticiero contable';
  require_once('../../controladores/cargador.php');
  
  // Nivel de usuario requerido.
   page_require_level(1);
?>
<?php
 
 // Variables de página.

 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5')
?>
<?php
 // Incluir el encabezado.
 include_once('../../../../cliente/planta/encabezado.php'); ?>


<!-- Mensaje de la sesión. -->
<div class="row">
   <div class="col-md-6">
     <?php
     // Mensaje de la sesión.
	 echo display_msg($msg); ?>
   </div>
</div>

  <!-- Sección del Noticiero: Total de usuarios. -->
  <div class="row">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Usuarios</p>
        </div>
       </div>
    </div>
	
    <!-- Sección del Noticiero: Total de categorías. -->
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-list"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Categorías</p>
        </div>
       </div>
    </div>
	
    <!-- Sección del Noticiero: Total de productos. -->

    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-shopping-cart"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
          <p class="text-muted">Productos</p>
        </div>
       </div>
    </div>
	
    <!-- Sección del Noticiero: Total de ventas. -->

    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-yellow">
          <i class="glyphicon glyphicon-usd"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
          <p class="text-muted">Ventas</p>
        </div>
       </div>
    </div>
</div>

  <!-- Sección del Noticiero: Frase de gancho. -->

  <div class="row">
   <div class="col-md-12">
      <div class="panel">
        <div class="jumbotron text-center">
           <h1>Gracias por usar esta tecnología digital.</h1>
           <p> <strong>Mazalsoft inventario v1.0.0</strong> es su mano amiga en los negocios.<strong> Gestión de inventario. </strong>
           </br> <a href="https://www.mazalsoft.xyz/inventario/" title="Mazalsoft Inventario" target="_blank">Visita la página web del proyecto</a></p>

        </div>
      </div>
   </div>
  </div>

  <!-- Sección del Noticiero: Productos más vendidos. -->
  <div class="row">
   <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Productos más vendidos</span>
         </strong>
       </div>
       <div class="panel-body">
         <table class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <th>Título</th>
             <th>Total vendido</th>
             <th>Total cantidad</th>
           <tr>
          </thead>
          <tbody>
            <?php foreach ($products_sold as  $product_sold): ?>
              <tr>
                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                <td><?php echo (int)$product_sold['totalQty']; ?></td>
              </tr>
            <?php endforeach; ?>
          <tbody>
         </table>
       </div>
     </div>
   </div>
   
   <!-- Sección del Noticiero: Productos más vendidos. -->
   <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>ÚLTIMAS VENTAS</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Nombre del producto</th>
           <th>Dato</th>
           <th>Total Ventas</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
            <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  
  <!-- Sección del Noticiero: Productos añadidos recientemente. -->
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Productos añadidos recientemente</span>
        </strong>
      </div>
      <div class="panel-body">

       <!-- Sección del Noticiero: Informacón básica del producto. -->

        <div class="list-group">
      <?php foreach ($recent_products as  $recent_product): ?>
            <a class="list-group-item clearfix" href="<?php echo ROUTE_SERVER_HOST;?>servidor/procesador/api/editar_registro/editar_producto.php?id=<?php echo    (int)$recent_product['id'];?>">
                <h4 class="list-group-item-heading">
                 <?php if($recent_product['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="<?php echo ROUTE_SERVER_HOST;?>servidor/memoria/persistente/almacenamiento-producto/imagenes/no_image.jpg" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="<?php echo ROUTE_SERVER_HOST;?>servidor/memoria/persistente/almacenamiento-producto/imagenes/<?php echo $recent_product['image'];?>" alt="" />
                <?php endif;?>
                <?php echo remove_junk(first_character($recent_product['name']));?>
                  <span class="label label-warning pull-right">
                 $<?php echo (int)$recent_product['sale_price']; ?>
                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
              </span>
          </a>
      <?php endforeach; ?>
    </div>
  </div>
 </div>
</div>
 </div>
  <div class="row">

  </div>



<?php
 // Incluir el encabezado.
 include_once('../../../../cliente/planta/pie_pagina.php'); ?>