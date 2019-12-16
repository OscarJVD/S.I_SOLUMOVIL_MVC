
<nav style="background-color:#3b5998"  class="navbar navbar-expand navbar-dark static-top">
<a class="navbar-brand mr-5" href="?c=main">Solumovil</a>
<span class="ml-5"></span>
<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
  <i class="fas fa-bars"></i>
</button>

<!-- Navbar Search -->
<a class="text-light" href="README.txt">README</a>

<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  <div class="input-group">
      <img style="width:25px;height:25px" src="<?php echo $_SESSION["img_user"]; ?>" alt="..." class="rounded-circle">
      <span class="text-light ml-2"><?php echo ucwords($_SESSION["name_user"]); ?></span>
    </div>
 </form> 

<!-- Navbar -->
<ul class="navbar-nav ml-auto ml-md-0">

  <?php include_once "views/template/home/Notificacion.php";?>
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
    <h6 class="dropdown-header text-primary"><?php echo $_SESSION["rol_user"] == 1 ? "Administrador" : "Vendedor"; ?></h6>
    <div class="dropdown-divider"></div>
    <h6 class="dropdown-header">Acciones</h6>
      <a class="dropdown-item" href="?c=profile&m=index"> <i class="fas fa-wrench"></i> Ver mi Perfil</a>
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