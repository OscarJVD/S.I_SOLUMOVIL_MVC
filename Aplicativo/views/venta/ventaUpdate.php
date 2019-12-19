<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-mobile-alt"></i>
      Actualizar estado de factura</div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="sale">
          <input type="hidden" name="m" value="update">
          <input type="hidden" name="id" value="<?php echo $response->id_venta_PK; ?>">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
    
                  <div class="form-group">
                       <label>Estado</label>
                       <small class="text-muted">(Obligatorio)</small>
                       <select class="form-control" name="estado" required=>
                           <option selected="on" disabled="on" value="">-Selecciona un estado-</option>
                           <option <?php echo $response->id_estado_venta_FK == 1 ? "selected": "";  ?> value="1">Pagado</option>
                           <option <?php echo $response->id_estado_venta_FK == 2 ? "selected": "";  ?> value="2">Pendiente</option>
                       </select>
                    </div>

               <div class="text-right">
                    <button type="submit" class="btn btn-success">Actualizar factura</button>
                    <button type="button" onclick="window.location.replace('?c=sale&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>