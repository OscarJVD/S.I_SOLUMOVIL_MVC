
<div id="resp_venta"></div>

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
          <!-- datos de la venta -->
          <input type="hidden" id="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
          <input type="hidden" id="id_cliente">





				<div class="form-group row">
				  <label  class="col-md-2 control-label">Cliente</label>
				  <div class="col-md-3">
                      <select type="text" class="form-control" require id="resp_cliente">

                      </select>
                                                            
				  </div>
				  <label for="tel1" class="col-md-1 control-label">Tel</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel" placeholder="" readonly>
							</div>
					<label for="mail" class="col-md-1 control-label">Email</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="mail" placeholder="" readonly>
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
           <label for="estado" class="col-md-1 control-label">Estado</label>
				 	<div class="col-md-3">
                       <select class="form-control" id="estado" required=>
                           <option selected="on" disabled="on" value="">-Selecciona un estado-</option>
                           <option value="1" selected>Pagado</option>
                           <option value="2">Pendiente</option>
                       </select> 

				 	</div>
				 </div>
        
        <hr style="background-color:gray; height:3px">

         <div class="col-md-12" style="display:none" id="seleccion_venta">

					<div class="float-right">
						<button type="button" class="btn btn-default border" data-toggle="modal" data-target=".agregar_servicio">
            <i class="fas fa-plus-square"></i> Agregar Servicio
						</button>
						<button type="button" class="btn btn-default border" data-toggle="modal" data-target=".agregar_producto">
            <i class="fas fa-plus-circle"></i> Agregar producto
						</button>
						<button type="button" class="btn btn-default border" onclick="alert('Pronto Haremos este servicio')">
            <i class="fas fa-print"></i> Imprimir
						</button>
					</div>	
				</div>
        <br>
        
<!-- ------------------------------------------------ -->
<!-- tabla de muestra de detalle de venta -->
<div class="table-responsive my-4" >
<table class="table" id="t_detalle_venta" style="display:none">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">TIPO</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">DESCRIPCION</th>
      <th scope="col">PRECIO UNI.</th>
      <th scope="col">PRECIO TOTAL</th>
    </tr>
  </thead>
  <tbody id="mostrar_DV">

  </tbody>
</table>
</div>
<div class="col-md-12">
    <button type="button" id="registrar_venta" disabled class="btn btn-success"> <i class="fas fa-plus"></i> Registrar Nueva Factura</button>
    <span id="btn_new"></span>
</div>
    </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>





<!-- ---------------------------------------- -->
<!-- modales de soervicio y producto -->

<!-- Large modal -->
<div class="modal fade agregar_producto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               
            <div id="cart_detalle_venta"></div>
            <div class="form-group">
                <input type="text" id="buscar_producto" class="form-control" autofocus placeholder="Buscar producto por categoria ó marca">
            </div>
            <div id="detalle_venta"></div>
        
      </div>
      <div class="modal-footer">
      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade agregar_servicio" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="cart_detalle_venta_s"></div>
            <div class="form-group">
                <input type="text" id="buscar_servicio" class="form-control" autofocus  placeholder="Buscar servicio por categoria ó descripcion">
            </div>
            <div id="detalle_venta_s"></div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- ---------------------------------------- -->
