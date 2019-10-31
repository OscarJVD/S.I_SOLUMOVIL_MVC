<div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-fw fa-user"></i>
       Listado de usuarios</div>
    <div class="card-body">


     <div class="table-responsive">
       <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
             <th>#</th>
             <th>Nombres</th>
             <th>Apellidos</th>
             <th>Correo</th>
             <th>Telefono</th>
             <th>Rol</th>
             <th>Estado</th>
             <th>Date</th>
             <th>Accion</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
             <th>#</th>
             <th>Nombres</th>
             <th>Apellidos</th>
             <th>Correo</th>
             <th>Telefono</th>
             <th>Rol</th>
             <th>Estado</th>
             <th>Date</th>
             <th>Accion</th>
          </tr>
        </footd>
       <tbody>
        <?php foreach($rows as $row): ?>
        <?php  $date = new DateTime($row->fecha_creacion_usuario);?>
           <?php if($row->id_usuario_PK !== $_SESSION["id_user"]): ?>
             <tr>
             <th><?php echo $row->id_usuario_PK; ?></th>
             <td><?php echo $row->nombres_usuario; ?></td>
             <td><?php echo $row->apellidos_usuario; ?></td>
             <td><?php echo $row->correo_usuario; ?></td>
             <td><?php echo $row->telefono_usuario; ?></td>
             <td><?php echo $row->id_rol_usuario_FK == 1 ? "Jefe" : "Vendedor" ?></td>
             <td><?php echo $row->id_estado_FK == 1 ? "Activo" : "Inactivo"; ?></td>
             <td><?php echo $date->format('Y'); ?></td>
             <td>
             <a href="?c=user&m=show&id=<?php echo $row->id_usuario_PK?>" class="btn btn-outline-default" tabindex="0" title="Actualizar" data-toggle="tool"><i class="fas fa-edit"></i></a>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                 href="?c=user&m=delete&id=<?php echo $row->id_usuario_PK?>" class="btn btn-outline-default" tabindex="0" 
                 title="Eliminar" data-toggle="tool"><i class="fas fa-trash"></i></a>
               </td>
             </tr>      
             <?php endif;?>
        <?php endforeach; ?>
       </tbody>
     </table>
     </div>

    </div>
    <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>