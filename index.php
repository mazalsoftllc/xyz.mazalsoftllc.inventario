<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iniciar sesión en Mazalsoft Inventario.">
    <meta name="author" content="Mazalsoft.xyz">

    <title>Mazalsoft Inventario</title>
	
	<!-- Incluir el cargador de controladores.
     Cargador principal es: cargador.php
    -->
    <?php
      ob_start();
      require_once('servidor/procesador/controladores/cargador.php');
      if($session->isUserLoggedIn(true)) { redirect('servidor/procesador/api/leer_coleccion/tablero.php', false);}
    ?>

    <!-- Custom fonts for this template-->
    <link href="<?php echo RUTA_PLANTA_DECORACION;?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo RUTA_PLANTA_DECORACION;?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Fila anidada dentro del cuerpo de la tarjeta -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
    
                                    	<!-- Título de bienvenida. -->
                                        <h1 class="h4 text-gray-900 mb-4">Mazalsoft Inventario!</h1>
										  <!-- Mostrar el mensaje actual de la sesión. -->
                                          <?php echo display_msg($msg); ?>									
										  
                                    </div>
									<hr>
                                    <form class="user" method="post" action="servidor/procesador/autenticacion/autorizacion.php">
                                        <div class="form-group">
										    <!-- Username. -->
                                            <input type="name" class="form-control form-control-user"
                                                id="username" name="username" aria-describedby="emailHelp"
                                                placeholder="Ingrese el nombre de usuario...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Contraseña...">
                                        </div>
										<!--
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>-->
										
										<!-- Botón iniciar sesión. -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Iniciar sesión
                                        </button>
                                        <hr>
										<!--
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
									<!--
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo RUTA_PLANTA_DECORACION;?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo RUTA_PLANTA_DECORACION;?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src<?php echo RUTA_PLANTA_DECORACION;?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo RUTA_PLANTA_DECORACION;?>js/sb-admin-2.min.js"></script>

</body>

</html>