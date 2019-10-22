<!-- 

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" data-toggle="popover_title" tabindex="0" > Solumovil</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <img style="width:50px;height:50px" src="<?php echo $_SESSION["img_user"]; ?>" alt="..." class="rounded-circle" href="#" id="close_sesion" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

    <div class="dropdown-menu" aria-labelledby="close_sesion">
            <a class="dropdown-item" href="?msg=logout">Cerrar sesion</a>
          </div>
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    <?php if($_SESSION["rol_user"] == 1 ):?>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="?c=user&m=create">Crear</a>
            <a class="dropdown-item" href="?c=user&m=index">Listado</a>
          </div>
        </li> -->
    <?php endif;?>
    <!-- </ul>
    <ul class="navbar-nav ">
    <li class="nav-item dropdown">
    <a class="navbar-brand text-right "><?php echo ucwords($_SESSION["name_user"]); ?></a>
    
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="button">Search</button>
    </form>
  </div>
</nav> --> 


<nav style="background-color:#3b5998"  class="navbar navbar-expand navbar-dark static-top">
<a class="navbar-brand mr-5" href="?c=main">Solumovil</a>
<span class="ml-5"></span>
<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
</button>

<!-- Navbar Search -->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  <div class="input-group">
      <img style="width:25px;height:25px" src="<?php echo $_SESSION["img_user"]; ?>" alt="..." class="rounded-circle">
      <span class="text-light ml-2"><?php echo ucwords($_SESSION["name_user"]); ?></span>
    </div>
 </form> 

<!-- Navbar -->
<ul class="navbar-nav ml-auto ml-md-0">
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="badge badge-danger">9+</span>
      <i class="fas fa-bell fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
    <h6 class="dropdown-header">Notificaciones</h6>
      <a class="dropdown-item" href="#">Another action</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Something else here</a>
    </div>
  </li>
  <!-- <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-envelope fa-fw"></i>
      <span class="badge badge-danger">7</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Something else here</a>
    </div>
  </li> -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-caret-down"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
    <h6 class="dropdown-header">Acciones</h6>
      <a class="dropdown-item" href="#"> <i class="fas fa-wrench"></i> Ajustes</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cerrarsesion"><i class="fas fa-sign-out-alt"> </i> Cerrar Sesion</a>
    </div>
  </li>
</ul>
</nav>

<!-- Logout Modal-->
<div class="modal fade" id="cerrarsesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Cierre de sesion</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">¿Estas seguro de cerrar tu sesion?</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
    <a class="btn btn-primary" href="?c=auth&m=index&msg=logout&type=success">Cerrar la Sesion</a>
  </div>
</div>
</div>
</div>