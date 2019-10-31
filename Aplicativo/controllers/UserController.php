<?php
require_once "models/Notificacion.php";
require_once "models/User.php";
require_once "helpers/getDate.php";
class UserController
{
   private $model;
   private $notificacion;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }
        if($_SESSION["rol_user"] != 1){
         header("location:?msg=rol_user_protected&type=danger");
        }
     $this->notificacion = new Notificacion();
     $this->model = new User();
   } 
  
    
   public function index()
   {   

       $this->model->actualizar_img();
        $response = $this->model->getall();
        $rows = $response;

        $link = "?c=user&m=index";
        $name = "Usuarios";
        $metodo = "Listado";
        $content = "user/userList.php";
        require_once "views/template/home/content.php";
        
       
   }


   public function create()
   {
      $link = "?c=user&m=index";
      $name = "Usuarios";
      $metodo = "Crear";
      $content = "user/userCreate.php";
      require_once "views/template/home/content.php";
   }
   
   
   public function show()
   { 
      $user = $this->model->getone(filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT));
      $link = "?c=user&m=index";
      $name = "Usuarios";
      $metodo = "Actualizar";
          if(is_object($user)){
          $content = "user/userUpdate.php";
          require_once "views/template/home/content.php";

         }else{
              header("location:?c=user");
         }
   } 

   public function save()
   {
      
     if(!empty($_POST["name"]) && 
        !empty($_POST["surname"]) &&
        !empty($_POST["nickname"]) &&
        !empty($_POST["pass"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["rol"])){
   
         $response = $this->model->insert($_POST);
         $msg = $response != false ? "saved": "dont_saved";
         $this->notificacion->insertar(5,"ha creado un usuario");
         header("location:?c=user&m=index&msg=".$msg);
      }else{

         $cadena = "?c=user&m=create&msg=faltan_datos&1=".
         $_POST["typeDoc"]."&2=".$_POST["numDoc"]."&3=".$_POST["name"]
         ."&4=".$_POST["surname"]."&5=".$_POST["nickname"]."&6=".$_POST["email"]
         ."&7=".$_POST["rol"]."&8=".$_POST["tel"]."&9=".$_POST["dir"];
         
         echo  "<script> window.location.href = '" . $cadena . "'; </script>";

      }
   }


   public function update()
   {
      $info = new SplFileInfo($_FILES["img"]["name"]);
      $extencion = $info->getExtension();
      // die($extencion);
      
  if($extencion == "jpg" || 
     $extencion == "jpeg" ||
     $extencion == "png" ||
     $extencion == "svg" ||
     $extencion == "gif" ||
     $extencion == "" ){

      $response = $this->model->update($_POST,$_FILES);
      $msg = $response != false ? "updated": "dont_updated";
      header("location:?c=user&m=index&msg=".$msg);
   }else{
      header("location:?c=user&m=index&msg=extencion_no_permitida");
   }
  }



   public function delete()
   {
      $this->notificacion->insertar(5,"ha eliminado un usuario");
      $response = $this->model->delete($_REQUEST["id"]);
      if($response){ 
         header("location:?c=user&m=index&msg=deleted");     
      }else{
         header("location:?c=user&m=index&msg=dont_deleted");
      }
   }
   // provicional
   public function loginuserhistory()
   {
      $rows = $this->model->loginuserhistory();
      if($rows){
         $link = "?c=user&m=index";
         $name = "Estadisticas";
         $metodo = "Hitorial de ingreso de usuarios";
         $content = "user/loginuserList.php";
         require_once "views/template/home/content.php";
      }else{
         header("location:?c=main");
      }
   }

}

?>