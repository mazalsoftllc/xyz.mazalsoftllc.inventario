        <!-- Sidebar - Brand -->
	    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php  echo ROUTE_SERVER_HOST.'index.php'?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Mazalsoft Inventario <sup>1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Item de navegación - Noticiero contable -->
            <li class="nav-item">
                <a class="nav-link" href="<?php  echo ROUTE_SERVER_HOST.'servidor/procesador/api/leer_coleccion/noticiero_contable.php'?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Noticiero contable</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
               Usuarios
            </div>

            <!-- Item de navegación - Grupos -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGroups"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Gestionar grupos</span>
                </a>
                <div id="collapseGroups" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones en grupos:</h6>
                        <a class="collapse-item" href="<?php  echo ROUTE_SERVER_HOST.'servidor/procesador/api/leer_coleccion/grupos.php'?>">Listar grupos</a>
                    </div>
                </div>
            </li>

            <!-- Item de navegación - Usuarios -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                     aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Gestionar usuarios</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones en usuarios:</h6>
                        <a class="collapse-item" href="<?php  echo ROUTE_SERVER_HOST.'servidor/procesador/api/leer_coleccion/usuarios.php'?>">Listar usuarios</a>
                    </div>
                </div>
            </li>

                      

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
			
			<!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="<?php echo ROUTE_SERVER_HOST;?>cliente/planta/decoracion/img/whatsapp.svg" alt="...">
                <p class="text-center mb-2"><strong>Mazalsoft Inventario</strong> está repleto de funciones, componentes y mucho más.</p>
                <a class="btn btn-success btn-sm" href="https://wa.link/xgfszg">¡Hablemos!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->