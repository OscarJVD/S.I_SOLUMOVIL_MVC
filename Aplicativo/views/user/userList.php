<br>

     <div class="table-responsive">
       <table class="table table-bordered border-dark">
        <thead>
          <tr>
             <th>#</th>
             <th>Nombres</th>
             <th>Apellidos</th>
             <th>Correo</th>
             <th>Telefono</th>
             <th>Rol</th>
             <th>Estado</th>
             <th>Accion</th>
          </tr>
        </thead>
       <tbody>
        <?php foreach($rows as $row): ?>
             <tr>
             <th><?php echo $row->id_usuario_PK; ?></th>
             <td><?php echo $row->nombres_usuario; ?></td>
             <td><?php echo $row->apellidos_usuario; ?></td>
             <td><?php echo $row->correo_usuario; ?></td>
             <td><?php echo $row->telefono_usuario; ?></td>
             <td><?php echo $row->id_rol_usuario_FK == 1 ? "Administrador" : "Vendedor" ?></td>
             <td><?php echo $row->id_estado_FK == 1 ? "Activo" : "Inactivo"; ?></td>
             <td>
             <a href="?c=user&m=show&id=<?php echo $row->id_usuario_PK?>" class="btn btn-outline-default" tabindex="0" title="Actualizar" data-toggle="tool"><i class="fas fa-edit"></i></a>
             <?php if($row->id_usuario_PK !== $_SESSION["id_user"]): ?>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                 href="?c=user&m=delete&id=<?php echo $row->id_usuario_PK?>" class="btn btn-outline-default" tabindex="0" 
                 title="Eliminar" data-toggle="tool"><i class="fas fa-trash"></i></a>
             <?php endif;?>
               </td>
             </tr>      
        <?php endforeach; ?>
       </tbody>
     </table>
     <nav aria-label="" class="float-right">
                <ul class="pagination">
          <?php if($page != 1){ ?>
                 <li class="page-item ">
                  <a class="page-link" href="?c=user&m=index&num=<?php echo $page-1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
          <?php }else{ ?>
            <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
        <?php }
             for($i = 1; $i <= $paginate;$i++){
                if($i != $page){
          ?>
                 <li class="page-item"><a class="page-link" href="<?php echo "?c=user&m=index&num={$i}"; ?>"><?php echo $i;?></a></li>

         <?php  }else{ ?>

                   <li class="page-item active" aria-current="page"><a class="page-link" href="<?php echo "?c=user&m=index&num={$i}"; ?>"><?php echo $i;?></a></li>
         <?php          
                   }
              }
           if($page != $paginate ){
          ?>
              <li class="page-item">
                <a class="page-link" href="?c=user&m=index&num=<?php echo $page+1; ?>">Next</a>
              </li>
           <?php }else{ ?>
           
            <li class="page-item disabled">
                <a class="page-link" href="">Next</a>
            </li>
           <?php }?>
            </ul>
          </nav>
     </div>