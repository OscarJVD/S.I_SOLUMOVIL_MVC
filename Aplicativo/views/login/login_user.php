
<!-- <img style="width:90px;height:90px" src="assets/img/empresa/logo.png" alt="..." class="rounded-circle"><br><br>
      <form  method="post">
       <input type="hidden" name="c" value="auth">
       <input type="hidden" name="m" value="login">
       <input type="search" name="user" id="" placeholder="Usuario" value=""><br>
       <input type="submit" class="btn btn-primary btn-sm" value="Siguiente"><br>
      <a href="#">olvidaste tu usuario</a>
</div> -->

<div class="container">
     <div class="card login mx-auto mt-5 mb-5" >
         <!-- <div class="card-header text-center">Header</div> -->
            <div class="card-body text ">
            <img style="width:90px;height:90px" src="assets/img/empresa/logo.jpg" alt="..." class="mx-auto rounded-circle">
               <form method="post">
                    <input type="hidden" name="c" value="auth">
                    <input type="hidden" name="m" value="login">
                  <div class="form-group">
                        <div class="form-label-group">
                          <input type="text" class="form-control" name="user" value="<?php echo  isset($_SESSION["nickname_user"]) ? $_SESSION["nickname_user"] : (isset($_GET["user"]) ? $_GET["user"] : ""); ?>" placeholder="Your User **">      
                          </div>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-sm float-right" value="Siguiente"> 
                   </div>
               </form>
            </div>  
      </div>
</div>
