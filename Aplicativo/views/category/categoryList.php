<div class="card mb-3">
    <div class="card-header">
    <i class="fas fa-archive"></i>
       Categoria <?php echo ucwords($_REQUEST["type"]); ?></div>
    <div class="card-body">


     <div class="table-responsive">
       <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
             <th>#</th>
             <th>Categoria</th>
             <th>Descripcion</th>
             <th>Estado</th>
             <th>Acciones</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
             <th>#</th>
             <th>Categoria</th>
             <th>Descripcion</th>
             <th>Estado</th>
             <th>Acciones</th>
          </tr>
        </footd>
       <tbody>
         <?php 
           if($_REQUEST["type"] == "producto"){
               require_once "views/category/categoryProduct.php";
           }else{
              require_once "views/category/categoryService.php";
           }
         ?>
       </tbody>
     </table>
     </div>
 
    </div>
    <div class="card-footer small text-muted">Actualizado Hoy <?php echo date('h:i a');?></div>
  </div>