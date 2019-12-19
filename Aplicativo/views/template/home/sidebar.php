
<div id="wrapper">
<ul class="sidebar navbar-nav">
      <li class="nav-item <?php echo $dashboard_s; ?>">
        <a class="nav-link" href="?c=main">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item <?php echo $product_s; ?> dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-mobile-alt"></i>
          <span>Productos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Productos</h6>
          <a class="dropdown-item" href="?c=product&m=index">Ver listado</a>
          <a class="dropdown-item" href="?c=product&m=create">Agregar</a>
          <a class="dropdown-item" href="#"></a>
          <h6 class="dropdown-header">Marcas</h6>
          <a class="dropdown-item" href="?c=marca&m=index">Ver listado</a>
          <a class="dropdown-item" href="?c=marca&m=create">Agregar</a>
          <a class="dropdown-item" href="#"></a>
        </div>
      </li>
      <li class="nav-item <?php echo $service_s; ?> dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-tools"></i>
          <span>Servicios</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Servicios</h6>
          <a class="dropdown-item" href="?c=service&m=index">Ver listado</a>
          <a class="dropdown-item" href="?c=service&m=create">Agregar</a>
          <a class="dropdown-item" href="#"></a>
        </div>
      </li>
      <li class="nav-item  <?php echo $sale_s; ?> dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa fa-cart-arrow-down"></i>
          <span>Ventas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Ventas</h6>
          <a class="dropdown-item" href="?c=sale&m=index">Ver listado</a>
          <a class="dropdown-item" href="?c=sale&m=create">Agregar</a>
          <a class="dropdown-item" href="#"></a>

        </div>
      </li>
      <li class="nav-item <?php echo $buy_s; ?> dropdown" onclick="javascript:return false; alert('Trabajaremos en ello Pronto.')">
        <a class="nav-link  dropdown-toggle" onclick=" alert('Trabajaremos en ello Pronto.')" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-shopping-cart"></i>
          <span>Compras</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Compras</h6>
          <a class="dropdown-item" href="?c=buy&m=index">Ver listado</a>
          <a class="dropdown-item" href="#">Agregar</a>
          <a class="dropdown-item" href="#"></a>

        </div>
      </li>
      <?php if($_SESSION["rol_user"] == 1):?>
      <li class="nav-item <?php echo $user_s; ?> dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user"></i>
          <span>Usuarios</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Usuarios</h6>
          <a class="dropdown-item" href="?c=user&m=index">Ver Listado</a>
          <a class="dropdown-item" href="?c=user&m=create">Agregar</a>
          <div class="dropdown-divider"></div>
          <!-- <h6 class="dropdown-header">Other Pages:</h6> -->
          <!-- <a class="dropdown-item" href="404.html">404 Page</a> -->
          <!-- <a class="dropdown-item" href="blank.html">Blank Page</a> -->
        </div>
      </li>
     <?php endif; ?>
      <li class="nav-item <?php echo $client_s; ?> dropdown">
        <a class="nav-link  dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-walking"></i>
          <span>Clientes</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Clientes</h6>
          <a class="dropdown-item" href="?c=client&m=index">Ver listado</a>
          <a class="dropdown-item" href="?c=client&m=create">Agregar</a>
          <a class="dropdown-item" href="#"></a>

        </div>
      </li>
      <li class="nav-item <?php echo $provider_s; ?> dropdown">
        <a class="nav-link  dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-hat-cowboy"></i>
          <span>Proveedores</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Proveedores</h6>
          <a class="dropdown-item" href="?c=provider&m=index">Ver listado</a>
          <a class="dropdown-item" href="?c=provider&m=create">Agregar</a>
          <a class="dropdown-item" href="#"></a>

        </div>
      </li>
      <li class="nav-item <?php echo $category_s; ?> dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-archive"></i>
          <span>Categorias</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Categorias Producto</h6>
          <a class="dropdown-item" href="?c=category&m=index&type=producto">Ver Listado</a>
          <a class="dropdown-item" href="?c=category&m=create&type=producto">Agregar</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Categorias Servicio</h6>
          <a class="dropdown-item" href="?c=category&m=index&type=servicio">Ver Listado</a>
          <a class="dropdown-item" href="?c=category&m=create&type=servicio">Agregar</a>


        </div>
      </li>
      <?php if($_SESSION["rol_user"] == 1):?>
      <li class="nav-item  <?php echo $report_s; ?> dropdown" onclick="alert('Trabajaremos en ello Pronto.')">
        <a class="nav-link dropdown-toggle" onclick="javascript:return false; alert('Trabajaremos en ello Pronto.')" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-chart-bar"></i>
          <span>Reportes</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Reportes</h6>
          <a class="dropdown-item" href="#">Reporte Ventas</a>
          <a class="dropdown-item" href="#">Reporte Compras</a>
          <a class="dropdown-item" href="#">Reporte Productos</a>
          <a class="dropdown-item" href="#">Reporte Servicios</a>
        </div>
      </li>
      <li class="nav-item  <?php echo $report_s; ?> dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-chart-area"></i>
          <span>Estadisticas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Estadisticas</h6>
          <a class="dropdown-item" href="?c=user&m=loginuserhistory">Login usuario</a>
        </div>
      </li>
      <?php endif; ?>
    </ul>

    <div id="content-wrapper">

<div class="container-fluid">

