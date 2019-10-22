<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-mobile-alt"></i>
      Actualizacion del Producto</div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="product">
          <input type="hidden" name="m" value="update">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
          <input type="hidden" name="id" value="<?php echo $response->id_producto_PK; ?>">

                   <div class="form-group">
                        <label>Codigo</label>
                        <small class="text-muted">(Opcional)</small>
                        <input type="text" value="<?php echo $response->codigo_producto_PK; ?>" name="codigo" class="form-control" placeholder="Ingrese el codigo">
                    </div>
                    
                    <div class="form-group">
                        <label>Categoria</label>
                        <small class="text-muted">(Obligatorio)</small>
                         <select class="form-control" name="categoria" required=>
                             <option selected="on" disabled="on" value="">-Selecciona una categoria-</option>
                           <?php foreach($cats as $cat):?>
                              <option <?php echo $cat->id_categoria_producto_PK == $response->id_categoria_producto_FK ? "selected": "";  ?> value="<?php echo isset($cat->id_categoria_producto_PK) ? $cat->id_categoria_producto_PK : ''; ?>"><?php echo isset($cat->nombre_categoria_producto) ? $cat->nombre_categoria_producto : ''; ?></option>
                          <?php endforeach;?> 
                        </select> 
                    </div>
                    <div class="form-goup">
                        <label>Marca</label>
                        <small class="text-muted">(Obligatorio)</small>
                         <select class="form-control" name="marca" required>
                             <option selected="on" disabled="on" value="">-Selecciona una marca-</option>
                           <?php foreach($marcas as $marca):?>
                              <option <?php echo $marca->id_marca_producto_PK == $response->id_marca_producto_FK ? "selected": "";  ?> value="<?php echo isset($marca->id_marca_producto_PK) ? $marca->id_marca_producto_PK : ''; ?>"><?php echo isset($marca->descripcion_marca_producto) ? $marca->descripcion_marca_producto : ''; ?></option>
                          <?php endforeach;?> 
                        </select> 
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
                    <div class="form-group">
                        <label>Referencia</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="referencia" class="form-control" placeholder="Ingrese la referencia" value="<?php echo $response->referencia_producto; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Stock (numero de existencias)</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="stock" class="form-control" placeholder="Ingrese el stock" value="<?php echo $response->stock_producto; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Precio unitario</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="precio" class="form-control" placeholder="Ingrese el precio" value=<?php echo $response->precio_producto; ?> required>
                    </div>
               <div class="text-right">
                    <button type="submit" class="btn btn-success">Actualizar Producto</button>
                    <button type="button" onclick="window.location.replace('?c=product&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>