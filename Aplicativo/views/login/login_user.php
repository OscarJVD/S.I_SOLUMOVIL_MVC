<div class="container">
     <div class="card login mx-auto mt-5 mb-5" >
         <div class="card-header text-center">Inicio de Sesion - Solumovil</div>
            <div class="card-body contenedor align-center ">
			<img  src="assets/img/empresa/logo.jpg" alt="..." class="img-log rounded mx-auto d-block">
			<p class="h5 text-center">Ir a Solumovil</p>
               <form method="post"  class="formulario" name="formulario_registro">
                    <input type="hidden" name="c" value="auth">
                    <input type="hidden" name="m" value="login">
				    <div class="input-group">
				    	<input class="mb-5" type="text" id="nombre" value=""  name="user" autofocus>
				    	<label class="label" for="nombre">Nickname del usuario</label>
					</div>
					<?php require "views/login/errorHandler.php";?>
					<div class="form-group">
							<span><a href="#">¿Olvidate tu usuario?</a></span>
					  <input type="submit" class="btn btn-primary btn-md float-right" value="Siguiente"> 
					</div>
				
		
               </form>
            </div>  
      </div>
</div>
	
	