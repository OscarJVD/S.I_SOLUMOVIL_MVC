<?php

require_once "models/Venta.php";
require_once "models/Cliente.php";
class SaleController
{
   private $model;
   private $m_cliente;

   public function __construct()
   {
    if(empty($_SESSION["id_user"]) || !isset($_SESSION["id_user"])){
        header("location:?msg=session_expired&type=info");

    }
     $this->m_cliente = new Cliente();
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
      $name = "Ventas";
      $metodo = "Crear nueva venta";
      $content = "venta/ventaCreate.php";
      require_once "views/template/home/content.php";
   }
   
   
   public function buscar_cliente()
   {   

       $response = $this->m_cliente->busquedaCliente(filter_var($_REQUEST["t"],FILTER_SANITIZE_STRING));
          if($response){
            echo json_encode($response);
         }else{
            return false;
         }
   } 

   public function datos_cliente()
   {   

       $response = $this->m_cliente->getone(filter_var($_REQUEST["id"],FILTER_SANITIZE_STRING));
          if($response){
            echo json_encode($response);
         }else{
            return false;
         }
   } 
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