<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-mobile-alt"></i>
      Actualizar de Marca</div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="marca">
          <input type="hidden" name="m" value="update">
          <input type="hidden" name="id" value="<?php echo $response->id_marca_producto_PK; ?>">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
    
                  <div class="form-group">
                       <label>Estado</label>
                       <small class="text-muted">(Obligatorio)</small>
                       <select class="form-control" name="estado" required=>
                           <option selected="on" disabled="on" value="">-Selecciona un estado-</option>
                           <option <?php echo $response->estado_marca_producto == 1 ? "selected": "";  ?> value="1">Activo</option>
                           <option <?php echo $response->estado_marca_producto == 0 ? "selected": "";  ?> value="0">Inactivo</option>
                       </select> 
                   </div>

                    <div class="form-group">
                        <label>Nombre de la marca</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="marca" class="form-control" value="<?php echo isset($response->descripcion_marca_producto) ? $response->descripcion_marca_producto : ''; ?>" placeholder="Ingrese la marca" required>
                    </div>

               <div class="text-right">
                    <button type="submit" class="btn btn-success">Actualizar Marca</button>
                    <button type="button" onclick="window.location.replace('?c=marca&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>