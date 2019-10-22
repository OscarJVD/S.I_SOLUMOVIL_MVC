<div class="container">
     <div class="card login mx-auto mt-5 mb-5" >
         <div class="card-header text-center">Inicio de Sesion - Solumovil</div>
            <div class="card-body contenedor align-center ">
			<img  src="<?php echo $_SESSION["img_user"]; ?>" alt="..." class="img-log rounded-circle mx-auto d-block">
			<p class="h5 text-center"><?php echo $_SESSION["nickname_user"]?></p>
               <form method="post"  class="formulario" name="formulario_registro">
                    <input type="hidden" name="c" value="auth">
                    <input type="hidden" name="m" value="login">
				    <div class="input-group">
				    	<input class="mb-5" type="password" id="nombre" value=""  name="password" autofocus>
				    	<label class="label" for="nombre">Contraseña</label>
               </div>
                  <?php require "views/login/errorHandler.php";?>
					<div class="form-group">
							<span><a href="#">¿Olvidate tu contraseña?</a></span>
					  <input type="submit" class="btn btn-primary btn-md float-right" value="Iniciar Sesion"> 
					</div>
        <div class="form-group">
           <a class="btn  btn-md float-left" href="?auth">Regresar</a>
        </div>
				
		
               </form>
            </div>  
      </div>
</div>