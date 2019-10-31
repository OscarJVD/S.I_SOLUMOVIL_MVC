<?php
require_once "models/Cliente.php";
require_once "models/Notificacion.php";
class ClientController
{
   private $notificacion;
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }
    $this->notificacion = new Notificacion();
     $this->model = new Cliente();
   } 
  
    
   public function index()
   {   

        $rows = $this->model->getall();
        $link = "?c=client&m=index";
        $name = "Clientes";
        $metodo = "Listado";
        $content = "client/clientList.php";
        require_once "views/template/home/content.php";
        
       
   }


   public function create()
   {
      $docs = $this->model->TipoDocumento();
      $link = "?c=client&m=index";
      $name = "Clientes";
      $metodo = "Crear";
      $content = "client/clientCreate.php";
      require_once "views/template/home/content.php";
   }
   
   
   public function show()
   {   
       $docs = $this->model->TipoDocumento();
       $response = $this->model->getone(filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT));
       $link = "?c=client&m=index";
       $name = "Clientes";
       $metodo = "Actualizar";

          if($response){
          $content = "client/clientUpdate.php";
          require_once "views/template/home/content.php";

         }else{
              header("location:?c=client");
         }
   } 

   public function save()
     {
         $response = $this->model->insert($_POST);
         $msg = $response != false ? "saved": "dont_saved";
         header("location:?c=client&m=index&msg=".$msg);
     }
   


   public function update()
   {

      $response = $this->model->update($_POST);
      $msg = $response != false ? "updated": "dont_updated";
      header("location:?c=client&m=index&msg=".$msg);
  

  }



  public function delete()
  {
     $this->notificacion->insertar(6,"ha eliminado un cliente");
     $response = $this->model->delete($_REQUEST["id"]);
     $msg = $response != false ? "deleted": "dont_deleted";
     header("location:?c=client&m=index&msg=".$msg);     
  }
}

?>