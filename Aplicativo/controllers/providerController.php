<?php
require_once "models/Proveedor.php";

class ProviderController
{
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }
        if($_SESSION["rol_user"] != 1){
         header("location:?msg=rol_user_protected&type=danger");
        }
     $this->model = new Proveedor();
   } 
  
    
   public function index()
   {   

        $rows = $this->model->getall();
        $link = "?c=provider&m=index";
        $name = "Proveedores";
        $metodo = "Listado";
        $content = "provider/providerList.php";
        require_once "views/template/home/content.php";
   }


   public function create()
   {
      $link = "?c=provider&m=index";
      $name = "Proveedores";
      $metodo = "Crear";
      $content = "provider/providerCreate.php";
      require_once "views/template/home/content.php";
   }
   
   
   public function show()
   {   
       $response = $this->model->getone(filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT));
       $link = "?c=provider&m=index";
       $name = "Proveedores";
       $metodo = "Actualizar";

          if($response){
          $content = "provider/providerUpdate.php";
          require_once "views/template/home/content.php";

         }else{
              header("location:?c=provider");
         }
   } 

   public function save()
     {
         $response = $this->model->insert($_POST);
         $msg = $response != false ? "saved": "dont_saved";
         header("location:?c=provider&m=index&msg=".$msg);
     }


   public function update()
   {

      $response = $this->model->update($_POST);
      $msg = $response != false ? "updated": "dont_updated";
      header("location:?c=provider&m=index&msg=".$msg);
  

  }


  public function delete()
  {
     $response = $this->model->delete($_REQUEST["id"]);
     $msg = $response != false ? "deleted": "dont_deleted";
     header("location:?c=provider&m=index&msg=".$msg);     
  }
}

?>