  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Table Example</div>
    <div class="card-body">
            


<form method="post" class="form-horizontal "enctype="multipart/form-data">
          <div>
          <input type="hidden" name="c" value="user">
          <input type="hidden" name="m" value="save">
          <input type="hidden" name="id_user" value="">
          <input type="hidden" name="est" value= 1 >

                   <div class="form-group row">
                      <label for="id" class="col-sm-3 control-label">Tipo de Documento:</label>
                    <div class="col-sm-9">
                         <select class="form-control" name="typeDoc" >
                           <option disabled="on" selected="on">---Tipo de Documento---</option>
                           <option <?php echo isset($_GET["1"]) ? $_GET["1"] == 1 ? "selected" : "" : "" ; ?> value=1 >Cédula de Ciudadanía</option>
                           <option <?php echo isset($_GET["1"]) ? $_GET["1"] == 2 ? "selected" : "" : "" ; ?> value=2 >Cédula de Extranjeria</option>
                           <option <?php echo isset($_GET["1"]) ? $_GET["1"] == 3 ? "selected" : "" : "" ; ?> value=3 >Numero de Identificacion Tributaria</option>
                         </select>
                     </div>
                   </div>

                   <div class="form-group row">
                       <label for="marca" class="col-sm-3 control-label">Numero de documeto:</label>
                      <div class="col-sm-9">
                          <input class="form-control" autocomplete="off" value="<?php echo isset($_GET["2"]) ? $_GET["2"] : "\"autofocus" ; ?>" type="cc-number" name="numDoc" placeholder="Numero de Documento"> 
                      </div>
                   </div>

                   <div class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Nombres:</label>
                      <div class="col-sm-9">
                          <input class="form-control" autocomplete="off" value="<?php echo isset($_GET["3"]) ? $_GET["3"] : "" ; ?>" type="name" name="name" placeholder="Registra los nombres" required="on">
                     </div>
                   </div> 
                 <div class="form-group row">
                        <label for="stock" class="col-sm-3 control-label">Apellidos:</label>
                    <div class="col-sm-9">
                       <input class="form-control" autocomplete="off" value="<?php echo isset($_GET["4"]) ? $_GET["4"] : "" ; ?>" type="name" name="surname"  placeholder="Registra los apellidos" required="on"> 
                    </div>
                 </div>

                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Nickname:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" value="<?php echo isset($_GET["5"]) ? $_GET["5"] : "" ; ?>" type="text" name="nickname"  placeholder="Nickname" required="on"> 
                     </div>
                 </div>
                  <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Contraseña:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" <?php echo isset($_GET["5"]) ? "autofocus=\"on\"": "" ; ?> type="password"  name="pass" minlength="5" maxlength="50" placeholder="Ingresa la contraseña" required> 
                     </div>
                 </div>
                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Correo:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" value="<?php echo isset($_GET["6"]) ? $_GET["6"] : "" ; ?>" type="email" name="email"   placeholder="Registra el correo" required="on"> 
                     </div>
                 </div>
                  <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Cargo ó Rol:</label>
                      <div class="col-sm-9">
                  <select class="form-control" id="cargo" name="rol" required="on">
                        <option selected="on" disabled="on" value="">-Selecciona el Cargo-</option>
                        <option <?php echo isset($_GET["7"]) ? $_GET["7"] == 1 ? "selected" : "" : "" ; ?> value=1 >Administrador</option>
                        <option <?php echo isset($_GET["7"]) ? $_GET["7"] == 2 ? "selected" : "" : "" ; ?> value=2  >Vendedor</option>
                   </select> 
                     </div>
                 </div>
                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Telefono:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" value="<?php echo isset($_GET["8"]) ? $_GET["8"] : "" ; ?>" type="tel" name="tel"  required placeholder="Registra el telefono de contacto" > 
                     </div>
                 </div>

                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">Direccion:</label>
                      <div class="col-sm-9">
                         <input class="form-control" autocomplete="off" value="<?php echo isset($_GET["9"]) ? $_GET["9"] : "" ; ?>" type="text" name="dir"   placeholder="Registra la direccion" > 
                     </div>
                 </div>
    
                 </div>
                 <div  class="form-group row">
                        <label for="referencia" class="col-sm-3 control-label">
                             <input type="submit" class="btn btn-success" value="Registrar Usuario">
                        </label>
                      <div class="col-sm-9">
                      
                     </div>

      </div>
      </form>

      </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
  </div>
</div>