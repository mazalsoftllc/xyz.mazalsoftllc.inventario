<?php

/*--------------------------------------------------------------*/
/*           BIENVENIDO/A A PINKY VERSIÓN 1.0.0
               ASISTENTE DE MARKETING DIGITAL
			    Desarrollado por Mazalsoft
    Desarrollador Mauricio Chara Hurtado(@mauriciocharaoficial)			   
/*------------------------------------------------ --------------
         |\_/|                  
         | @ @   Pinky v1.0.0! 
         |   <>              _  
         |  _/\------____ ((| |))
         |               `--' |   
     ____|_       ___|   |___.' 
    /_/_____/____/_______|
	
------------------------------------------------ --------------*/

// Pinky ahora tiene acceso a los controladores.
require_once('cargador.php');

// Configuración regional
setlocale(LC_MONETARY,"en_US");


/*--------------------------------------------------------------*/
/*  ¡Pinky saluda al usuario!
    Ej. echo pinkyMuestraLogo();
/*------------------------------------------------ --------------*/
function pinkyDiceHola($nombre_usuario){
   
   // Salida.
   $salida = "¡Hola, ".$nombre_usuario."!  Bienvenido/a a Pinky.";
   
   // Retornar la salida.
   return $salida;
   
}

/*--------------------------------------------------------------*/
/*  ¡Pinky muestra tu logo!
    Ej. echo pinkyMuestraLogo();
/*------------------------------------------------ --------------*/
function pinkyMuestraLogo(){
   
   // Salida.
   $salida = ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/logo_pinky.png";
   
   // Retornar la salida.
   return $salida;
   
}

/*--------------------------------------------------------------*/
/*  ¡Pinky muestra tu descripción!
    Ej. echo pinkyDescripcion();
/*------------------------------------------------ --------------*/
function pinkyMuestraDescripcion(){
   
   // Salida.
   $salida = "Soy tu asistente de Marketing Digital. Mi casa es Mazalsoft Inventario y tengo habilidades sorprendentes para hacer crecer tu empresa.";
   
   // Retornar la salida.
   return $salida;
   
}

/*--------------------------------------------------------------*/
/*  ¡Pinky muestra los productos candidatos para el plan de Marketing Digital!
    Ej. echo pinkyProductosCandidatosMD();
/*------------------------------------------------ --------------*/
function pinkyProductosCandidatosMD($limite){
	
    // Buscar los productos más vendidos.
    $productos_mas_vendidos   = find_higest_saleing_product((string)$limite);
	$accumulator_products_sold = 0;
	
	
	// Contar los productos más vendidos.
	foreach ($productos_mas_vendidos as  $product_sold): 
										
			$accumulator_products_sold +=  1;
									
    endforeach; 
	
	if($accumulator_products_sold == 0){ // Array no está inicializado o es null.
		
		// Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente triste! No encontró un historial de productos vendidos.",
			"descripcion" => "Pinky dice: ¡El público aún no reconoce la marca de la empresa. Es necesario un plan de reconocimiento de marca antes de iniciar la publicidad tradicional de los productos.",
			"cantidad" => $accumulator_products_sold,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-vnr.jpg",
			"enlace" => "#"
		);
		
		// Retornar salida.
		return $salida;
		
	} elseif ($accumulator_products_sold == 1){ // No es un array.
	
	   // Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente triste! No encontró un historial amplio productos vendidos.",
			"descripcion" => "Pinky dice: ¡El público aún no reconoce la marca de la empresa con (1) producto. Es necesario un plan de reconocimiento de marca antes de iniciar la publicidad tradicional de los productos.",
			"cantidad" => $accumulator_products_sold,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-vnr.jpg",
			"enlace" => "#"
		);
		
        // Retornar salida.
		return $salida;
		
	} else {
		
		// Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente feliz! Encontró los productos más vendidos.",
			"descripcion" => "Pinky dice: ¡El público está reconociendo la marca de la empresa con los (".$accumulator_products_sold.") productos más vendidos. Es una buena oportunidad para iniciar un plan de Marketing digital.",
			"cantidad" => $accumulator_products_sold,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-pmv.jpg",
			"enlace" => "#"
		);
		
		// Retornar salida.
		return $salida;
		
		
	}
}
	
/*--------------------------------------------------------------*/
/*  ¡Pinky muestra el presupuesto sugerido para el plan de Marketing Digital!
    Ej. echo pinkyPresupuestoMD();
/*------------------------------------------------ --------------*/
function pinkyPresupuestoMD($limite, $porcentaje){
	
    // Buscar los productos más vendidos.
	$ventas_recientes = find_recent_sale_added((string)$limite);
	$acumulador_ib_ventas_recientes = 0;
	
	
	// Contar el ingreso bruto de las ventas recientes.
	foreach ($ventas_recientes as  $venta_reciente): 
										
			$acumulador_ib_ventas_recientes +=  $venta_reciente['price'];
									
    endforeach; 
	
	// Calcular el presupuesto inteligente para el plan de Marketing Digital.
	$presupuesto_inteligente = ($acumulador_ib_ventas_recientes * $porcentaje) / 100;
	
	if($acumulador_ib_ventas_recientes == 0){ // Array no está inicializado o es null.
		
		// Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente preocupado! No hay presupuesto para un plan de Marketing Digital.",
			"descripcion" => "Pinky dice: ¡Una imagen fija no es suficiente! Es necesario implementar un lenguaje audiovisual completo a través de los múltiples géneros periodísticos para un plan de marketing digital armónico.",
			"cantidad" => $acumulador_ib_ventas_recientes,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-pnr.jpg",
			"enlace" => "#"
		);
		
		// Retornar salida.
		return $salida;
		
	} elseif ($acumulador_ib_ventas_recientes == 1){ // No es un array.
	
	   // Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente preocupado! No hay presupuesto para un plan de Marketing Digital.",
			"descripcion" => "Pinky dice: ¡Una imagen fija no es suficiente! Es necesario implementar un lenguaje audiovisual completo a través de los múltiples géneros periodísticos para un plan de marketing digital armónico.",
			"cantidad" => $acumulador_ib_ventas_recientes,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-pnr.jpg",
			"enlace" => "#"
		);
		
        // Retornar salida.
		return $salida;
		
	} else {
		
		// Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente generoso! Si hay presupuesto para un plan de Marketing Digital.",
			"descripcion" => "Pinky dice: ¡El ".$porcentaje."% de $".number_format($acumulador_ib_ventas_recientes,2)." USD(ingreso bruto de las últimas ".$limite." ventas), corresponde a $".round($presupuesto_inteligente,2)." USD, un presupuesto inteligente para implementar un plan de Marketing Digital sin afectar el estado financiero de la empresa.",
			"cantidad" => $presupuesto_inteligente,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-pmd.jpg",
			"enlace" => "#"
		);
		
		// Retornar salida.
		return $salida;
		
		
	}
   
  
   
}

/*--------------------------------------------------------------*/
/*  ¡Pinky cuales son los productos que necesitan periodismo digital!
    Ej. echo pinkyPeriodismoDigital();
/*------------------------------------------------ --------------*/
function pinkyPeriodismoDigital($limite){
	
    // Buscar los productos nuevos.
	$productos_recientes = find_recent_product_added((string)$limite);
	$acumulador_productos_recientes = 0;
	
	
	// Contar el número de productos recientes.
	foreach ($productos_recientes as  $producto_reciente): 
										
			$acumulador_productos_recientes +=  1;
									
    endforeach; 
		
	
	if($acumulador_productos_recientes == 0){ // Array no está inicializado o es null.
		
		// Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente abandonado! No hay periodismo digital para los productos agregados recientemente.",
			"descripcion" => "Pinky dice: ¡Para cada producto existen clientes potenciales! Es necesario implementar un periodismo digital completo a para presentar los productos al público objetivo y definir cómo sus caracteristicas y funciones contribuyen al desarrollo de la comunidad.",
			"cantidad" => $acumulador_productos_recientes,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-nrp.jpg",
			"enlace" => "#"
		);
		
		// Retornar salida.
		return $salida;
		
	} elseif ($acumulador_productos_recientes == 1){ // No es un array.
	
	   // Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente abandonado! No hay periodismo digital para los productos agregados recientemente.",
			"descripcion" => "Pinky dice: ¡Para cada producto existen clientes potenciales! Es necesario implementar un periodismo digital completo a para presentar los productos al público objetivo y definir cómo sus caracteristicas y funciones contribuyen al desarrollo de la comunidad.",
			"cantidad" => $acumulador_productos_recientes,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-nrp.jpg",
			"enlace" => "#"
		);
		
        // Retornar salida.
		return $salida;
		
	} else {
		
		// Crear un array.
		$salida = array(
			"titulo" => "¡Pinky se siente sociable! Si hay productos nuevos para un plan de Periodismo Digital.",
			"descripcion" => "Pinky dice: El departamento de comunicaciones debe dar  a conocer temas educativos, investigativos y de actualidad, para lograr generar interés en los clientes potenciales a través de la trasmisión de noticias, reportajes, entrevistas, y publicando artículos alineados a la estructura de los ejes del plan de Marketing Digital y de estándares de calidad que propone el plan de desarrollo corporativo.",
			"cantidad" => $acumulador_productos_recientes,
			"imagen" => ROUTE_SERVER_HOST."cliente/planta/decoracion/img/img-pinky/pinky-ppp.jpg",
			"enlace" => "#"
		);
		
		// Retornar salida.
		return $salida;
		
		
	}
   
  
   
}
?>
