<!-- Estructura de la página autorizacion. -->


<!-- Incluir los controladores. -->
<?php include_once('../controladores/cargador.php'); ?>

<?php

// Colección de campos necesarios para la autenticación. 
$req_fields = array('username','password');

// Validar campos para la autenticación.
validate_fields($req_fields);

// Eliminar caracteres basura.
$username = remove_junk($_POST['username']);
$password = remove_junk($_POST['password']);

// La condición es verdadera si no hay errores en los campos para la autenticación.
if(empty($errors)){

  // Llamar al método que permite autenticar al usuario. Esto devuelve un id del usuario. -->
  $user_id = authenticate($username, $password);
  if($user_id){
    // Crear la sesión de usuario con el id único.
     $session->login($user_id);
    //Actualizar el tiempo de inicio de sesión.
     updateLastLogIn($user_id);
	 
	 // Establecer el mensaje de la sesión.
     $session->msg("success", "Bienvenido/a a Mazalsoft Inventario.");

    // Redireccionar el usuario a la página tablero.php 
	redirect('../api/leer_coleccion/tablero.php',false);

  } else {
	  
	// Establecer el mensaje de la excepción al iniciar sesión (usuario/contraseña incorrecta).
    $session->msg("danger", "La combinación de usuario/contraseña es incorrecta ¡Por favor intente nuevamente!");
    redirect('../../../index.php',false);
  }

} else {
   
   // Establecer el mensaje de la excepción al iniciar sesión (Problemas de conexión con el almacén de datos). 
   $session->msg("d", $errors);
   redirect('../../../index.php',false);
}

?>
