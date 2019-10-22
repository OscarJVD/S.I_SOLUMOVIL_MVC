
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-walking"></i>
      Actualizar Cliente</div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="client">
          <input type="hidden" name="m" value="update">
          <input type="hidden" name="id" value="<?php echo $response->id_cliente_PK;?>">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">

                   <div class="form-group">
                        <label>Tipo de documento</label>
                        <small class="text-muted">(Opcional)</small>
                        <select class="form-control" name="tipoDocumento" >
                           <option disabled="on" selected="on">---Tipo de Documento---</option>
                           <?php foreach ($docs as $doc):?>
                            <option <?php echo $doc->id_tipo_documento_PK == $response->id_tipo_documento_FK ? "selected" : ""; ?>  value=<?php echo $doc->id_tipo_documento_PK; ?> ><?php echo $doc->descripcion_tipo_documento; ?></option>
                           <?php endforeach; ?>
                         </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Numero de documeto</label>
                        <small class="text-muted">(Opcional)</small>
                        <input type="text" name="numeroDocumento" value="<?php echo $response->Numero_documento_Cliente;?>" class="form-control" placeholder="Ingrese el número de documento" >
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $response->nombre_cliente;?>" placeholder="Ingrese el primer nombre" required>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="apellido" class="form-control"  value="<?php echo $response->apellido_cliente; ?>" placeholder="Ingrese el primer apellido" required>
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
                        <label>Direccion</label>
                        <small class="text-muted">(Opcional)</small>
                        <input type="text" name="direccion" class="form-control" value="<?php echo $response->direccion_cliente; ?>" placeholder="Ingrese la direccion" >
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <small class="text-muted">(Opcional)</small>
                        <input type="text" name="correo" class="form-control" value="<?php echo $response->correo_cliente; ?>" placeholder="Ingrese el correo" >
                    </div>
                    <div class="form-group">
                        <label>Telefono</label>
                        <small class="text-muted">(Opcional)</small>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $response->telefono_cliente; ?>" placeholder="Ingrese el Telefono" >
                    </div>
               <div class="text-right">
                    <button type="submit" class="btn btn-success">Actualizar Cliente</button>
                    <button type="button" onclick="window.location.replace('?c=client&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div> 
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>