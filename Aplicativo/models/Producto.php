<?php
class Producto
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }


    public function getall()
    {
      try{
        
         $stmt = $this->dbh->prepare("SELECT * FROM consulta_productos");
         $stmt->execute();
         $rows = $stmt->fetchAll();
         return $rows;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }


    public function getone($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("SELECT * FROM producto WHERE id_producto_PK = ? and inactivacion_producto = 0");
        $stmt->execute(array($id));
        return $stmt->fetch();


       }catch(Exception $e){
         exit($e->getMessage());
       }
    }




    public function insert($data)
    { 
         try{
           $sql = "INSERT INTO producto (codigo_producto_PK,
                                       id_categoria_producto_FK,
                                       id_marca_producto_FK,
                                       referencia_producto,
                                       stock_producto,
                                       precio_producto,
                                       fecha_registro_producto) VALUES (?,?,?,?,?,?,?)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(
              $data["codigo"],
              $data["categoria"],
              $data["marca"],
              $data["referencia"],
              $data["stock"],
              $data["precio"],
              date("Y-m-d")
        ));
        return true;
 
         }catch(Exception $e){
           exit($e->getMessage());
         }
    }


    public function update($data)
    {   
      try{
          $id = filter_var($data["id"],FILTER_SANITIZE_NUMBER_INT);
          $sql = "UPDATE producto SET codigo_producto_PK      = ?,
                                     id_categoria_producto_FK = ?,
                                     id_marca_producto_FK     = ?,
                                     referencia_producto      = ?,
                                     stock_producto           = ?,
                                     precio_producto          = ?,
                                     id_estado_FK             = ?
                                 WHERE id_producto_PK = ? ";

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                                $data["codigo"],
                                $data["categoria"],
                                $data["marca"],
                                $data["referencia"],
                                $data["stock"],
                                $data["precio"],
                                $data["estado"],
                                $id));
          
          return true;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }




    public function delete($id)
    { 
      try{

        $sql = "UPDATE producto SET inactivacion_producto = 1 WHERE id_producto_PK = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array($id));
        return true;

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }



    public function categorias()
    { 
      try{

        $sql = "SELECT * FROM categoria_producto Where inactivacion_categoria = 0";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
      }catch(Exception $e){
        exit($e->getMessage());
      }
    }

    

    public function marcas()
    { 
      try{

        $sql = "SELECT * FROM marca_producto WHERE estado_marca_producto = 1";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
      }catch(Exception $e){
        exit($e->getMessage());
      }
    }
    

}
?>