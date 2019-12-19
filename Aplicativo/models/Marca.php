<?php
class Marca
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }


    public function getall()
    {
      try{
        
         $stmt = $this->dbh->prepare("SELECT * FROM marca_producto");
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
        
        $stmt = $this->dbh->prepare("SELECT * FROM marca_producto WHERE id_marca_producto_PK = ? ");
        $stmt->execute(array($id));
        return $stmt->fetch();


       }catch(Exception $e){
         exit($e->getMessage());
       }
    }




    public function insert($data)
    { 
         try{
           $sql = "INSERT INTO marca_producto VALUES (?,?,?)";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(
              null,
              $data["estado"],
              $data["marca"]
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
          $sql = "UPDATE marca_producto SET  estado_marca_producto  = ?,
                                             descripcion_marca_producto = ?
                                        WHERE id_marca_producto_PK = ? ";

            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(array(
                                $data["estado"],
                                $data["marca"],
                                $id));
          
          return true;

        }catch(Exception $e){
          exit($e->getMessage());
        }
    }




    // public function delete($id)
    // { 
    //   try{

    //     $sql = "UPDATE marca_producto SET estado_marca_producto = 0 WHERE id_marca_producto_PK = ?";
    //     $stmt = $this->dbh->prepare($sql);
    //     $stmt->execute(array($id));
    //     return true;

    //   }catch(Exception $e){
    //     exit($e->getMessage());
    //   }
    // }



    

}
?>