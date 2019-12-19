<?php
require_once 'libs/fpdf/fpdf.php';
require_once 'libs/fpdf/writeHTML.php';

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
   
   // datos por ajax
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

   public function producto_DV()
   {   

      $response = $this->model->get_all_producto_DV(filter_var($_REQUEST["value"],FILTER_SANITIZE_STRING));
      if(count($response) > 0){
        echo json_encode($response);
     }else{
        return false;
     }
   } 

   public function producto_getone_DV()
   {   

      $response = $this->model->getone_DV(filter_var($_REQUEST["id"],FILTER_SANITIZE_STRING));
      if($response){
        echo json_encode($response);
     }else{
        return false;
     }
   } 


   public function servicio_DV()
   {   

      $response = $this->model->get_all_servicio_DV(filter_var($_REQUEST["value"],FILTER_SANITIZE_STRING));
      if(count($response) > 0){
        echo json_encode($response);
     }else{
        return false;
     }
   } 

   public function servicio_getone_DV()
   {   

      $response = $this->model->servicio_getone_DV(filter_var($_REQUEST["id"],FILTER_SANITIZE_STRING));
      if($response){
        echo json_encode($response);
     }else{
        return false;
     }
   } 


   public function nueva_venta()
   {   
      $response = $this->model->agregar_venta($_POST["data"]);
      if($response){
        echo $response;
     }else{
        return false;
     }
   } 


   public function anular()
   {   
      $response = $this->model->anular_venta($_REQUEST["id"]);
      if($response){
         header("location:?c=sale&m=index&msg=anulada");  
     }else{
      header("location:?c=sale&m=index&msg=no_anulada");  
     }
   } 

   public function update()
   {   
      $response = $this->model->update($_POST);
      if($response){
         header("location:?c=sale&m=index&msg=Actulizada");  
     }else{
      header("location:?c=sale&m=index&msg=no_Actulizadaa");  
     }
   } 

   public function getone()
   {
      $response = $this->model->getone($_REQUEST["id"]);
    
      $link = "?c=sale&m=index";
      $name = "Ventas";
      $metodo = "Actualizar Venta";
      $content = "venta/ventaupdate.php";
      require_once "views/template/home/content.php";
   }

   public function ver_factura()
   {
      $response = $this->model->obtener_detalle($_REQUEST["id"]);
      $factura = $this->model->obtener_factura($_REQUEST["id"]);

      $estado =$factura->id_estado_venta_FK == 1 ? "Pagado" : "Pendiente";
      $pdf = new PDF();
      $pdf->AddPage();
      // $pdf->SetFont('Arial','B',26);
      // $pdf->Cell(120,10,'Solumovil',1,1,"L",0);

      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(40,10,'Fecha: ' . $factura->fecha_venta,0,0,"L",0);
      $pdf->Cell(100,10,'Estado: ' . $estado ,0,1,"R",0);
      $pdf->Cell(40,10,'Vendedor: ' . $factura->nombres_usuario,0,1,"L",0);
      $pdf->Cell(40,10,'Cliente: ' . $factura->nombre_cliente,0,1,"L",0);


      $pdf->Cell(47,9, "ID",1,0,"C",0 );
      $pdf->Cell(47,9, "Tipo",1,0,"C",0 );
      $pdf->Cell(47,9, "Cantidad" ,1,0,"C",0 );
      $pdf->Cell(47,9, "Precio" ,1,1,"C",0 );
      foreach($response as $data){
         $pdf->Cell(47,9, $data->id_producto_FK !== null ? $data->id_producto_FK :  $data->id_servicio_FK,1,0,"C",0 );
         $pdf->Cell(47,9, $data->id_producto_FK == null ? "Producto": "Servicio",1,0,"C",0 );
         $pdf->Cell(47,9, $data->cantidad_detalle_venta ,1,0,"C",0 );
         $pdf->Cell(47,9,"$ ". number_format($data->precio_detalle_venta) ,1,1,"L",0);


      }

      
      $pdf->Cell(141,10,'Subtotal: ',1,0,"R",0);
      $pdf->Cell(47,10, "$ ". number_format($factura->subtotal_venta),1,1,"L",0);
      
      
      $pdf->Cell(141,10,'Descuento: ',1,0,"R",0);
      $pdf->Cell(47,10, "$ ". number_format($factura->descuento_venta),1,1,"L",0);
      
      $pdf->Cell(141,10,'Total: ',1,0,"R",0);
      $pdf->Cell(47,10, "$ ". number_format( $factura->total_venta),1,1,"L",0);
      

      $pdf->Output();

   }




 }

?>