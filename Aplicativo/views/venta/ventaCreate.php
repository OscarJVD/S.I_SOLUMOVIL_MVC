<div class="card mb-3">
    <div class="card-header">
    <div class="row">
        <div class="col-md-6">
    <i class="fas fa-fw fa fa-cart-arrow-down"></i>
           Registro de una nueva venta
        </div>
        <div class="col-md-6">
           <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Busca un cliente por nombre ó apellido">
        </div>
    </div>
       
      </div>
      <div class="card-body">
<form method="post" enctype="multipart/form-data" id="form">
          <input type="hidden" name="c" value="product">
          <input type="hidden" name="m" value="save">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
          <input type="hidden" name="id_cliente" id="id_cliente" value="">

<!--        
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
           </form> -->

				<div class="form-group row">
				  <label  class="col-md-2 control-label">Cliente</label>
				  <div class="col-md-3">
                      <select type="text" class="form-control" require id="resp_cliente">

                      </select>
                                                            
				  </div>
				  <label for="tel1" class="col-md-1 control-label">Tel</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel" placeholder="Teléfono" readonly>
							</div>
					<label for="mail" class="col-md-1 control-label">Email</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly>
							</div>
				 </div>
				 <div class="form-group row">
				 	<label for="empresa" class="col-md-2 control-label">Vendedor</label>
				 	<div class="col-md-3">
				 		<input class="form-control input-sm" value="<?php echo $_SESSION["name_user"]; ?>" id="id_vendedor" readonly>

				 	</div>
				 	<label for="tel2" class="col-md-1 control-label">Fecha</label>
				 	<div class="col-md-2">
				 		<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
				 	</div>
				 	<label for="email" class="col-md-1 control-label">Pago</label>
				 	<div class="col-md-3">
                     <input class="form-control input-sm" value="Efectivo"  readonly>

				 	</div>
				 </div>
                 <hr>
                 <!-- ------ -->
                 <div class="form-group row">
				  <label  class="col-md-2 control-label">Producto <small class="text-muted">Categoria</small></label>
				  <div class="col-md-4">
                  <div class="form-group">
                        
                         <select class="form-control" name="categoria" required=>
                             <option selected="on" disabled="on" value="">-- Selecciona una categoria --</option>
                           <?php foreach($cats as $cat):?>
                              <option value="<?php echo isset($cat->id_categoria_producto_PK) ? $cat->id_categoria_producto_PK : ''; ?>"><?php echo isset($cat->nombre_categoria_producto) ? $cat->nombre_categoria_producto : ''; ?></option>
                          <?php endforeach;?> 
                        </select> 
                    </div>                         
				  </div>
				  <label  class="col-md-2 control-label">Producto <small class="text-muted">Marca</small></label>
				 	<div class="col-md-4">
                     <div class="form-group">
                         <select class="form-control" name="marca" required>
                             <option selected="on" disabled="on" value="">-- Selecciona una marca -- </option>
                           <?php foreach($marcas as $marca):?>
                              <option value="<?php echo isset($marca->id_marca_producto_PK) ? $marca->id_marca_producto_PK : ''; ?>"><?php echo isset($marca->descripcion_marca_producto) ? $marca->descripcion_marca_producto : ''; ?></option>
                          <?php endforeach;?> 
                        </select> 
                        </div>
                        </div>
                    </div>

                    <div class="form-group row">
				  <label  class="col-md-2 control-label">Producto <small class="text-muted">Categoria</small></label>
				  <div class="col-md-10">
                  <div class="form-group">
                            <input type="text" name="cantidad" class="form-control" id="">
                    </div>                         
				  </div>
                  </div>

                    <div class="form-group row">
				  <label  class="col-md-2 control-label">Precio</label>
				  <div class="col-md-4">
                  <div class="form-group">
                  <input type="text" name="cantidad" class="form-control" id="">
                    </div>                         
				  </div>
				  <label  class="col-md-2 control-label">Cantidad</label>
				 	<div class="col-md-4">
                     <div class="form-group">
                          <input type="text" name="cantidad" class="form-control" id="">
                        </div>
                        </div>
                    </div>

                  <div class="form-group">
                     <button type="button" class="btn btn-outline-primary btn-block"> Agregar Producto </button>                       
				  </div>



  </form>
    </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>