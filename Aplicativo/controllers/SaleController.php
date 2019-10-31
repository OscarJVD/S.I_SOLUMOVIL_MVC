<?php

require_once "models/Venta.php";

class SaleController
{
   private $model;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }
     $this->model = new Venta();
   } 
  
    
   public function index()
   {   

        $rows = $this->model->getall();
        $link = "?c=sale&m=index";
        $name = "Ventas";
        $metodo = "Listado";
        $content = "venta/ventaList.php";
        require_once "views/template/home/content.php";
        
       
   }


   public function create()
   {
      $link = "?c=sale&m=index";
      $name = "Vebtas";
      $metodo = "Crear nueva venta";
      $content = "venta/ventaCreate.php";
      require_once "views/template/home/content.php";
   }
   
   
//    public function show()
//    {   
//        $cats = $this->model->categorias();
//        $response = $this->model->getone(filter_var($_REQUEST["id"],FILTER_SANITIZE_NUMBER_INT));
//        $link = "?c=service&m=index";
//        $name = "Servicios";
//        $metodo = "Actualizar";

//           if($response){
//           $content = "service/serviceUpdate.php";
//           require_once "views/template/home/content.php";

//          }else{
//               header("location:?c=service");
//          }
//    } 

//    public function save()
//      {
//          $response = $this->model->insert($_POST);
//          $msg = $response != false ? "saved": "dont_saved";
//          header("location:?c=service&m=index&msg=".$msg);
//      }
   


//    public function update()
//    {

//       $response = $this->model->update($_POST);
//       $msg = $response != false ? "updated": "dont_updated";
//       header("location:?c=service&m=index&msg=".$msg);
  

//   }



//   public function delete()
//   {
//      $response = $this->model->delete($_REQUEST["id"]);
//      $msg = $response != false ? "deleted": "dont_deleted";
//      header("location:?c=service&m=index&msg=".$msg);     
//   }
 }

?>