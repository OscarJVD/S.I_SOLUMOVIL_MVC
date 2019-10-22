<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-tools"></i>
      Registro de Servicios</div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="service">
          <input type="hidden" name="m" value="save">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">

                   <div class="form-group">
                       <label>Categoria</label>
                       <small class="text-muted">(Obligatorio)</small>
                       <select class="form-control" name="categoria" required=>
                           <option selected="on" disabled="on" value="">-Selecciona una categoria-</option>
                           <?php foreach($cats as $cat):?>
                           <option value="<?php echo isset($cat->id_categoria_servicio_PK) ? $cat->id_categoria_servicio_PK : ''; ?>"><?php echo isset($cat->nombre_categoria_servicio) ? $cat->nombre_categoria_servicio : ''; ?></option>
                       <?php endforeach;?> 
                       </select> 
                   </div>
                   <div class="form-group">
                        <label>Descripcion</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="precio" class="form-control" placeholder="Ingrese el precio" required>
                    </div>
               <div class="text-right">
                    <button type="submit" class="btn btn-success">Registrar Servicio</button>
                    <button type="button" onclick="window.location.replace('?c=service&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>