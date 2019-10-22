<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-chart-area"></i>
      Historial de ingreso de usuarios</div>
    <div class="card-body">


     <div class="table-responsive">
       <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
          <tr>
             <th>#</th>
             <th>Usuario (nombres)</th>
             <th>Usuario (apellidos)</th>
             <th>Fecha</th>
             <th>Accion</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
             <th>#</th>
             <th>Usuario (nombres)</th>
             <th>Usuario (apellidos)</th>
             <th>Fecha</th>
             <th>Accion</th>
          </tr>
        </footd>
       <tbody>
        <?php $i=1; foreach($rows as $row): ?>

             <tr>
             <td><?php echo $i++; ?></td>
             <td><?php echo $row->nombres_usuario; ?></td>
             <td><?php echo $row->apellidos_usuario; ?></td>
             <td><?php echo getDatetime($row->fecha,$row->hora); ?></td>
             <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');"
                 href="#" class="btn btn-outline-default" tabindex="0" 
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