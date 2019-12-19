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
             <th>Cliente</th>
             <th>Vendedor</th>
             <th>Total</th>
             <th>Estado</th>
             <th>Fecha</th>
             <th>Accion</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
             <th>#</th>
             <th>Cliente</th>
             <th>Vendedor</th>
             <th>Total</th>
             <th>Estado</th>
             <th>Fecha</th>
             <th>Accion</th>
          </tr>
        </footd>
       <tbody>
        <?php foreach($rows as $row): ?>
             <tr>
             <th><?php echo $row->id_venta_PK; ?></th>
             <td><?php echo $row->nombre_cliente; ?></td>
             <td><?php echo $row->nombres_usuario; ?></td>
             <td><?php echo number_format($row->total_venta,2); ?></td>
             <td><?php echo $row->id_estado_venta_FK == 1 ? '<span class="badge badge-success">Pagado</span>' : '<span class="badge badge-warning">Pendiente</span>' ?></td>
             <td><?php echo $row->fecha_venta?></td>
             <td>

               <a onclick=""
                 href="?c=sale&m=ver_factura&id=<?php echo $row->id_venta_PK?>" class="btn btn-primary " tabindex="0" 
                 title="Ver Factura" data-toggle="tool"><i class="fas fa-eye"></i></a>
                <a  onclick="javascript:return confirm('¿Seguro quieres anular esta venta venta?');"
                 href="?c=sale&m=anular&id=<?php echo $row->id_venta_PK?>" class="btn <?php echo $row->inactivacion_venta == 0 ? "disabled" : "  btn-danger"; ?> " tabindex="0" 
                 title="Anular Venta"  data-toggle="tool"><i class="fas fa-ban"></i></a>
                 
                 <a onclick=""
                 href="?c=sale&m=getone&id=<?php echo $row->id_venta_PK?>" class="btn btn-success " tabindex="0" 
                 title="Editar Estado" data-toggle="tool"><i class="fas fa-pen-square"></i></a>
               </td>

             </tr>      

        <?php endforeach; ?>
       </tbody>
     </table>
     </div>

    </div>
    <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>

