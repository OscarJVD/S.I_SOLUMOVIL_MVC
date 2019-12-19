<?php
class Venta
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }


    public function getall()
    {
      try{
        
         $stmt = $this->dbh->prepare("SELECT * FROM consulta_ventas ");
         $stmt->execute();
         return $stmt->fetchAll();

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }
// metodos ajax

   
public function get_all_producto_DV($value)
{
  try{
    
     $stmt = $this->dbh->prepare("CALL productos_DV( ? )");
     $stmt->execute(array("%". $value ."%"));
     return $stmt->fetchAll();

    }catch(Exception $e){
      exit($e->getMessage());
    }
}


    public function getone_DV($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("CALL producto_getone_DV( ? )");
        $stmt->execute(array($id));
        return $stmt->fetch();

       }catch(Exception $e){
         exit($e->getMessage());
       }
    }

    public function get_all_servicio_DV($value)
{
  try{
    
     $stmt = $this->dbh->prepare("CALL servicios_DV( ? )");
     $stmt->execute(array("%". $value ."%"));
     return $stmt->fetchAll();

    }catch(Exception $e){
      exit($e->getMessage());
    }
}


    public function servicio_getone_DV($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("call servicio_getone_DV( ? )");
        $stmt->execute(array($id));
        return $stmt->fetch();

       }catch(Exception $e){
         exit($e->getMessage());
       }
    }



    public function agregar_venta($value)
{
  try{

    $fecha = date("Y-m-d G:m:s");

    $data = json_decode($value,true);
    
    $stmt = $this->dbh->prepare("SELECT MAX(id_venta_PK) + 1 as id_nuevo FROM venta ");
    $stmt->execute();
    $id_nuevo = $stmt->fetch()->id_nuevo;

    $id_nuevo = $id_nuevo == null ? 1 : $id_nuevo;
      
     $stmt = $this->dbh->prepare("INSERT INTO venta VALUES(?,?,?,?,?,?,?,?,?)");
     $response = $stmt->execute(array($id_nuevo,
                                    $data["usuario"],
                          $data["cliente"],
                          $data["subtotal"],
                          $data["descuento"],
                          $data["total"],
                          $fecha,
                          $data["estado"],
                          1
                        ));
     if($response){
       
        foreach ($data["detalleventa"] as $dato ){

          $stmt = $this->dbh->prepare("INSERT INTO detalle_venta VALUES (?,?,?,?,?,?)");
          
          if($dato["tipo"] == 1){

          $this->actualizar_stock($dato["id"],$dato["cantidad"],"agregar_f");

           $valores = array($id_nuevo,
                            $dato["id"],
                            null,
                            $dato["cantidad"],
                            $dato["precio"],
                            "");

                    
           }else{
            // ejecuta acciones si es un servicio
            $valores = array($id_nuevo,
                             null,
                             $dato["id"],
                             $dato["cantidad"],
                             $dato["precio"],
                             "");
          }
          $stmt->execute($valores);        
        }
        return true;
      }
      return false;

    }catch(Exception $e){
      exit($e->getMessage());
    }
}

    public function anular_venta($id)
    { 
         try{
        $stmt = $this->dbh->prepare("UPDATE venta SET inactivacion_venta = 0 WHERE id_venta_PK = ?");
        $response =  $stmt->execute(array($id));

        if($response){
          $stmt = $this->dbh->prepare("SELECT * FROM detalle_venta WHERE id_venta_FK = ? and id_producto_FK is not null;");
          $stmt->execute(array($id));
  
          $datos = $stmt->fetchAll();

          foreach($datos as $dato){
            $this->actualizar_stock($dato->id_producto_FK,$dato->cantidad_detalle_venta,"anular_f");
          }
        }
          return true;
 
         }catch(Exception $e){
           exit($e->getMessage());
         }
    }


    public function update($data)
    {   
      try{
          $id = filter_var($data["id"],FILTER_SANITIZE_NUMBER_INT);
          $sql = "UPDATE venta SET  id_estado_venta_FK  = ? WHERE id_venta_PK = ? ";

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                                $data["estado"],
                                $data["id"]));
          
          return true;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }




    public function getone($id)
    { 
      try{

        $stmt = $this->dbh->prepare("SELECT * FROM venta where id_venta_PK = ?");
        $stmt->execute(array($id));
        return $stmt->fetch();

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

    public function obtener_detalle($id)
    { 
      try{

        $stmt = $this->dbh->prepare("SELECT * FROM detalle_venta WHERE id_venta_FK = ?");
        $stmt->execute(array($id));
        return $stmt->fetchAll();

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

    public function obtener_factura($id)
    { 
      try{

        $stmt = $this->dbh->prepare("CALL venta( ? )");
        $stmt->execute(array($id));
        return $stmt->fetch();

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

    private function actualizar_stock($id,$cantidad,$tipo){

    switch($tipo){
      
      case "agregar_f":
        $stmt = $this->dbh->prepare("SELECT stock_producto FROM producto WHERE id_producto_PK = ?");
        $stmt->execute(array($id));
        $response = $stmt->fetch(); 
        if($response){

          $new_stock = $response->stock_producto - $cantidad;
          $stmt = $this->dbh->prepare("UPDATE producto SET stock_producto = ? where id_producto_PK = ?");
          $stmt->execute(array($new_stock,$id));
          return true;
        }
      break;

      case "anular_f":
      
      $stmt = $this->dbh->prepare("SELECT stock_producto FROM producto WHERE id_producto_PK = ?");
      $stmt->execute(array($id));
      $response = $stmt->fetch();
        if($response){
          $new_stock = $response->stock_producto + $cantidad;
          $stmt = $this->dbh->prepare("UPDATE producto SET stock_producto = ? where id_producto_PK = ?");
          $stmt->execute(array($new_stock,$id));
          return true;
        }
      break;  
      default;
    }

  }



}
?>