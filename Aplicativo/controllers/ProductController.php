<?php
require_once "models/Notificacion.php";
require_once "models/Producto.php";

class ProductController
{
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }
     $this->notificacion = new Notificacion();
     $this->model = new Producto();
   } 
  
    
   public function index()
   {   

        $response = $this->model->getall();
        $rows = $response;

        $link = "?c=product&m=index";
        $name = "Productos";
        $metodo = "Listado";
        $content = "product/productList.php";
        require_once "views/template/home/content.php";
        
       
   }


   public function create()
   {
      $cats = $this->model->categorias();
      $marcas = $this->model->marcas();

      $link = "?c=product&m=index";
      $name = "Productos";
      $metodo = "Crear";
      $content = "product/productCreate.php";
      require_once "views/template/home/content.php";
   }
   
   
   public function show()
   {   
       $cats = $this->model->categorias();
       $marcas = $this->model->marcas();
       $response = $this->model->getone(filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT));
       $link = "?c=product&m=index";
       $name = "Productos";
       $metodo = "Actualizar";

          if($response){
          $content = "product/productUpdate.php";
          require_once "views/template/home/content.php";

         }else{
              header("location:?c=product");
         }
   } 

   public function save()
     {
         $response = $this->model->insert($_POST);
         $msg = $response != false ? "saved": "dont_saved";
         header("location:?c=product&m=index&msg=".$msg);
     }
   


   public function update()
   {

      $response = $this->model->update($_POST);
      $msg = $response != false ? "updated": "dont_updated";
      header("location:?c=product&m=index&msg=".$msg);
  

  }

   public function delete()
   {
      $this->notificacion->insertar(1,"ha eliminado un producto");
      $response = $this->model->delete($_REQUEST["id"]);
      $msg = $response != false ? "deleted": "dont_deleted";
      header("location:?c=product&m=index&msg=".$msg);     
   }
}

?>