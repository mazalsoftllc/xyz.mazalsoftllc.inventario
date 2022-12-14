<?php

// ENTORNO DE RUTAS.
 
// -----------------------------------------------------------------------
// DEFINIR LA RUTA URL RAÍZ DEL SERVIDOR
// -----------------------------------------------------------------------
define("ROUTE_SERVER_HOST", 'http://localhost/xyz.mazalsoftllc.inventario/');

// -----------------------------------------------------------------------
// ARQUITECTURA DEL CLIENTE - RUTA HACÍA LA PLANTA.
// -----------------------------------------------------------------------
define("RUTA_PLANTA", 'http://localhost/xyz.mazalsoftllc.inventario/cliente/planta');
define("RUTA_PLANTA_DECORACION", 'http://localhost/xyz.mazalsoftllc.inventario/cliente/planta/decoracion/');

// -----------------------------------------------------------------------
// ARQUITECTURA DEL SERVIDOR - RUTA HACÍA LOS CONTROLADORES.
// -----------------------------------------------------------------------
define("RUTA_CONTROLADORES", 'http://localhost/xyz.mazalsoftllc.inventario/servidor/procesador/controladores/');

// -----------------------------------------------------------------------
// ARQUITECTURA DEL SERVIDOR - RUTA HACÍA LA AUTENTICACIÓN.
// -----------------------------------------------------------------------
define("RUTA_AUTENTICACION", 'http://localhost/xyz.mazalsoftllc.inventario/servidor/procesador/autenticacion/');

// -----------------------------------------------------------------------
// ARQUITECTURA DEL SERVIDOR - RUTA HACÍA EL API.
// -----------------------------------------------------------------------
define("RUTA_API", 'http://localhost/xyz.mazalsoftllc.inventario/servidor/procesador/api/');

// -----------------------------------------------------------------------
// ARQUITECTURA DE HERRAMIENTAS - RUTA HACÍA EL GLAMUR.
// -----------------------------------------------------------------------
define("RUTA_GLAMUR", 'http://localhost/xyz.mazalsoftllc.inventario/herramientas/glamur/');

// -----------------------------------------------------------------------
// ARQUITECTURA DE HERRAMIENTAS - RUTA HACÍA LA INTELIGENCIA ARTIFICIAL CON JAVASCRIPT.
// -----------------------------------------------------------------------
define("RUTA_IA", 'http://localhost/xyz.mazalsoftllc.inventario/herramientas/ia/');

// -----------------------------------------------------------------------
// ARQUITECTURA DE BASE DE DATOS - RUTA HACÍA LA BASE DE DATOS.
// -----------------------------------------------------------------------
define("RUTA_BASE_DATOS", 'http://localhost/xyz.mazalsoftllc.inventario/base-de-datos/');

?>
