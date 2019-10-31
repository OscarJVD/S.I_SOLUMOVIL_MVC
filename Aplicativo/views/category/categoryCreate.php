<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-archive"></i>
       Crear categoria <?php echo $_REQUEST["type"]; ?></div>
    <div class="card-body">
<form method="post" enctype="multipart/form-data">
       
          <input type="hidden" name="c" value="category">
          <input type="hidden" name="m" value="save">    
          <input type="hidden" name="tipo" value="<?php echo$_REQUEST["type"]; ?>">  

                    <div class="form-group">
                        <label>Nombre de la categoria</label>
                        <small class="text-muted">(Obligatorio)</small>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre de la categoria" >
                    </div>
                    <div class="form-group">
                        <label>Descripcion de la categoria</label>
                        <small class="text-muted">(Opcional)</small>
                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion de la categoria" required>
                    </div>
               <div class="text-right">
                    <button type="submit" class="btn btn-success">Registrar Categoria</button>
                    <button type="button" onclick="window.location.replace('?c=category&m=index&type=<?php echo $_REQUEST['type']; ?>');"  class="btn btn-secondary">Cancelar</button>
                 </div>
           </form>
      </div>
      <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>
</div>