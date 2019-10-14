<?php
require_once "models/User.php";

class UserController
{
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?you_dont_have_access");
     }
     if($_SESSION["rol_user"] != 1){
      header("location:?you_dont_have_access");
     }
     $this->model = new User();
   } 
  
    
   public function index()
   {   
       $num = isset($_REQUEST["num"]) ? filter_var($_REQUEST["num"],FILTER_SANITIZE_NUMBER_INT) : 1;
       $num = $num == 0 ? 1 : $num ;
       $this->model->actualizar_img();
        $response = $this->model->getall($num);
        $rows = $response[0];
        $page = $response[1];
        $paginate = $response[2];
        $content = "user/userList.php";
        require_once "views/template/home/content.php";
        
       
   }


   public function create()
   {

      $content = "user/userCreate.php";
      require_once "views/template/home/content.php";
   }
   
   
   public function show()
   {
          $user = $this->model->getone(filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT));

          if($user){
          $content = "user/userUpdate.php";
          require_once "views/template/home/content.php";

         }else{
              header("location:?c=user");
         }
      $content = "user/user.php";
      require_once "views/template/home/content.php";
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
         header("location:?c=user&m=index&msg=".$msg);
      }else{
         // header("location:?c=user&m=create&msg=extencion_no_permitida&1="
         // .$_POST["typeDoc"]."&2=".$_POST["numDoc"]."&3=".$_POST["name"]
         // ."&4=".$_POST["surname"]."&5=".$_POST["nickname"]."&6=".$_POST["email"]
         // ."&7=".$_POST["rol"]."&8=".$_POST["tel"]."&9=".$_POST["dir"]);

         $cadena = "?c=user&m=create&msg=faltan_datos&1=".
         $_POST["typeDoc"]."&2=".$_POST["numDoc"]."&3=".$_POST["name"]
         ."&4=".$_POST["surname"]."&5=".$_POST["nickname"]."&6=".$_POST["email"]
         ."&7=".$_POST["rol"]."&8=".$_POST["tel"]."&9=".$_POST["dir"];
         
         echo  "<script> window.location.href = '" . $cadena . "'; </script>";
         // header("location:".$cadena);

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
       $this->model->delete($_REQUEST["id"]);
       header("location:?c=user&m=index&msg=deleted");     
   }
}

?>