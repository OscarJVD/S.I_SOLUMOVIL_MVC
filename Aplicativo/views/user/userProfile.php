
<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-fw fa-user"></i>
       Editar Perfil</div>
    <div class="card-body">
     <form method="post" enctype="multipart/form-data">
          <div class="row">
       
          <input type="hidden" name="c" value="profile">
          <input type="hidden" name="m" value="update">
          <input type="hidden" name="foto_usuario" value="<?php echo $user->foto_usuario; ?>">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"];?>">

           <div class="col-md-4">
              <div class="mx-md-2">
               <div class="border p-2 mb-3 py-4 text-center">
                  <img class="img-profile my-3 rounded-circle mx-auto d-block " src="<?php echo $_SESSION["img_user"];?>" alt="">
                   <div id="file" class=""> 
                      <p class="txt text-muted">Cambiar imagen. Click <a href="#"> Aqui.</a></p>
                      <input type="file" name="img"  accept=".png,.jpg,.jpeg,.gif,.svg">
                   </div>
               </div>
               <div class="form-group">
                        <label>Nombre completo</label>
                        <input type="text" disabled class="form-control" value="<?php echo $user->nombres_usuario ." ".$user->apellidos_usuario; ?>" placeholder="Ingrese el primer nombre" required>
               </div>
               <div class="form-group">
                        <label>Correo</label>
                        <input type="text" disabled class="form-control" value="<?php echo $user->correo_usuario; ?>" placeholder="Ingrese el primer nombre" required>
               </div>
               <div class="form-group">
                        <label>Rol</label>
                        <input type="text" disabled class="form-control" value="<?php echo $user->id_rol_usuario_FK == 1 ? "Administrador":"Vendedor" ; ?>" placeholder="Ingrese el primer nombre" required>
               </div>
               <div class="form-group">
                        <label>Estado</label>
                        <input type="text" disabled class="form-control" value="<?php echo $user->id_estado_FK == 1 ? "Activo" : "Inactivo"; ?>" placeholder="Ingrese el primer nombre" required>
               </div>
              </div>
           </div>
           <div class="col-md-8">
               <div class="row">
                   <div class="col-md-6">
                   <div class="form-group">
                         <label>Tipo de documento</label>
                         <select class="form-control" name="typeDoc" >
                            <option disabled="on" selected="on">---Tipo de Documento---</option>
                            <?php foreach ($docs as $doc):?>
                             <option <?php echo $doc->id_tipo_documento_PK == $user->id_tipo_documento_FK ? "selected" : ""; ?>  value=<?php echo $doc->id_tipo_documento_PK; ?> ><?php echo $doc->descripcion_tipo_documento; ?></option>
                            <?php endforeach; ?>
                          </select>
                     </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                           <label>Numero de documeto</label>
                           <input type="text" name="numDoc" value="<?php echo $user->numero_documento_usuario;?>" class="form-control" placeholder="Ingrese el número de documento" >
                       </div>
                     </div>
                   <div class="col-md-6">
                      <div class="form-group">
                          <label>Nombres</label>
                          <input type="text" name="name" class="form-control" value="<?php echo $user->nombres_usuario;?>" placeholder="Ingrese el primer nombre" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                         <label>Apellidos</label>
                         <input type="text" name="surname" class="form-control"  value="<?php echo $user->apellidos_usuario; ?>" placeholder="Ingrese el primer apellido" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Nickname</label>
                          <input type="text" name="nickname" class="form-control" value="<?php echo $user->nickname_usuario;?>" placeholder="Ingrese el primer nombre" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                         <label>Correo</label>
                         <input type="text" name="email" class="form-control"  value="<?php echo $user->correo_usuario; ?>" placeholder="Ingrese el primer apellido" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Telefono</label>
                          <input type="text" name="tel" class="form-control" value="<?php echo $user->telefono_usuario;?>" placeholder="Ingrese el primer nombre" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                         <label>Direccion</label>
                         <input type="text" name="dir" class="form-control"  value="<?php echo $user->direccion_usuario; ?>" placeholder="Ingrese el primer apellido" >
                      </div>
                    </div>
                <?php if($_SESSION["rol_user"] == 1): ?>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Rol de Usuario</label>
                        <select class="form-control" id="cargo" name="rol" required="on">
                          <option selected="on" disabled="on" value="">-Selecciona el Cargo-</option>
                          <option <?php echo $user->id_rol_usuario_FK == 1 ? "selected" : ""; ?> value=1 >Administrador</option>
                          <option <?php echo $user->id_rol_usuario_FK == 2 ? "selected" : ""; ?> value=2  >Vendedor</option>
                        </select> 
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                       <label>Estado</label>
                       <select class="form-control" name="est" required=>
                           <option selected="on" disabled="on" value="">-Selecciona un estado-</option>
                           <option <?php echo $user->id_estado_FK == 1 ? "selected": "";  ?> value="1">Activo</option>
                           <option <?php echo $user->id_estado_FK == 2 ? "selected": "";  ?> value="2">Inactivo</option>
                       </select> 
                          </div>
                        </div>
                <?php endif; ?>
                        <div class="col-md-12">
                      <div class="form-group">
                         <label>Mi contraseña</label>
                         <input type="password" name="pass" class="form-control"  value="<?php echo $user->clave_usuario; ?>" placeholder="Ingrese el primer apellido" required>
                      </div>
                    </div>
                  </div>
               <div class="text-right">
                    <button type="submit" class="btn btn-success">Actualizar Perfil</button>
                    <button type="button" onclick="window.location.replace('?c=main&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
                 </div>
           </div>  
           </form>
      </div> 
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>