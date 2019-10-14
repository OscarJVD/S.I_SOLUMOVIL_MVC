

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
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    <?php if($_SESSION["rol_user"] == 1 ):?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="?c=user&m=create">Crear</a>
            <a class="dropdown-item" href="?c=user&m=index">Listado</a>
          </div>
        </li>
    <?php endif;?>
    </ul>
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
</nav>