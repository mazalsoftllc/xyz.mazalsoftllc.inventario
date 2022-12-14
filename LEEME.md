# Mazalsoft Inventario
## _Sistema que permite realizar una gestión de las existencias de un almacén, tanto en la entrada como en el almacenamiento o la salida._

[![N|Solid](https://i.ibb.co/Bnm7LQP/logo-leeme-mazalsoft-inventario.png)](https://mazalsoft.xyz/inventario/)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://mazalsoft.xyz/inventario/estado)

Mazalsoft Inventario es una aplicación web habilitada para la nube, preparada para dispositivos móviles y compatible con todos los navegadores estándar.
La tecnología base es PHP y se apoya en librerías del lado del cliente para la interfaz gráfica de usuario en especial Bootstrap y jQuery.

## Curso
##### Aprende a personalizar este proyecto de software libre en UDEMY
- [Crea un software para gestión de inventarios en PHP & MYSQL](https://www.udemy.com/course/mazalsoft-inventario-php-mysql/?referralCode=0EC56E3F9FC6DF4CB6E9) - Enlace directo.

## Arquitectura

##### Planta
Arquitectura cliente (cliente/planta/):

- Esto es el diseño del encabezado (encabezado.php)
- Esto es el diseño del pie de página (pie_pagina.php)
- Esto es el diseño del menú administrador (menu_admin.php)
- Esto es el diseño del menú usuario (menu_usuario.php)
- Esto es el diseño del menú especial (menu_especial.php)
_____________________
##### Controladores
Arquitectura servidor (servidor/procesador/controladores/):


- Esto es el cargador (cargador.php)
- Esto es el controlador configuración (configuracion.php)
- Esto es el controlador funciones (funciones.php)
- Esto es el controlador multimedia (multimedia.php)
- Esto es el controlador sesion (sesion.php)
- Esto es el controlador sql (sql.php)

##### Autenticación
Arquitectura servidor (servidor/procesador/autenticacion/):

- Esto es el módulo autorizacion (autorizacion.php)
- Esto es el módulo autorizacion (cerrar_sesion.php)

##### API
Arquitectura servidor (servidor/procesador/api/):

###### Crear registro
Arquitectura servidor (servidor/procesador/api/crear_registro):

- Esto es un nuevo grupo (nuevo_grupo.php)
- Esto es un nuevo usuario (nuevo_usuario.php)
- Esto es la imagen de un producto (imagen_producto.php)
- Esto es un producto (crear_producto.php)
- Esto es una venta (crear_venta.php)
- Esto es una venta ajax (crear_venta_ajax.php)



###### Leer colección
Arquitectura servidor (servidor/procesador/api/leer_coleccion):

- Esto es el tablero (tablero.php)
- Esto es el noticiero contable (noticiero_contable.php)
- Esto es el control de usuarios (usuarios.php)
- Esto es el control de grupos (grupos.php)
- Esto es el control de categorías (categorias.php)
- Esto es el control de productos (producto.php)
- Esto es el control de ventas (venta.php)
- Esto es el reporte de ventas (reporte_ventas.php)
- Esto es el reporte de ventas (reporte_ventas_procesamiento.php)
- Esto es el reporte de ventas diarias (reporte_ventas_diarias.php)
- Esto es el reporte de ventas mensuales (reporte_ventas_mensuales.php)

###### Leer registro
Arquitectura servidor (servidor/procesador/api/leer_registro):

- Esto es el punto final perfil del usuario (perfil_usuario.php)

###### Editar registro
Arquitectura servidor (servidor/procesador/api/leer_coleccion):

- Esto es el punto final editar la contraseña del usuario (cambiar_contrasena.php)
- Esto es el punto final editar el perfil del usuario (cambiar_cuenta.php)
- Esto es el punto final editar grupo (editar_grupo.php)
- Esto es el punto final editar usuario (editar_usuario.php)
- Esto es el punto final editar categoria (editar_categoria.php)
- Esto es el punto final editar un producto (editar_producto.php)
- Esto es el punto final editar una venta (editar_venta.php)

###### Eliminar registro
Arquitectura servidor (servidor/procesador/api/eliminar_registro):

- Esto es el punto final eliminar un usuario (eliminar_usuario.php)
- Esto es el punto final eliminar un grupo (eliminar_grupo.php)
- Esto es el punto final eliminar una categoría (eliminar_categoria.php)
- Esto es el punto final eliminar una imagen del producto (eliminar_imagen_producto.php)
- Esto es el punto final eliminar un producto (eliminar_producto.php)
- Esto es el punto final eliminar una venta (eliminar_venta.php)

_____________________
##### Glamur
Arquitectura herramientas (herramientas/glamur/):

###### CSS
Arquitectura herramientas (herramientas/glamur/css/):

- Esto es la hoja de estilo (estilo.css)

###### Favicon
Arquitectura herramientas (herramientas/glamur/favicon/):

- Esto es el favicon (favicon.ico)
_____________________

##### IA (Inteligencia artifical)
Arquitectura herramientas (herramientas/ia/):

###### JS
Arquitectura herramientas (herramientas/ia/js/):

- Esto es el cargador de la logica del lado del cliente (cargador.js)
- Esto es la libreria de funciones del lado del cliente (funciones.js)

_____________________

##### Base de datos
Arquitectura base de datos (basede-de-datos/):

###### Importación
Arquitectura de la base de datos (base-de-datos/importacion/):
- Esto es el script de importación (script_importacion.sql)
_____________________

## Tecnología

Mazalsoft Inventario utiliza una serie de proyectos de código abierto para funcionar correctamente:
- [PHP](https://www.php.net/) - V. 7.4.33 , 8.0.25 , 8.1.12
- [MariaDB](https://www.php.net/) - V. 5.4.27
- [OpenSSL](https://www.openssl.org/) - V. 1.1.1p 
- [HTML](https://developer.mozilla.org/es/docs/Web/HTML) - V. 5 
- [Bootstrap](https://getbootstrap.com/) - V. 5.2
- [jQuery](https://jquery.com/) - V. 3.6.1
- [Javascript](https://www.javascript.com) - V. Última versión para el 25-11-2022
- [CSS](https://developer.mozilla.org/es/docs/Learn/Getting_started_with_the_web/CSS_basics) - V. Última versión para el 25-11-2022

Mazalsoft Inventario es de código abierto.

## Development
- [Mazalsoft](https://mazalsoft.xyz) - @mazalsoftllc
- [Mauricio Chara Hurtado](https://www.linkedin.com/in/mazalsoft) - @mauriciocharaoficial
- [Whatsapp](https://wa.link/125i7q) - +57 3153774638
- [Sitio web](https://www.mazalsoft.xyz) - mazalsoft.
- [Github](https://github.com/mazalsoft) - Perfil desarrollador en GitHub.
- [Youtube](https://www.youtube.com/@mazalsoftllc) - Perfil en Youtube
- [Linkedin](https://www.linkedin.com/in/mazalsoft) - Perfil en Linkedin
- [Twitter](https://www.twitter.com/mazalsoftllc) - Perfil en Twitter

## Development
- [Mazalsoft](https://mazalsoft.xyz) - @mazalsoftllc
- [Mauricio Chara Hurtado](https://www.linkedin.com/in/mazalsoft) - @mauriciocharaoficial
- [Whatsapp](https://wa.link/125i7q) - +57 3153774638
- [Sitio web](https://www.mazalsoft.xyz) - mazalsoft.
- [Github](https://github.com/mazalsoft) - Perfil desarrollador en GitHub.
- [Youtube](https://www.youtube.com/@mazalsoftllc) - Perfil en Youtube
- [Linkedin](https://www.linkedin.com/in/mazalsoft) - Perfil en Linkedin
- [Twitter](https://www.twitter.com/mazalsoftllc) - Perfil en Twitter

_____________________

## Algoritmo de instalación estándar.

Algoritmo:

INICIO

1. Ingresar a la carpeta de recursos y descargar el código fuente [xyz.mazalsoftllc.inventario-master .zip]

2. Copiar la carpeta [xyz.mazalsoftllc.inventario-master.zip] en el directorio público de XAMPP.

3. Descomprimir la carpeta [xyz.mazalsoftllc.inventario-master] en el directorio público de XAMPP.

4. Renombrar la carpeta [xyz.mazalsoftllc.inventario-master] con el nuevo nombre [nuevo_nombre_proyecto].

5. Acceder a la carpeta servidor/procesador/controladores/

6. Editar el archivo cargador.php

7. Encontrar la línea #8 y reemplazar el valor de la constante ROUTE_SERVER_HOST por la ruta raíz del proyecto 'http://localhost/nuevo_nombre_proyecto/' ¡No olvidar el / al final del nombre del proyecto(barra inclinada).

8. Acceder a la carpeta herrameientas/ia/js/

9. Editar el archivo cargador.js

10. Encontrar la línea #8 y reemplazar el valor de la constante ROUTE_SERVER_HOST por la ruta raíz del proyecto 'http://localhost/nuevo_nombre_proyecto/' ¡No olvidar el / al final del nombre del proyecto(barra inclinada.

11. Abrir el administrador de la base de datos a través de XAMPP.

12. Crear una nueva base de datos y recordar el nombre.

13. Acceder a la carpeta base-de-datos/importacion.

14. Importar el archivo [script_importacion.sql] desde el administrador de base de datos y con la base de datos recién creada.

15. Acceder a la carpeta servidor/procesador/controladores/

16. Editar el archivo configuracion.php

17. Suministrar los datos de acceso a la base de datos: [DB_HOST: "Localhost"], [DB_USER: "root"], [DB_PASS, : ""], [DB_NAME: "nombre_base_de_datos"]

18. Ingresar a [localhost/nombre_proyecto] a través del navegador web.

19. Mazalsoft Inventario debe cargar con estilo y sin inconvenientes.

20. nombre de usuario: admin | contraseña: admin

FIN

## Instalación en un servidor web local.
 - [Instructivo de instalación](https://www.youtube.com/watch?v=EmZcu8L0hfQ&feature=youtu.be) - Ver video en Youtube

## License

MIT

**Software libre, ¡claro que sí!**