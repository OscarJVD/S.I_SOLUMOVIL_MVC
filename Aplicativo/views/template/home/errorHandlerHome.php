<?php if(isset($_REQUEST["msg"])):  
        
    switch($_REQUEST["msg"]){ 
      case "saved":
      case "updated":
  ?>
       <div id="alertas" style="margin:-10px 0px 7px 0px" class="alert alert-success" role="alert"> 
  <?php
            switch($_REQUEST["c"]){
              case "user":
                   switch($_REQUEST["msg"]){
                     case "saved";
                        echo "Usuario agregado correctamente!";
                     break;
                     case "updated";
                        echo "Usuario actualizado correctamente!";
                    break;
                     default;
                   }
              break;
              case "product":
                 switch($_REQUEST["msg"]){
                   case "saved";
                      echo "Producto agregado correctamente!";
                   break;
                   case "updated";
                      echo "Producto actualizado correctamente!";
                  break;
                   default;
                 }
             break;
             case "service":
                 switch($_REQUEST["msg"]){
                   case "saved";
                      echo "Servicio agregado correctamente!";
                   break;
                   case "updated";
                      echo "Servicio actualizado correctamente!";
                  break;
                   default;
                 }
             break;
              default;
              }
  ?> 
     </div>
   <?php   
    break;
    case "deleted":
   ?>
    <div id="alertas" style="margin:-10px 0px 7px 0px" class="alert alert-primary" role="alert"> 
        <?php
           switch($_REQUEST["c"]){
              case "user":
                 switch($_REQUEST["msg"]){
                     case "deleted";
                       echo "Usuario eliminado correctamente!";
                     break;
                     default;
                 }
             break;
             case "product":
                switch($_REQUEST["msg"]){
                   case "deleted";
                      echo "Producto eliminado correctamente!";
                   break;
                   default;
                }  
             break;
             case "service":
                switch($_REQUEST["msg"]){
                   case "deleted";
                      echo "Servicio eliminado correctamente!";
                   break;
                   default;
                }  
             break;
             default;
                }
           ?>
        </div>

<?php
  break;
  case "dont_saved":
  case "dont_updated":
  case "dont_deleted":
  case "extencion_no_permitida":
?>  
    <div id="alertas" style="margin:-10px 0px 7px 0px" class="alert alert-danger" role="alert"> 
        <?php
           switch($_REQUEST["c"]){
              case "user":
                 switch($_REQUEST["msg"]){
                  case "dont_saved";
                    echo "Lo sentimos, el usuario no se pudo guardar!";
                  break;
                  case "dont_updated";
                    echo "Lo sentimos, el usuario no se pudo actualizar!";
                  break;
                  case "dont_deleted";
                    echo "Lo sentimos, el usuario no se pudo eliminar!";
                  break; 
                  case "extencion_no_permitida":
                    echo "El usuario no se actualizo. Extencion de imagen no permitida.";
                  break;
                  default;
                 }
             break;
             case "product":
                  switch($_REQUEST["msg"]){
                   case "dont_saved";
                     echo "Lo sentimos, el producto no se pudo registrar!";
                   break;
                   case "dont_updated";
                     echo "Lo sentimos, el producto no se pudo actualizar!";
                   break;
                   case "dont_deleted";
                     echo "Lo sentimos, el producto no se pudo eliminar";
                   break; 
                   default;
                  }
             break;
             case "service":
                  switch($_REQUEST["msg"]){
                   case "dont_saved";
                     echo "Lo sentimos, el servicio no se pudo registrar!";
                   break;
                   case "dont_updated";
                     echo "Lo sentimos, el servicio no se pudo actualizar!";
                   break;
                   case "dont_deleted";
                     echo "Lo sentimos, el servicio no se pudo eliminar";
                   break; 
                   default;
                  }
             break;
             default;
                }
           ?>
        </div>
<?php  
  break;
  default;

        }  ?>

<?php endif; ?>
