<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-fw fa fa-cart-arrow-down"></i>
      Registro de una nueva venta
      </div>
      <div class="card-body">
<!-- <form method="post" enctype="multipart/form-data">
       
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
           </form> -->
           <form class="form-horizontal" role="form" id="datos_factura"></form>
				<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-2 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required>
					  <input id="id_cliente" type='hidden'>	
				  </div>
				  <label for="tel1" class="col-md-1 control-label">Tel</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" readonly>
							</div>
					<label for="mail" class="col-md-1 control-label">Email</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="mail" placeholder="Email" readonly>
							</div>
				 </div>
				 <div class="form-group row">
				 	<label for="empresa" class="col-md-2 control-label">Vendedor</label>
				 	<div class="col-md-3">
				 		<select class="form-control input-sm" id="id_vendedor">
				 	
				 					<option value="<?php echo $id_vendedor?>">Andres Felipe</option>
				 		</select>
				 	</div>
				 	<label for="tel2" class="col-md-1 control-label">Fecha</label>
				 	<div class="col-md-2">
				 		<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
				 	</div>
				 	<label for="email" class="col-md-1 control-label">Pago</label>
				 	<div class="col-md-3">
				 		<select class='form-control input-sm' id="condiciones">
				 			<option value="1">Efectivo</option>
				 			<option value="2">Cheque</option>
				 			<option value="3">Transferencia bancaria</option>
				 			<option value="4">Crédito</option>
				 		</select>
				 	</div>
				 </div>

       </form>
    </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>