<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-archive"></i>
       Actualizar categoria <?php echo $_REQUEST["type"]; ?></div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="category">
          <input type="hidden" name="m" value="update">
          <input type="hidden" name="id" value="<?php echo $response->$id; ?>">    
          <input type="hidden" name="tipo" value="<?php echo $_REQUEST["type"]; ?>">  

                    <div class="form-group">
                        <label>Nombre de la categoria</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="nombre" value="<?php echo $response->$nombre; ?>" class="form-control" placeholder="Ingrese nombre de la categoria" >
                    </div>
                    <div class="form-group">
                        <label>Descripcion de la categoria</label>
                        <small class="text-muted">(Opcional)</small>
                        <input type="text" name="descripcion" value="<?php echo $response->$descripcion; ?>" class="form-control" placeholder="Ingrese la descripcion de la categoria" required>
                    </div>
                    <div class="form-group">
                       <label>Estado</label>
                       <small class="text-muted">(Obligatorio)</small>
                       <select class="form-control" name="estado" required=>
                           <option selected="on" disabled="on" value="">-Selecciona un estado-</option>
                           <option <?php echo $response->id_estado_FK == 1 ? "selected": "";  ?> value="1">Activo</option>
                           <option <?php echo $response->id_estado_FK == 2 ? "selected": "";  ?> value="2">Inactivo</option>
                       </select> 
                   </div>
               <div class="text-right">
                    <button type="submit" class="btn btn-success">Actualizar Categoria</button>
                    <button type="button" onclick="window.location.replace('?c=category&m=index&type=<?php echo $_REQUEST['type']; ?>');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>