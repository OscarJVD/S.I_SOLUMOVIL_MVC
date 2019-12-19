<?php
require_once "models/Notificacion.php";
require_once "models/Marca.php";

class MarcaController
{
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }
     $this->notificacion = new Notificacion();
     $this->model = new Marca();
   } 
  
    
   public function index()
   {   

        $response = $this->model->getall();
        $rows = $response;

        $link = "?c=marca&m=index";
        $name = "Marcas";
        $metodo = "Listado";
        $content = "marca/marcaList.php";
        require_once "views/template/home/content.php";
        
       
   }


   public function create()
   {

      $link = "?c=marca&m=index";
      $name = "Marcas";
      $metodo = "Crear";
      $content = "marca/marcaCreate.php";
      require_once "views/template/home/content.php";
   }
   
   
   public function show()
   {   

       $response = $this->model->getone(filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT));
       $link = "?c=marca&m=index";
       $name = "Marcas";
       $metodo = "Actualizar";
          if($response){
          $content = "marca/marcaUpdate.php";
          require_once "views/template/home/content.php";

         }else{
              header("location:?c=marca");
         }
   } 

   public function save()
     {
         $response = $this->model->insert($_POST);
         if($response){
            header("location:?c=marca&m=index&msg=No_agregada");

         }else{
             header("location:?c=marca&m=index&msg=agregada");

         }
     }
   


   public function update()
   {

    $response = $this->model->update($_POST);
    if($response){
       header("location:?c=marca&m=index&msg=No_actualizada");

    }else{
        header("location:?c=marca&m=index&msg=actualizada");

    }
  }

//    public function delete()
//    {   
//      $response = $this->model->delete($_REQUEST["id"]);
//     if($response){
//        header("location:?c=marca&m=index&msg=No_eliminado");

//     }else{
//         header("location:?c=marca&m=index&msg=eliminado");

//     }
//    }
}

?>