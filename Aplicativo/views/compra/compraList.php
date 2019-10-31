<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-fw fa fa-cart-arrow-down"></i>
       Listado de Ventas</div>
    <div class="card-body">


     <div class="table-responsive">
       <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
             <th>#</th>
             <th>Usuario</th>
             <th>Proveedor</th>
             <th>Total</th>
             <th>Fecha</th>
             <th>Accion</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
             <th>#</th>
             <th>Usuario</th>
             <th>Proveedor</th>
             <th>Total</th>
             <th>Fecha</th>
             <th>Accion</th>
          </tr>
        </footd>
       <tbody>
        <?php foreach($rows as $row): ?>
             <tr>
             <th><?php echo $row->id_compra_PK; ?></th>
             <td><?php echo $row->nombres_usuario; ?></td>
             <td><?php echo $row->nombre_proveedor; ?></td>
             <td><?php echo number_format($row->total_compra,2); ?></td>
             <td><?php echo $row->fecha_compra;?></td>
             <td>
                <a onclick="javascript:return confirm('¿Seguro de Inactivar esta compra?');"
                 href="?c=sale&m=delete&id=<?php echo $row->id_compra_PK?>" class="btn btn-outline-default" tabindex="0" 
                 title="Inactivar" data-toggle="tool"><i class="fas fa-ban"></i></a>
               </td>
             </tr>      

        <?php endforeach; ?>
       </tbody>
     </table>
     </div>

    </div>
    <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>