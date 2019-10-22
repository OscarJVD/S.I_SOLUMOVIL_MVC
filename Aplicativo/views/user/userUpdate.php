
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-fw fa-user"></i>
     Actualizar Usuario</div>
    <div class="card-body">

<form method="post" class="form-horizontal" enctype="multipart/form-data">
          
          <input type="hidden" name="c" value="user">
          <input type="hidden" name="m" value="update">
          <input type="hidden" name="id_user" value="<?php echo $user->id_usuario_PK;  ?>">
          <input type="hidden" name="est" value= 1 >
          <input type="hidden" name="foto_usuario" value="<?php echo $user->foto_usuario;  ?>">


                   <div class="form-group row">
                      <label for="id" class="col-sm-3 control-label">Tipo de Documento:</label>
                    <div class="col-sm-9">
                         <select class="form-control" name="typeDoc" >
                           <option disabled="on" selected="on">---Tipo de Documento---</option>
                           <option <?php echo $user->id_tipo_documento_FK == 1 ? "selected" : "selected"; ?> value=1 >Cédula de Ciudadanía</option>
                           <option <?php echo $user->id_tipo_documento_FK == 2 ? "selected" : ""; ?> value=2 >Cédula de Extranjeria</option>
                           <option <?php echo $user->id_tipo_documento_FK == 3 ? "selected" : ""; ?> value=3 >Numero de Identificacion Tributaria</option>
                         </select>
                     </div>
                   </div>

                   <div class="form-group row">
                       <label for="marca" class="col-sm-3 control-label">Numero de documeto:</label>
                      <div class="col-sm-9">
                          <input class="form-control" autocomplete="off" autofocus="on" value="<?php echo $user->numero_documento_usuario;  ?>" type="cc-number" name="numDoc" placeholder="Numero de Documento"> 
                      </div>
                   </div>

                   <div class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Nombres:</label>
                      <div class="col-sm-9">
                          <input class="form-control" autocomplete="off" type="name" name="name"  value="<?php echo $user->nombres_usuario;  ?>" placeholder="Registra los nombres" required="on">
                     </div>
                   </div> 
                 <div class="form-group row">
                        <label for="stock" class="col-sm-3 control-label">Apellidos:</label>
                    <div class="col-sm-9">
                       <input class="form-control" autocomplete="off" type="name" name="surname"  value="<?php echo $user->apellidos_usuario;  ?>"   placeholder="Registra los apellidos" required="on"> 
                    </div>
                 </div>

                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Nickname:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" type="text" name="nickname"  value="<?php echo $user->nickname_usuario;  ?>"  placeholder="Nickname" required="on"> 
                     </div>
                 </div>
                  <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Contraseña:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" type="password"  name="pass"  value="<?php echo $user->clave_usuario;  ?>" minlength="5" maxlength="50" placeholder="Ingresa la contraseña" required> 
                     </div>
                 </div>
                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Correo:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" type="email" name="email"  value="<?php echo $user->correo_usuario;  ?>"  placeholder="Registra el correo" required="on"> 
                     </div>
                 </div>
                  <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Cargo ó Rol:</label>
                      <div class="col-sm-9">
                  <select class="form-control" id="cargo" name="rol" required="on">
                        <option selected="on" disabled="on" value="">-Selecciona el Cargo-</option>
                        <option <?php echo $user->id_rol_usuario_FK == 1 ? "selected" : ""; ?> value=1 >Administrador</option>
                        <option <?php echo $user->id_rol_usuario_FK == 2 ? "selected" : ""; ?> value=2  >Vendedor</option>
                   </select> 
                     </div>
                 </div>
                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Telefono:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" type="tel" name="tel"  value="<?php echo $user->telefono_usuario;  ?>" placeholder="Registra el telefono de contacto" > 
                     </div>
                 </div>

                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Direccion:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" type="text" name="dir"  value="<?php echo $user->direccion_usuario;  ?>" placeholder="Registra la direccion" > 
                     </div>
                 </div>
                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Subir Imagen</label>
                      <div class="col-sm-5">
                      <div class="input-group mb-3">

                           <div class="custom-file form-group">
                             <input type="file" class="form-control-file"  name="img"  accept=".png,.jpg,.jpeg,.gif,.svg"> 
                           </div>
                     </div>
                 </div>
                       <div class="col-sm-4">
                          <img style="width:100px;height:100px" src="<?php echo $user->foto_usuario; ?>" alt="..." class="rounded">
                     </div>
                 </div>
                   
                 <div class="text-right">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" onclick="window.location.replace('?c=user&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
      </form>

      </div>
    <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>