 <!-- Estructura del menú para un menú especial. -->


<ul>

<!-- Navegación permitida. -->

  <!-- Item de navegación hacía el tablero. -->
  <li>
    <a href="#">
      <i class="glyphicon glyphicon-home"></i>
      <span>Tablero</span>
    </a>
  </li>
  
  <!-- Item de navegación hacía las categorías. -->
  <li>
   <a href="<?php  echo ROUTE_SERVER_HOST.'servidor/procesador/api/leer_coleccion/categorias.php'?>" >
      <i class="glyphicon glyphicon-indent-left"></i>
      <span>Csategoría</span>
    </a>
  </li>
  
   <!-- Item de navegación hacía los productos. -->
  <li>
  <a href="<?php  echo ROUTE_SERVER_HOST.'servidor/procesador/api/leer_coleccion/producto.php'?>" class="submenu-toggle">
      <i class="glyphicon glyphicon-th-large"></i>
      <span>Producto</span>
    </a>
    <ul class="nav submenu">
       <li><a href="product.php">Gestionar productos</a> </li>
       <li><a href="add_product.php">Agregar producto</a> </li>
   </ul>
  </li>
  
   <!-- Item de navegación hacía los medios multimedia. -->
  <li>
      <a href="<?php  echo ROUTE_SERVER_HOST.'servidor/procesador/api/crear_registro/imagen_producto.php'?>">
      <i class="glyphicon glyphicon-picture"></i>
      <span>Multimedia</span>
    </a>
  </li>
</ul>
