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
 $recent_sales    = find_recent_sale_added('5');
 $accumulator_products_sold = 0;
 $accumulator_latest_sales = 0;

?> 

<?php 
// Incluir el encabezado.
include_once('../../../../cliente/planta/decoracion/encabezado.php')?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Noticiero contable</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generar reporte</a>
    </div>
	
	
	 <!-- Content Row : Complemento para mostrar contadores. -->
                    <div class="row">

                        <!-- Contador de usuarios -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nº de usuarios</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $c_user['total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contador de categorías -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nº de Categorías</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $c_categorie['total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-th-list  fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contador de productos -->
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Nº de Productos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php  echo $c_product['total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-gift fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Contador de ventas -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                             Nº de ventas  </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $c_sale['total']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					 <!-- Content Row: Complemento para mostrar el top de los productos mas vendidos.. -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Productos más vendidos -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top #10 Productos más vendidos - C.V.(cantidad venta)</h6>
                                </div>
                                <div class="card-body">
								
								    <!-- Acumular la cantidad total de los productos más vendidos dentro de este contexto. -->								    
								    <?php foreach ($products_sold as  $product_sold): 
										
										    $accumulator_products_sold += $product_sold['totalQty'];
										
									      endforeach; ?>  

                                    
								    <!-- Productos más vendidos -->								    
								    <?php foreach ($products_sold as  $product_sold): 
									
									      // Calculos aritmeticos previos.
										  // Utilizar la función que permite obtener el porcentaje.
										  $porcentaje = calcularPorcentaje($product_sold['totalQty'], $accumulator_products_sold);
									
									?>
																				
										<h4 class="small font-weight-bold">#<?php echo count_id();?> <?php echo remove_junk(first_character($product_sold['name'])); ?><span
                                            class="float-right">C.V. (<?php echo remove_junk(first_character($product_sold['totalQty'])).") es el ";?><?php echo round($porcentaje,2); ?>%</span></h4>
                                        <div class="progress mb-4">
											<div class="progress-bar" role="progressbar" style="width: <?php echo $porcentaje; ?>%"
												aria-valuenow="<?php echo $porcentaje; ?>" aria-valuemin="0" aria-valuemax="<?php echo $accumulator_products_sold; ?>"></div>
										</div>
									<?php endforeach; ?>     
                                    
                                    
                                    
                                    
                                </div>

                            

                            </div> <!-- Fin de los productos más vendidos. -->										
                        </div>
						
						 <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Últimas ventas realizadas -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top #5 Ventas más recientes - I.B.(ingreso bruto)</h6>
                                </div>
                                <div class="card-body">
								
								    <!-- Acumular la cantidad total de las últimas ventas dentro de este contexto. -->								    
								    <?php foreach ($recent_sales as  $recent_sale): 
										
										     $accumulator_latest_sales += $recent_sale['price'];
										
									      endforeach; ?>  

                                    
								    <!-- Productos más vendidos -->								    
								    <?php foreach ($recent_sales as  $recent_sale): 
									
									      // Calculos aritmeticos previos.
										  // Utilizar la función que permite obtener el porcentaje.
										  $porcentaje = calcularPorcentaje($recent_sale['price'], $accumulator_latest_sales);										  				      										  
									
									?>
																				
										<h4 class="small font-weight-bold">#<?php echo count_id();?> <?php echo remove_junk(first_character($recent_sale['name'])); ?><span
                                            class="float-right">I.B. $<?php echo remove_junk(first_character($recent_sale['price']))." es el ".round($porcentaje,2); ?>%</span></h4>
                                        <div class="progress mb-4">
											<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $porcentaje; ?>%"
												aria-valuenow="<?php echo $porcentaje; ?>" aria-valuemin="0" aria-valuemax="<?php echo $accumulator_latest_sales; ?>"></div>
										</div>
									<?php endforeach; ?>     
                                    
                                    
                                    
                                    
                                </div>

                            

                            </div> <!-- Fin de las últimas ventas. -->										
                        </div>
						
						


                        
                    </div>
					
					
					
					
	

</div>
<!-- /.container-fluid -->
<?php 
// Incluir el pie de página.
include_once('../../../../cliente/planta/decoracion/pie_pagina.php'); ?>