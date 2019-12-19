<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-mobile-alt"></i>
       Listado de productos</div>
    <div class="card-body">


     <div class="table-responsive">
       <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
             <th>Codigo</th>
             <th>Descripcion</th>
             <th>Estado</th>
             <th>Acciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
             <th>Codigo</th>
             <th>Descripcion</th>
             <th>Estado</th>
             <th>Acciones</th>

          </tr>
        </footd>
       <tbody>
        <?php foreach($rows as $row): ?>
             <tr>
             <td><?php echo $row->id_marca_producto_PK ; ?></td>
             <td><?php echo $row->descripcion_marca_producto ; ?></td>
             <td><?php echo $row->estado_marca_producto == 1 ? "Activo":"Inactivo"; ?></td>

             <td>
             <a href="?c=marca&m=show&id=<?php echo $row->id_marca_producto_PK; ?>" class="btn btn-outline-default" tabindex="0" title="Actualizar" data-toggle="tool"><i class="fas fa-edit"></i></a>
                <!-- <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                 href="?c=marca&m=delete&id=<?php echo $row->id_marca_producto_PK; ?>" class="btn btn-outline-default" tabindex="0" 
                 title="Eliminar" data-toggle="tool"><i class="fas fa-trash"></i></a> -->
               </td>
             </tr>      
        <?php endforeach; ?>
       </tbody>
     </table>
     </div>
 
    </div>
    <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>