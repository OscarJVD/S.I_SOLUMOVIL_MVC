<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-mobile-alt"></i>
      Registro de Marca</div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="marca">
          <input type="hidden" name="m" value="save">
          <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]; ?>">
          <input type="hidden" name="estado" value=1 >

                    <div class="form-group">
                        <label>Nombre de la marca</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="marca" class="form-control" placeholder="Ingrese la marca" required>
                    </div>

               <div class="text-right">
                    <button type="submit" class="btn btn-success">Registrar Marca</button>
                    <button type="button" onclick="window.location.replace('?c=marca&m=index');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>