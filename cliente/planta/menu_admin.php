 <!-- Estructura del menú para un administrador. -->
 
<ul>

   <!-- Navegación permitida. -->
   
   
  <!-- Item de navegación hacía el tablero. -->
  <li>
    <a href="#">
      <i class="glyphicon glyphicon-home"></i>
      <span>Tablero</span>
    </a>
  </li>
  
   <!-- Item de navegación hacía la gestión de usuarios. -->
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-user"></i>
      <span>Gestión de usuarios</span>
    </a>
    <ul class="nav submenu">
      <li><a href="#">Gestionar grupos</a> </li>
      <li><a href="#">Gestionar usuarios</a> </li>
   </ul>
  </li>
  
   <!-- Item de navegación hacía las categorías. -->
  <li>
    <a href="#" >
      <i class="glyphicon glyphicon-indent-left"></i>
      <span>Categorías</span>
    </a>
  </li>
  
   <!-- Item de navegación hacía los productos. -->
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Productos</span>
    </a>
    <ul class="nav submenu">
	    <!-- Item de navegación hacía gestionar productos. -->
       <li><a href="product.php">Gestionar productos</a> </li>
	    <!-- Item de navegación hacía agregar productos. -->
       <li><a href="add_product.php">Agregar productos</a> </li>
   </ul>
  </li>
  
   <!-- Item de navegación hacía multimedia. -->
  <li>
    <a href="media.php" >
      <i class="glyphicon glyphicon-picture"></i>
      <span>Multimedia</span>
    </a>
  </li>
  
  <!-- Item de navegación hacía gestión de ventas. -->
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-list"></i>
       <span>Ventas</span>
      </a>
	  
      <ul class="nav submenu">
	      <!-- Item de navegación hacía gestionar ventas. -->
         <li><a href="sales.php">Gestionar ventas</a> </li>
		  <!-- Item de navegación hacía agregar ventas. -->
         <li><a href="add_sale.php">Agregar venta</a> </li>
     </ul>
  </li>
  
   <!-- Item de navegación hacía reportes. -->
  <li>
    <a href="#" class="submenu-toggle">
      <i class="glyphicon glyphicon-signal"></i>
       <span>Reporte de ventas</span>
      </a>
      <ul class="nav submenu">
	    <!-- Item de navegación hacía ventas por un rango de fechas definido. -->
        <li><a href="#">Ventas por fechas</a></li>
		 <!-- Item de navegación hacía ventas por mes. -->
        <li><a href="#">Ventas mensuales</a></li>
		 <!-- Item de navegación hacía ventas diarias. -->
        <li><a href="#">Ventas diarias</a> </li>
      </ul>
  </li>
</ul>
