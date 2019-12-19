<?php
class Proveedor
{
    private $dbh;

    
    public function __construct()
    { 
       $this->dbh = Database::connection(); 
    }


    public function getall()
    {
      try{
        
         $stmt = $this->dbh->prepare("CALL consulta_proveedor()");
         $stmt->execute();
         return $stmt->fetchAll();


        }catch(Exception $e){
          exit($e->getMessage());
        }
    }


    public function getone($id)
    {
      try{
        
        $stmt = $this->dbh->prepare("CALL consulta_proveedor_uno(?)");
        $stmt->execute(array($id));
        return $stmt->fetch();

       }catch(Exception $e){
         exit($e->getMessage());
       }
    }


    public function insert($data)
    { 
         try{

        $stmt = $this->dbh->prepare("CALL guardar_proveedor(?,?,?,?)");
        $stmt->execute(array(
              $data["nombre"],
              $data["apellido"],
              $data["direccion"],
              $data["telefono"]
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

            $stmt = $this->dbh->prepare("CALL actualizar_proveedor(?,?,?,?,?,?)");
            $stmt->execute(array(
                                $data["nombre"],
                                $data["apellido"],
                                $data["direccion"],
                                $data["telefono"],
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

        $stmt = $this->dbh->prepare("CALL eliminar_proveedor(?)");
        $stmt->execute(array($id));
        return true;

      }catch(Exception $e){
        exit($e->getMessage());
      }
    }
}
?>