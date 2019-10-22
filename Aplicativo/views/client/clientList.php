<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-walking"></i>
       Listado de clientes</div>
    <div class="card-body">


     <div class="table-responsive">
       <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
             <th>#</th>
             <th>ID</th>
             <th>Nombre</th>
             <th>Apellido</th>
             <th>correo</th>
             <th>Telefono</th>
             <th>Direccion</th>
             <th>Estado</th>
             <th>Acciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
             <th>#</th>
             <th>ID</th>
             <th>Nombre</th>
             <th>Apellido</th>
             <th>correo</th>
             <th>Telefono</th>
             <th>Direccion</th>
             <th>Estado</th>
             <th>Acciones</th>
          </tr>
        </footd>
       <tbody>
        <?php foreach($rows as $row): ?>
             <tr>
             <td><?php echo $row->id_cliente_PK; ?></td>
             <td><?php echo $row->abreviacion." ".$row->Numero_documento_Cliente; ?></td>
             <td><?php echo $row->nombre_cliente?></td>
             <td><?php echo $row->apellido_cliente; ?></td>
             <td><?php echo $row->correo_cliente; ?></td>
             <td><?php echo $row->telefono_cliente; ?></td>
             <td><?php echo $row->direccion_cliente; ?></td>
             <td><?php echo $row->id_estado_FK == 1 ? "Activo" : "Inactivo"; ?></td>
             <td>
             <a href="?c=client&m=show&id=<?php echo $row->id_cliente_PK?>" class="btn btn-outline-default" tabindex="0" title="Actualizar" data-toggle="tool"><i class="fas fa-edit"></i></a>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                 href="?c=client&m=delete&id=<?php echo $row->id_cliente_PK?>" class="btn btn-outline-default" tabindex="0" 
                 title="Eliminar" data-toggle="tool"><i class="fas fa-trash"></i></a>
               </td>
             </tr>      
        <?php endforeach; ?>
       </tbody>
     </table>
     </div>
 
    </div>
    <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>