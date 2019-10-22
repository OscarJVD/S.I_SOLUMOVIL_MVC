<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-tools"></i>
       Listado de Servicios</div>
    <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
             <th>#</th>
             <th>Categoria</th>
             <th>Descripcion</th>
             <th>Precio</th>
             <th>Estado</th>
             <th>Acciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
             <th>#</th>
             <th>Categoria</th>
             <th>Descripcion</th>
             <th>Precio</th>
             <th>Estado</th>
             <th>Acciones</th>
          </tr>
        </footd>
       <tbody>
        <?php foreach($rows as $row): ?>
             <tr>
             <td><?php echo $row->id_servicio_PK; ?></td>
             <td><?php echo $row->nombre_categoria_servicio; ?></td>
             <td><?php echo $row->descripcion_servicio; ?></td>
             <td><?php echo number_format($row->precio_servicio,2); ?></td>
             <td><?php echo $row->tipo_estado; ?></td>
             <td>
             <a href="?c=service&m=show&id=<?php echo $row->id_servicio_PK;?>" class="btn btn-outline-default" tabindex="0" title="Actualizar" data-toggle="tool"><i class="fas fa-edit"></i></a>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                 href="?c=service&m=delete&id=<?php echo $row->id_servicio_PK;?>" class="btn btn-outline-default" tabindex="0" 
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