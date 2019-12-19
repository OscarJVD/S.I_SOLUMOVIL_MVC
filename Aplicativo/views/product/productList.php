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
             <th>Categoria</th>
             <th>Marca</th>
             <th>Referencia</th>
             <th>Stock</th>
             <th>Precio</th>
             <th>Estado</th>
             <th>Insercion</th>
             <th>Acciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
             <th>Codigo</th>
             <th>Categoria</th>
             <th>Marca</th>
             <th>Referencia</th>
             <th>Stock</th>
             <th>Precio</th>
             <th>Estado</th>
             <th>Insercion</th>
             <th>Acciones</th>
          </tr>
        </footd>
       <tbody>
        <?php foreach($rows as $row): ?>
             <tr>
             <td><?php echo $row->codigo_producto_PK; ?></td>
             <td><?php echo $row->nombre_categoria_producto; ?></td>
             <td><?php echo $row->descripcion_marca_producto; ?></td>
             <td><?php echo $row->referencia_producto; ?></td>
             <td><?php echo $row->stock_producto < 5 ? '<span class="badge badge-danger">'.$row->stock_producto.'</span>': '<span class="badge badge-success">'.$row->stock_producto.'</span>' ; ?></td>
             <td><?php echo number_format($row->precio_producto,2); ?></td>
             <td><?php echo $row->tipo_estado; ?></td>
             <td><?php echo $row->fecha_registro_producto; ?></td>
             <td>
             <a href="?c=product&m=show&id=<?php echo $row->id_producto_PK?>" class="btn btn-outline-default" tabindex="0" title="Actualizar" data-toggle="tool"><i class="fas fa-edit"></i></a>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                 href="?c=product&m=delete&id=<?php echo $row->id_producto_PK?>" class="btn btn-outline-default" tabindex="0" 
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