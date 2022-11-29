<?php

// CARGADOR DE CONTROLADORES.

// -----------------------------------------------------------------------
// DEFINIR ALIAS DE SEPARADORES
// -----------------------------------------------------------------------
define("URL_SEPARATOR", '/');

define("DS", DIRECTORY_SEPARATOR);

// -----------------------------------------------------------------------
// DEFINIR RUTAS DE RAÍZ
// -----------------------------------------------------------------------
defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)));
define("LIB_PATH_INC", SITE_ROOT.DS);


require_once(LIB_PATH_INC.'configuracion.php');
require_once(LIB_PATH_INC.'funciones.php');
require_once(LIB_PATH_INC.'sesion.php');
require_once(LIB_PATH_INC.'multimedia.php');
require_once(LIB_PATH_INC.'almacen_datos.php');
require_once(LIB_PATH_INC.'sql.php');

?>
