<?php if(isset($_REQUEST["msg"])): ?>
<?php $type = isset($_REQUEST["type"]) ? $_REQUEST["type"] : "danger"; ?>
        <div style="margin-top:-35px; font-size:14.5px" class="form-group p-2 text-<?php echo $type; ?> border border-<?php echo $type; ?>  text-center rounded-lg"> 
             <?php 
             switch($_REQUEST["msg"]):
              case "session_expired_security":
              echo "Sesion cerrada por seguridad (cada 30 minutos)";
              break;
              case 'page_not_found':
                echo 'No se ha encontrado el recurso solicitado';
              break;
              case 'session_expired':
                echo 'Tu sesión ha expirado. Inicia sesión nuevamente.';
              break;
              case 'user_not_found':
                echo 'Error de autenticación';
              break;
              case 'logout':
                echo 'Sesión cerrada con éxito';
              break;
              case 'rol_user_protected':
                echo 'No tienes acceso!';
              break;
              default:
                echo 'Error';
              break;
             endswitch;
            ?>
        </div>
<?php endif;?>