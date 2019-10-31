<?php
require_once "models/Categoria.php";

class CategoryController
{
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }

     $this->model = new Categoria();
   } 
  
    
   public function index()
   {   
    if($_REQUEST["type"] == "producto" || $_REQUEST["type"] == "servicio"){

    
        $rows = $this->model->getall(filter_var($_REQUEST["type"],FILTER_SANITIZE_STRING)); 

        $link = "?c=main&m=index";
        $name = "Categorias";
        $metodo = "Listado";
        $content = "category/categoryList.php";
        require_once "views/template/home/content.php";
        
    }else{
        header("location:?c=main");
    }       
   }


   public function create()
   {
    if($_REQUEST["type"] == "producto" || $_REQUEST["type"] == "servicio"){

      $link = "?c=category&m=index&type={$_REQUEST["type"]}";
      $name = "Categoria ".ucwords($_REQUEST["type"]);
      $metodo = "Crear";
      $content = "category/categoryCreate.php";
      require_once "views/template/home/content.php";

    }else{
        header("location:?c=main");
    }  
   }
   
   
   public function show()
   {   
    if($_REQUEST["type"] == "producto" || $_REQUEST["type"] == "servicio"){

       $id = filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT);
       $tipo = filter_var($_REQUEST["type"],FILTER_SANITIZE_STRING);

       $response = $this->model->getone($id,$tipo);
       $link = "?c=category&m=index&type={$tipo}";
       $name = "Categorias";
       $metodo = "Actualizar";

          if($response){
            $id = "id_categoria_{$_REQUEST["type"]}_PK";
            $nombre = "nombre_categoria_{$_REQUEST["type"]}";
            $descripcion = "descripcion_categoria_{$_REQUEST["type"]}";

          $content = "category/categoryUpdate.php";
          require_once "views/template/home/content.php";

         }else{
              header("location:?c=category&m=index&type={$tipo}");
         }

        }else{
            header("location:?c=main");
        }  

   } 

   public function save()
     {
         if(isset($_POST["tipo"]) && !empty($_POST["tipo"])){

             if($_POST["tipo"] == "producto" || $_POST["tipo"] == "servicio"){
            
                $response = $this->model->insert($_POST);
                $msg = $response != false ? "saved": "dont_saved";
                header("location:?c=category&m=index&type={$_POST["tipo"]}&msg=".$msg);
             
              }else{
                header("location:?c=main");
              }
         }else{
            header("location:?c=main");
         }
    }
   


   public function update()
   {
    if(isset($_POST["tipo"]) && !empty($_POST["tipo"])){

         if($_POST["tipo"] == "producto" || $_POST["tipo"] == "servicio"){
 
              $response = $this->model->update($_POST);
              $msg = $response != false ? "updated": "dont_updated";
              header("location:?c=category&m=index&type={$_POST["tipo"]}&msg=".$msg);
  
         }else{
            header("location:?c=main");
       }
    }else{
        header("location:?c=main");
    }
}

   public function delete()
   {
    if(isset($_REQUEST["type"]) && !empty($_REQUEST["type"])){

        if($_REQUEST["type"] == "producto" || $_REQUEST["type"] == "servicio"){
             
            $id = filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT);
            $tipo = filter_var($_REQUEST["type"],FILTER_SANITIZE_STRING);
            $response = $this->model->delete($id,$tipo);
            $msg = $response != false ? "deleted": "dont_deleted";
           header("location:?c=category&m=index&type={$_REQUEST["type"]}&msg=".$msg);
        
         }else{
           header("location:?c=main");
         }
    }else{
       header("location:?c=main");
    }
   
   }

}

?>