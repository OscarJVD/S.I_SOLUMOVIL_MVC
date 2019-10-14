<div>

<center>
<br>
<br>
<img style="width:90px;height:90px" src="<?php echo $_SESSION["img_user"]; ?>" alt="..." class="rounded-circle">
<form  action="?c=auth&m=login" method="post">
        <p><?php echo $_SESSION["nickname_user"]?></p>
       <input type="password" name="password" placeholder="Contraseña "><br>
     <input type="submit" class="btn btn-info btn-sm" value="Iniciar Sesion">
<a href="?auth">regresar</a><br>
<a href="#">olvidaste tucontraseña?</a>
</form>
</center>
</div>