<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-mobile-alt"></i>
      Registro de Productos</div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="product">
          <input type="hidden" name="m" value="save">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
          <input type="hidden" name="estado" value=1 >

                   <div class="form-group">
                        <label>Codigo</label>
                        <small class="text-muted">(Opcional)</small>
                        <input type="text" name="codigo" class="form-control" placeholder="Ingrese el codigo">
                    </div>
                    
                    <div class="form-group">
                        <label>Categoria</label>
                        <small class="text-muted">(Obligatorio)</small>
                         <select class="form-control" name="categoria" required=>
                             <option selected="on" disabled="on" value="">-Selecciona una categoria-</option>
                           <?php foreach($cats as $cat):?>
                              <option value="<?php echo isset($cat->id_categoria_producto_PK) ? $cat->id_categoria_producto_PK : ''; ?>"><?php echo isset($cat->nombre_categoria_producto) ? $cat->nombre_categoria_producto : ''; ?></option>
                          <?php endforeach;?> 
                        </select> 
                    </div>
                    <div class="form-goup">
                        <label>Marca</label>
                        <small class="text-muted">(Obligatorio)</small>
                         <select class="form-control" name="marca" required>
                             <option selected="on" disabled="on" value="">-Selecciona una marca-</option>
                           <?php foreach($marcas as $marca):?>
                              <option value="<?php echo isset($marca->id_marca_producto_PK) ? $marca->id_marca_producto_PK : ''; ?>"><?php echo isset($marca->descripcion_marca_producto) ? $marca->descripcion_marca_producto : ''; ?></option>
                          <?php endforeach;?> 
                        </select> 
                    </div>
                    <div class="form-group">
                        <label>Referencia</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="referencia" class="form-control" placeholder="Ingrese la referencia" required>
                    </div>
                    <div class="form-group">
                        <label>Stock (numero de existencias)</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="stock" class="form-control" placeholder="Ingrese el stock" required>
                    </div>
                    <div class="form-group">
                        <label>Precio unitario</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="precio" class="form-control" placeholder="Ingrese la referencia" required>
                    </div>
               <div class="text-right">
                    <button type="submit" class="btn btn-success">Registrar Producto</button>
                    <button type="button" onclick="window.location.replace('?c=product&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>