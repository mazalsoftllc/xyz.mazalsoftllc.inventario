 
 <!-- Estructura del menú para un usuario.
. -->

<ul>

   <!-- Navegación permitida. -->
   
   <!-- Item de navegación hacía el tablero. -->
  <li>
    <a href="#">
      <i class="glyphicon glyphicon-home"></i>
      <span>Tablero</span>
    </a>
  </li>
  
  <!-- Item de navegación hacía ventas. -->
  <li>
    <a href="<?php  echo ROUTE_SERVER_HOST.'servidor/procesador/api/leer_coleccion/venta.php'?>" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-list"></i>
       <span>Gestión de ventas</span>
    </a>
      
  </li>
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-signal"></i>
	   <!-- Item reporte de ventas. -->
       <span>Reporte de ventas</span>
      </a>
      <ul class="nav submenu">
	    <!-- Item reporte de ventas por fecha. -->
        <li><a href="sales_report.php">Ventas por fechas </a></li>
		<!-- Item reporte de ventas mensuales. -->
        <li><a href="monthly_sales.php">Ventas mensuales</a></li>
		<!-- Item reporte de ventas diarias. -->
        <li><a href="daily_sales.php">Ventas diarias</a> </li>
      </ul>
  </li>
</ul>
