<?php
          require_once "models/Notificacion.php";
          $notificacion =  new Notificacion();   
          $noti = $notificacion->getall();
?>

  <li class="nav-item dropdown no-arrow mx-1">
      <a id="notificacion" class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if($noti[1] > 0): ?>
              <span id="badge-msg" class="badge badge-danger"><?php echo $noti[1] >= 10 ? $noti[1]."+" : $noti[1] ; ?></span>
           <?php endif;?>
          <i class="fas fa-bell fa-fw"></i>
      </a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
           <h6 class="dropdown-header"><?php echo count($noti[0]) == 0 ? "No hay " : "";?>Notificaciones</h6>
           <!-- <div class="dropdown-divider"></div> -->
           <?php  foreach($noti[0] as $n):?>
               <hr class="my-0">
                  <a class="dropdown-item <?php echo $n->leido == 0 ? 'activo' : '';?>" href="?c=notificacion&m=leido&id=<?php echo $n->id_notificacion;?>">
                      <small><b><?php echo $n->nickname_usuario ."</b> ". $n->tipo;?></small>
                 </a>
           <?php endforeach;?>
      </div>
  </li>