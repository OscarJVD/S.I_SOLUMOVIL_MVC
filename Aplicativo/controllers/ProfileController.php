<?php
require_once "models/User.php";

class ProfileController
{
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }

   
     $this->model = new User();
   } 
  
    
   public function index()
   {   
        $this->model->actualizar_img();
        $docs = $this->model->tipoDocumento();
        $user = $this->model->getone(filter_var($_SESSION["id_user"],FILTER_SANITIZE_NUMBER_INT));
        $link = "?c=profile&m=index";
        $name = "Editar Perfil";
        $metodo = "Editar";
            if($user){

                  $content = "user/userProfile.php";
                  $_SESSION["estado_profile"] =  $user->id_estado_FK;
                  $_SESSION["rol_profile"] =  $user->id_rol_usuario_FK;
             
            require_once "views/template/home/content.php";
  
           }else{
                header("location:?c=user");
           }
   }

   public function update()
   {
      $info = new SplFileInfo($_FILES["img"]["name"]);
      $extencion = $info->getExtension();

     if(isset($_SESSION["estado_profile"]) || isset($_SESSION["rol_profile"])){

        $_POST["est"] = $_SESSION["estado_profile"];
        $_POST["rol"] = $_SESSION["rol_profile"];

     }
      
  if($extencion == "jpg" || 
     $extencion == "jpeg" ||
     $extencion == "png" ||
     $extencion == "svg" ||
     $extencion == "gif" ||
     $extencion == "" ){

      $response = $this->model->update($_POST,$_FILES);
      if($response){
          session_unset($_SESSION["estado_profile"]);
          session_unset($_SESSION["rol_profile"]);
           $msg ="updated";
      }else{
          $msg = "dont_updated";
      }
      header("location:?c=profile&m=index&msg=".$msg);
   }else{
      header("location:?c=profile&m=index&msg=extencion_no_permitida");
   }
  }
}

?>